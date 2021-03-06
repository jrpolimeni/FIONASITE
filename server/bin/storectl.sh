#!/bin/bash
# filename: storescpd
#
# purpose: start storescp server for processing user at boot time to receive data
#          Move files to project specific file system
#
# This system service will fail if a control file /data/enabled exists and 
# its first character is a "0".
#
# (Hauke Bartsch)

od=/data/site/archive
pipe=/tmp/.processSingleFilePipe

port=`cat /data/config/config.json | jq -r ".DICOMPORT"`
SERVERDIR=`dirname "$(readlink -f "$0")"`/../
pidfile=${SERVERDIR}/.pids/storescpd.pid
scriptfile=${SERVERDIR}/bin/receiveSingleFile.sh

export DCMDICTPATH=/usr/share/dcmtk/dicom.dic

#
# the received file will be written to a named pipe which is evaluated by processSingleFile.py
#
case $1 in
    'start')
        if [[ -f /data/enabled ]] && [[ -r /data/enabled ]]; then
           v=`cat /data/enabled | head -c 1`
           if [[ "$v" == "0" ]]; then
              echo "`date`: service disabled using /data/enabled control file" >> ${SERVERDIR}/logs/storescpd.log
              echo "service disabled using /data/enabled control file"
              exit
           fi
        fi

        if [ ! -d "$od" ]; then
          mkdir $od
        fi
        # check if we have a pipe to send events to
        if [[ "$(/usr/bin/test -p ${pipe})" != "0" ]]; then
            echo "Found pipe ${pipe}..."
        else
            echo "Error: the pipe of processSingleFile.py \"$pipe\" could not be found"
            exit -1
        fi
        echo "Check if storescp daemon is running..."
        /usr/bin/pgrep -f -u processing "storescp "
        RETVAL=$?
        [ $RETVAL = 0 ] && exit || echo "storescpd process not running, start now.."
        echo "Starting storescp daemon..."
        echo "`date`: we try to start storescp by: /usr/bin/nohup /usr/bin/storescp --fork --write-xfer-little --exec-on-reception \"$scriptfile '#a' '#c' '#r' '#p' '#f' &\" --sort-on-study-uid scp --output-directory \"$od\" $port &>${SERVERDIR}/logs/storescpd.log &" >> ${SERVERDIR}/logs/storescpd-start.log

        /usr/bin/nohup /usr/bin/storescp --fork \
            --write-xfer-little \
            --exec-on-reception "$scriptfile '#a' '#c' '#r' '#p' '#f' &" \
            --sort-on-study-uid scp \
            --output-directory "$od" \
            $port &>${SERVERDIR}/logs/storescpd.log &
        pid=$!
        echo $pid > $pidfile
        ;;
    'stop')
        #/usr/bin/pkill -F $pidfile
        /usr/bin/pkill -u processing storescp
        RETVAL=$?
        # [ $RETVAL -eq 0 ] && rm -f $pidfile
        [ $RETVAL = 0 ] && rm -f ${pidfile}
        ;;
    *)
        echo "usage: storescpd { start | stop }"
        ;;
esac
exit 0
