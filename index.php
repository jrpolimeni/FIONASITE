<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FIONA SITE COMPUTER</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="images/touch/chrome-touch-icon-192x192.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <link rel="apple-touch-icon-precomposed" href="apple-touch-icon-precomposed.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    <!--
    <link rel="canonical" href="http://www.example.com/">
    -->

<?php
   session_start();

   include("php/AC.php");
   $user_name = check_logged();
  echo('<script type="text/javascript"> user_name = "'.$user_name.'"; </script>'."\n");
  // print out all the permissions
  $permissions = list_permissions_for_user($user_name);
  $p = '<script type="text/javascript"> permissions = [';
  foreach($permissions as $perm) {
    $p = $p."\"".$perm."\",";
  }
  echo ($p."]; </script>\n");

  $admin = false;
  if (check_role( "admin" )) {
     $admin = true;
  }
  if (check_permission( "developer" )) {
     $developer = true;
  }
  if (check_permission( "see-scanner" )) {
     $seescanner = true;
  }
?>

    <style>
@font-face {
  font-family: 'Roboto';
  font-style: normal;
  font-weight: 100;
  src: local('Roboto Thin'), local('Roboto-Thin'), url(font/roboto/Jzo62I39jc0gQRrbndN6nfesZW2xOQ-xsNqO47m55DA.ttf) format('truetype');
}
@font-face {
  font-family: 'Roboto';
  font-style: normal;
  font-weight: 300;
  src: local('Roboto Light'), local('Roboto-Light'), url(font/roboto/Hgo13k-tfSpn0qi1SFdUfaCWcynf_cDxXwCLxiixG1c.ttf) format('truetype');
}
@font-face {
  font-family: 'Roboto';
  font-style: normal;
  font-weight: 400;
  src: local('Roboto'), local('Roboto-Regular'), url(font/roboto/zN7GBFwfMP4uA6AR0HCoLQ.ttf) format('truetype');
}
@font-face {
  font-family: 'Roboto';
  font-style: normal;
  font-weight: 500;
  src: local('Roboto Medium'), local('Roboto-Medium'), url(font/roboto/RxZJdnzeo3R5zSexge8UUaCWcynf_cDxXwCLxiixG1c.ttf) format('truetype');
}
@font-face {
  font-family: 'Roboto';
  font-style: normal;
  font-weight: 700;
  src: local('Roboto Bold'), local('Roboto-Bold'), url(font/roboto/d-6IYplOFocCacKzxwXSOKCWcynf_cDxXwCLxiixG1c.ttf) format('truetype');
}
@font-face {
  font-family: 'Roboto';
  font-style: normal;
  font-weight: 900;
  src: local('Roboto Black'), local('Roboto-Black'), url(font/roboto/mnpfi9pxYH-Go5UiibESIqCWcynf_cDxXwCLxiixG1c.ttf) format('truetype');
}
@font-face {
  font-family: 'Roboto';
  font-style: italic;
  font-weight: 400;
  src: local('Roboto Italic'), local('Roboto-Italic'), url(font/roboto/W4wDsBUluyw0tK3tykhXEfesZW2xOQ-xsNqO47m55DA.ttf) format('truetype');
}
@font-face {
  font-family: 'Roboto';
  font-style: italic;
  font-weight: 700;
  src: local('Roboto Bold Italic'), local('Roboto-BoldItalic'), url(font/t6Nd4cfPRhZP44Q5QAjcC50EAVxt0G0biEntp43Qt6E.ttf) format('truetype');
}
@font-face {
  font-family: 'Material Icons';
  font-style: normal;
  font-weight: 400;
  src: local('Material Icons'), local('MaterialIcons-Regular'), url(font/2fcrYFNaTjcS6g4U3t-Y5StnKWgpfO2iSkLzTz-AABg.ttf) format('truetype');
}

.material-icons {
  font-family: 'Material Icons';
  font-weight: normal;
  font-style: normal;
  font-size: 24px;
  line-height: 1;
  letter-spacing: normal;
  text-transform: none;
  display: inline-block;
  white-space: nowrap;
  word-wrap: normal;
  direction: ltr;
}
</style>
    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" rel="stylesheet"> -->
    <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
    <link rel="stylesheet" href="css/material.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/fullcalendar.min.css">
    <link rel="stylesheet" media="print" href="css/fullcalendar.print.css">
    <link rel="stylesheet" href="css/jquery.bonsai.css">
   
    <style>
     #view-source {
       position: fixed;
       display: block;
       right: 0;
       bottom: 0;
       margin-right: 40px;
       margin-bottom: 40px;
       z-index: 900;
     }
     .green-background {
       background-color: lightgreen;
     }
     .red-background {
       background-color: red;
     }
     .drop-down-item{

     }
     .form-control {
        width: 300px;
        margin-bottom: 10px;
        margin-top: 5px;
     }
     .control-label {
        color: black;
        font-size: 12pt;
     }
     .form-control option {
        height: 25px;
        background-color: white;
        padding-top: 5px;
     }
     #detected-scans {
        height: 300px;
        overflow-y: scroll;
     }
     .SeriesName {
	 font-size: 20px;
	 font-weight: 500;
	 line-height: 1;
	 letter-spacing: .02em;
     }
     li {
	 border-bottom: 1px solid gray;
	 margin-bottom: 10px;
	 list-style-type: none;
	 margin-left: 0px;
	 padding: 5px;
     }
     #detected-scans {
	 padding-left: 0px;
     }
     .send-series-button {
	 margin-bottom: 10px;
     }
     .status0 {
	 background: linear-gradient(to right, white, white 80%, red);
     }
     .status1 {
	 background: linear-gradient(to right, white, white 80%, green);
     }
    </style>
    <link rel="stylesheet" href="css/dialog-polyfill.min.css">
  </head>
  <body>
    <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
      <header class="demo-header mdl-layout__header mdl-color--white mdl-color--grey-100 mdl-color-text--grey-600">
        <div class="mdl-layout__header-row">
          <span class="mdl-layout-title hostname" title="Flash I/O Network Appliance">&nbsp;&nbsp;ABCD's FIONA</span>
	  <nav class="mdl-navigation mdl-menu--top-right">
	    <a class="mdl-navigation__link" style="color: gray;">User: <?php echo($user_name); ?></a>
	  </nav>
          <div class="mdl-layout-spacer"></div>
          <div class="mdl-layout-spacer"></div>
          <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
            <i class="material-icons">more_vert</i>
          </button>
          <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
            <li class="mdl-menu__item" id="dialog-about-button">About</li>
            <li class="mdl-menu__item"><a href="applications/viewer/" title="Image viewer for FIONA DICOM images">Image Viewer</a></li>
<?php if ($developer) : ?>
            <li class="mdl-menu__item"><a href="invention.html">Development</a></li>
<?php endif; ?>
<?php if ($admin) : ?>
            <li class="mdl-menu__item" onclick="document.location.href = '/applications/User/admin.php';">Admin Interface</li>
            <li class="mdl-menu__item" id="dialog-setup-button">Setup</li>
<?php endif; ?>
            <li class="mdl-menu__item" id="dialog-change-password-button">Change Password</li>
            <li class="mdl-menu__item" onclick="logout();">Logout</li>
          </ul>
        </div>
      </header>
      <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
        <header class="demo-drawer-header">
          <img src="images/user.jpg" class="demo-avatar">
          <div class="demo-avatar-dropdown">
            <span>Data Views</span>
            <div class="mdl-layout-spacer"></div>
            <button id="accbtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
              <i class="material-icons" role="presentation">arrow_drop_down</i>
              <span class="visuallyhidden">Accounts</span>
            </button>
            <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="accbtn">
              <li class="mdl-menu__item" id="load-subjects">Patients</li>
              <li class="mdl-menu__item" id="load-studies">Studies</li>
<?php if ($seescanner) : ?>
              <li class="mdl-menu__item" id="load-scanner">Scanner</li>
<?php endif; ?>
            </ul>
          </div>
        </header>
        <nav class="demo-navigation  mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
           <center><span id="view-name"></span></center>
           <div class="mdl-layout-spacer"></div>
        </nav>
        <nav id="list-of-subjects" class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
           <div class="mdl-layout-spacer"></div>
          <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">help_outline</i><span class="visuallyhidden">Help</span></a>
        </nav>
      </div>

      <main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content">
          <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
            <div id="system-load" class="mdl-cell mdl-cell--2-col">
	      <div class="mdl-spinner mdl-js-spinner is-active" style="width: 110px; height: 110px;margin-left: 10px;"></div>
	    </div>
            <div id="system-space" class="mdl-cell mdl-cell--2-col"></div>
            <div id="system-memory" class="mdl-cell mdl-cell--2-col"></div>
            <div class="mdl-cell mdl-cell--2-col"></div>
            <div class="mdl-cell mdl-cell--2-col">
<label for="receive-dicom" id="receive-dicom-label" class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
  <input type="checkbox" id="receive-dicom" class="mdl-checkbox__input" checked />
  <span class="mdl-checkbox__label">receive DICOM</span>
</label>

<label for="receive-mpps" id="receive-mpps-label" class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
  <input type="checkbox" id="receive-mpps" class="mdl-checkbox__input" checked />
  <span class="mdl-checkbox__label">auto-pull DICOM</span>
</label>

<label for="anonymize" id="anonymize-label" class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
  <input type="checkbox" id="anonymize" class="mdl-checkbox__input" checked />
  <span class="mdl-checkbox__label">anonymize files</span>
</label>
            </div>
          </div>
          <div class="demo-graphs mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--12-col">
	      <div id="calendar-loc"></div>
          </div>
          <div class="demo-graphs mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--12-col" style="display: none;">
              <div style="position: relative;">
                <div style="font-size: 22pt; position: absolute; top: 20px;color: #757575; left: 10pt;">Studies present on this system</div>
	        <div id="circles"></div>
              </div>
          </div>
          <div class="demo-graphs mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--12-col" style="display: none;">
              <div style="position: relative;">
                <div style="font-size: 22pt; position: absolute; bottom: 20px;color: #757575; left: 10pt;">Studies present on this system</div>
	        <div id="bars"></div>
              </div>
          </div>
        </div>
      </main>
    </div>

<dialog class="mdl-dialog" id="modal-change-password">
    <div class="mdl-dialog__content">
        <div style="font-size: 32pt; margin-bottom: 25px;">
            Change Password
        </div>
	<form>
          <input class="mdl-textfield__input" type="password" id="password-field1" placeholder="*******" autofocus><br/>
          <input class="mdl-textfield__input" type="password" id="password-field2" placeholder="type again">
	</form>
    </div>
    <div class="mdl-dialog__actions mdl-dialog__actions--full-width">
        <button type="button" class="mdl-button" id="change-password-cancel">Cancel</button>
        <button type="button" class="mdl-button" id="change-password-save" onclick="changePassword();">Save</button>
    </div>
</dialog>



<dialog class="mdl-dialog" id="modal-setup">
    <div class="mdl-dialog__content">
        <div style="font-size: 32pt; margin-bottom: 25px;">
            Configuration
        </div>
        <div id="setup-text">
loading configuration file...
        </div>
    </div>
    <div class="mdl-dialog__actions mdl-dialog__actions--full-width">
        <button type="button" class="mdl-button" id="setup-dialog-cancel">Cancel</button>
        <button type="button" class="mdl-button" id="setup-dialog-save">Save</button>
    </div>
</dialog>

<dialog class="mdl-dialog" id="modal-study-info">
  <div class="mdl-dialog__content">
    <div style="font-size: 32pt; margin-bottom: 20px;">
      Study Transfer
    </div>
    <div class="row">
      <div class="mdl-cell mdl-cell--12-col"  id="study-info-text"></div>
    </div>
    <div class="row">
      <div class="mdl-cell mdl-cell--12-col">
        <div id="header-section"></div>
      </div>
    </div>
    <div class="row">
      <div class="mdl-cell mdl-cell--12-col"  id="identify-section">
	<h4>Identify your imaging session</h4>
        <div class="form-group">
          <label for="session-participant" class="control-label">Participant (pGUID in REDCap)</label><br/>
          <select class="form-control" id="session-participant"></select>
        </div>
	
        <div class="form-group">
          <label for="session-name" class="control-label">Session name</label><br/>
          <select class="form-control" id="session-name"></select>
        </div>
	
        <div class="form-group">
          <label for="session-run" class="control-label">Imaging Session Type</label><br/>
          <select class="form-control" id="session-run">
            <option value="SessionA1" title="T1, rsFMRI (2 runs), DTI, T2, rsfMRI (up to 2 runs)">A1</option>
            <option value="SessionA2" title="3 fMRI tasks">A2</option>
            <option value="SessionB1" title="T1, 3 fMRI tasks">B1</option>
            <option value="SessionB2" title="rsfMRI (2 runs), DTI, T2, rsfMRI (up to 2 runs)">B2</option>
            <option value="SessionC" title="Combined scan">C</option>
          </select>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="mdl-cell mdl-cell--12-col">
        <div id="detected-scans-summary"></div>
        <ul id="detected-scans">
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="mdl-cell mdl-cell--12-col"  id="additional-scans"></div>
    </div>
    <div class="row">
      <div class="mdl-dialog__actions mdl-dialog__actions--full-width">
        <button type="button" class="mdl-button" id="study-info-dialog-cancel">Cancel</button>
        <button type="button" class="mdl-button" id="study-info-dialog-sendall">Send All Series</button>
      </div>
    </div>
  </div>
</dialog>

<dialog class="mdl-dialog" id="modal-series-info">
    <div class="mdl-dialog__content">
        <div style="font-size: 32pt; margin-bottom: 20px;">
            Series Information
        </div>
        <div id="series-info-text">
loading information...
        </div>
    </div>
    <div class="mdl-dialog__actions">
        <button type="button" class="mdl-button" id="series-info-dialog-cancel">ok</button>
    </div>
</dialog>

<dialog class="mdl-dialog" id="modal-about">
    <div class="mdl-dialog__content">
        <div style="font-size: 22pt; margin-bottom: 20px;">
            Flash-based Input/Output Network Appliance
        </div>
        <div>
	  <p>
	    Learn more about this project by visiting <a href="https://abcd-workspace.ucsd.edu">abcd-workspace.ucsd.edu</a>.
	  </p>
        </div>
    </div>
    <div class="mdl-dialog__actions mdl-dialog__actions--full-width">
        <button type="button" class="mdl-button close-dialog">OK</button>
    </div>
</dialog>

      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" style="position: fixed; left: -1000px; height: -1000px;">
        <defs>
          <mask id="piemask" maskContentUnits="objectBoundingBox">
            <circle cx=0.5 cy=0.5 r=0.49 fill="white"></circle>
            <circle cx=0.5 cy=0.5 r=0.40 fill="black"></circle>
          </mask>
          <g id="piechart">
            <circle cx=0.5 cy=0.5 r=0.5></circle>
            <path d="M 0.5 0.5 0.5 0 A 0.5 0.5 0 0 1 0.95 0.28 z" stroke="none" fill="rgba(255, 255, 255, 0.75)"></path>
          </g>
        </defs>
      </svg>
    <script src="js/dialog-polyfill.min.js"></script>
    <script src="js/material.min.js"></script>
    <script src="js/d3.js"></script>
    <script src="js/circles.js"></script>

    <script src="js/sankey.js"></script>
    <script src="js/d3.chart.min.js"></script>
    <script src="js/d3.chart.sankey.min.js"></script>   
    <script src="js/bars.js"></script>

    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/radialProgress.js"></script>
    <script src="js/moment-with-locales.min.js"></script>
    <script src="js/fullcalendar.min.js"></script>
    <script src="js/ace-min-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/jquery.bonsai.js" type="text/javascript"></script>
    <script src="js/md5-min.js" type="text/javascript"></script>
    <script>

      // logout the current user
      function logout() {
        jQuery.get('/php/logout.php', function(data) {
          if (data == "success") {
            // user is logged out, reload this page
            location.reload();
          } else {
            alert('something went terribly wrong during logout: ' + data);
          }
        });
      }

      // change the current user's password
      function changePassword() {
        var password = jQuery('#password-field1').val();
        var password2 = jQuery('#password-field2').val();
        if (password == "") {
          alert("Error: Password cannot be empty.");
          return; // no empty passwords
        }
        // minimum password length
        if (password.length < 8) {
          alert("Error: Password has to be at least 8 characters in length.");
          return;
        }
        // user name should not be part of password
	if (password.toLowerCase().indexOf(user_name.toLowerCase()) != -1) {
          alert("Error: username should not be part of the password.");
          return;
        }
        if (! /[a-z]+/.test(password) ) {
          alert("Error: password should contain lower-case characters a-z");
          return;
        }
        if (! /[A-Z]+/.test(password) ) {
          alert("Error: password should contain upper case characters A-Z");
          return;
        }
        if (! /[0-9]+/.test(password) ) {
          alert("Error: password should contain number 0-9");
          return;
        }
        if (! /[\! @#*+-:.,\?\^_\/\\\s]+/.test(password) ) {
          alert("Error: password should contain punctuation or non-alphanumeric character");
          return;
        }

        hash = hex_md5(password);
        hash2 = hex_md5(password2);
        if (hash !== hash2) {
          alert("Error: The two passwords are not the same, please type again.");
          return; // do nothing
        }
        jQuery.getJSON('/php/getUser.php?action=changePassword&value=' + user_name + '&value2=' + hash, function(data) {
	    alert("Success: you have changed the password for user " + user_name);
        }).fail(function() {
	    alert("Error: an error was returned trying to set your new password (" + user_name + ")");
        });
      }


var subjectData = [];
function loadSubjects() {
    console.log("loadSubjects");
    jQuery('#list-of-subjects').find('.data').remove();
    jQuery('#view-name').text('Subjects');
    jQuery.getJSON('/php/subjects.php', function(data) {
        
        subjectData = data; // we can re-use those
	for (var i = 0; i < data.length; i++) {
            var shortname = data[i].PatientName + "-" + data[i].PatientID;
	    shortname = shortenName( shortname );

	    jQuery('#list-of-subjects').prepend('<div class="data open-study-info" style="position: relative;" studyinstanceuid="'+data[i].StudyInstanceUID+'"><a class="mdl-navigation__link" href="#" title=\"' + data[i].PatientName + '-' + data[i].PatientID + '\"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">accessibility</i><div style="font-size: 10px; position: absolute; left: 55px; bottom: -2px;">' + data[i].StudyDate + '/' + data[i].StudyTime.split('.')[0] + '</div>'+shortname+'</a></div>');
	}
    });
}
function shortenName( name ) {
   var l = 20;
   if (name !== null && name.length > l) {
       // take the first part
       return name.substring(0,14) + "..." + name.substring(name.length -5, name.length);
   }
   return name;
}
var studyData = [];
function loadStudies() {
    jQuery('#list-of-subjects').find('.data').remove();
    jQuery('#view-name').text("Studies");
    jQuery.getJSON('/php/series.php', function(data) {
        studyData = data;
	// sort those by date

	// here we get all series below each study, need a tree view, get rid of stuff already on display
        // create a nested list for bonsai
	str = "<ul id=\"study-list-bonsai\" class=\"data\">";
        var studies = Object.keys(data);
        for (var i = 0; i < studies.length; i++) {
	   str = str + "<li title=\""+data[studies[i]][0]['PatientName']+"\">" + data[studies[i]][0]['PatientName'] + "-" + data[studies[i]][0]['PatientID'] + "<ul>";
           for (var j = 0; j < data[studies[i]].length; j++) {
	       str = str + "<li class=\"open-series-info\" key=\"" + studies[i] + "\" entry=\""+ j +"\">" + shortenName(data[studies[i]][j]['SeriesDescription']) + "</li>";
           }
           str = str + "</ul></li>";
        }
        str = str + "</ul>";
        jQuery('#list-of-subjects').prepend(str);
        jQuery('#study-list-bonsai').bonsai();
    });
}

// load the list of scans from the scanner
function loadScanner() {
    jQuery('#list-of-subjects').find('.data').remove();
    jQuery('#view-name').text("Scanner");
    jQuery.getJSON('/php/scanner.php', function(data) {
	str = "<ul id=\"scanner-list-bonsai\" class=\"data\">";
	for (var i = 0; i < data.length; i++) {
	   var na = data[i].PatientName + "-" + data[i].PatientID;
           na = shortenName(na);
	   str = str + "<li><span title=\"" + data[i].PatientName + "-" + data[i].PatientID + "\">" + na + "</span><br/><small style=\"padding-top: -10px;\">"+data[i].StudyDate+" "+data[i].StudyTime+"</small>&nbsp;&nbsp;<button style=\"margin-top: -20px;\" class=\"mdl-button mdl-js-button mdl-button--icon pull-study\" study=\""+data[i].StudyInstanceUID+"\" title=\"Downlaod to FIONA\"><i class=\"material-icons\">touch_app</i></button><ul>";
	   for (var j = 0; j < data[i].Series.length; j++) {
	      str = str + "<li class=\"open-scanner-series-info\" key=\"" + data[i].Series[j].SeriesInstanceUID + "\" title=\""+data[i].Series[j].SeriesDescription + " [" + data[i].Series[j].ImagesInAcquisition +"]\">" + shortenName(data[i].Series[j].SeriesDescription) + "</li>";
           }
           str = str + "</ul></li>";
        }
        str = str + "</ul>";
        jQuery('#list-of-subjects').prepend(str);
        jQuery('#scanner-list-bonsai').bonsai();
    });
}


var rp1 = "";
var rp2 = "";
var rp3 = "";
function loadSystem() {
    //jQuery('#system-load').children().remove();
    jQuery.getJSON('/php/stats.php', function(data) {
        jQuery('.hostname').text(data.hostname);
	//var load=d3.select(document.getElementById('system-load'));
        if (rp1 == "") {
            jQuery('#system-load').children().remove();
            rp1 = radialProgress(document.getElementById('system-load'))
                .label("load")
                .diameter(150)
                .value(data.load_avg * 100)
                .render();
	} else {
            rp1.value(data.load_avg * 100).render();
	}
        if (rp2 == "") {
            jQuery('#system-space').children().remove();
            rp2 = radialProgress(document.getElementById('system-space'))
                .label("space")
                .diameter(150)
                .value(100-data.disk_free_percent)
                .render();
	} else {
            rp2.value(100-data.disk_free_percent).render();
	}
        if (rp3 == "") {
            jQuery('#system-memory').children().remove();
            rp3 = radialProgress(document.getElementById('system-memory'))
                .label("memory")
                .diameter(150)
                .value(100-data.memory_free_percent)
                .render();
	} else {
            rp3.value(100-data.memory_free_percent).render();
	}
    });
    jQuery.get('/php/startstop.php', function(data) {
        console.log('change checked to reflect system status ' + data);
        // we expect two values here
        var vals = data.split('');
        if (vals[0] == "0") {
           document.querySelector('#receive-dicom-label').MaterialCheckbox.uncheck();
        } else {
           document.querySelector('#receive-dicom-label').MaterialCheckbox.check();
        }
        if (vals[1] == "0") {
           document.querySelector('#receive-mpps-label').MaterialCheckbox.uncheck();
        } else {
           document.querySelector('#receive-mpps-label').MaterialCheckbox.check();
        }
        if (vals[2] == "0") {
           document.querySelector('#anonymize-label').MaterialCheckbox.uncheck();
        } else {
           document.querySelector('#anonymize-label').MaterialCheckbox.check();
        }
    });
    //jQuery('#calendar-loc').fullCalendar('refetchEvents');
}

function setTimeline(view) {
    var parentDiv = jQuery(".fc-time-grid-container:visible").parent();
    var timeline = parentDiv.children(".timeline");
    if (timeline.length == 0) { //if timeline isn't there, add it
        timeline = jQuery("<hr>").addClass("timeline");
        parentDiv.prepend(timeline);
    }

    var curTime = new Date();

    var curCalView = jQuery("#calendar-loc").fullCalendar('getView');
    if (curCalView.intervalStart < curTime && curCalView.intervalEnd > curTime) {
        timeline.show();
    } else {
        timeline.hide();
        return;
    }

    var curSeconds = (curTime.getHours() * 60 * 60) + (curTime.getMinutes() * 60) + curTime.getSeconds();
    var percentOfDay = curSeconds / 86400; //24 * 60 * 60 = 86400, # of seconds in a day
    var topLoc = Math.floor(parentDiv.height() * percentOfDay);

    timeline.css("top", topLoc + "px");

    if (curCalView.name == "agendaWeek") { //week view, don't want the timeline to go the whole way across
        var dayCol = jQuery(".fc-today:visible");
        var left = dayCol.position().left + 1;
        var width = dayCol.width() - 2;
        timeline.css({
            left: left + "px",
            width: width + "px"
        });
    }

}

function createCalendar() {
    var cal = jQuery('#calendar-loc').fullCalendar({
	header: {
	    left: 'prev,next today',
	    center: 'title',
	    right: 'month,agendaWeek,agendaDay'
	},
        defaultView: 'month', // only month is working here, would be good to switch to agendaDay instead
        timezone: 'America/Los_Angeles',
	eventSources: [ { url: "php/events.php", color: '#ffdce5', textColor: 'black' } ],
	eventResize: function(calEvent, jsEvent, view) {
	    alert("eventResize: function(calEvent, jsEvent, view)");
            if (!updateEvent(calEvent)) {
		jQuery('#calendar-loc').fullCalendar('refetchEvents');                 
            }
	},
	viewRender: function(view) {
	   try { 
              //setTimeline(view);
           } catch( err ) {}
        },
    });
    
}

function changeSystemStatus() {
   var a = jQuery('#receive-dicom')[0].checked ? 1:0;
   var b = jQuery('#receive-mpps')[0].checked ? 1:0;
   var c = jQuery('#anonymize')[0].checked ? 1:0;
   jQuery.get('/php/startstop.php?enable='+a+""+b+""+c);
}

function displayHeaderSection(data) {
         
         if (data["status"] == null) {
             console.log("ERROR: displayHeaderSection: status not found");
         }

         if (data["message"] == null) {
             console.log("ERROR: displayHeaderSection: message not found");
         }

         if (data["shortmessage"] == null) {
             console.log("ERROR: displayHeaderSection: shortmessage not found");
         }

         if (data["PatientID"] == null) {
             console.log("ERROR: displayHeaderSection: PatientID not found");
         }

         if (data["PatientName"] == null) {
             console.log("ERROR: displayHeaderSection: PatientName not found");
         }

         if (data["StudyDate"] == null) {
             console.log("ERROR: displayHeaderSection: StudyDate not found");
         }

         if (data["StudyTime"] == null) {
             console.log("ERROR: displayHeaderSection: StudyTime not found");
         }

         if (data["StudyInstanceUID"] == null) {
             console.log("ERROR: displayHeaderSection: StudyInstanceUID not found");
         }

         if (data["Manufacturer"] == null) {
             console.log("ERROR: displayHeaderSection: Manufacturer not found");
         }

         if (data["ManufacturerModelName"] == null) {
             console.log("ERROR: displayHeaderSection: ManufacturerModelName not found");
         }

         jQuery('#study-info-text').text(JSON.stringify(data["message"]));
         if (data["status"] == 1) {
             jQuery('#study-info-text').css({'background-color':'lightgreen'});
         } else {
             jQuery('#study-info-text').css({'background-color':'PaleVioletRed'});
         }

         jQuery('#header-section').children().remove();
         var str = "";
         str = str.concat("<li class=\"status"+data["status"]+"\">");
         str = str.concat("<div class='SeriesName' title='Study information entered at the scanner.'>Study Information</div>");
         str = str.concat("<div class='shortmessage'>Short Message: " + data["shortmessage"] + "</div>");
         str = str.concat("<div class='PatientID'>Patient ID: " + data["PatientID"] + "</div>");
         str = str.concat("<div class='PatientName'>Patient Name: " + data["PatientName"] + "</div>");
         str = str.concat("<div class='StudyDate'>Study Date: " + data["StudyDate"] + "</div>");
         str = str.concat("<div class='StudyTime'>Study Time: " + data["StudyTime"] + "</div>");
         str = str.concat("<div class='StudyInstanceUID'>Study Instance UID: " + data["StudyInstanceUID"] + "</div>");
         str = str.concat("<div class='Manufacturer'>Manufacturer: " + data["Manufacturer"] + "</div>");
         str = str.concat("<div class='ManufacturerModelName'>Manufacturer Model Name: " + data["ManufacturerModelName"] + "</div>");
         str = str.concat("</li>");
         str = str.concat("");
         jQuery('#header-section').append(str);
}

function displayDetectedScans(data, StudyInstanceUID) {
  
         var keys = Object.keys(data);
         console.log("displayDetectedScans: keys: " + keys);
         jQuery('#detected-scans').children().remove();
         
         var str = "<ul>";
         for (var i = 0; i < keys.length; i++) {
             var value = data[keys[i]];
             
             // check if this is a series or a block of series
             if (value["file"] == null) {

                 // this JSON object does not contain the "file" field, so it must be a block
                 // iterate through the JSON objects contained within this block.
                 var keys2 = Object.keys(value);
                 console.log("displayDetectedScans: keys2: " + keys2);

                 str = str.concat("<li class=\"status" + value["status"] + "\">");
                 str = str.concat("<div class='SeriesName'>" + keys[i] + "</div>");
                 str = str.concat("<div class='message'>" + value["message"] + "</div>");
                 str = str.concat("</li>");
                 str = str.concat("");

                 str = str.concat("<ul>");
                 for (var j = 0; j < keys2.length; j++) {
                     var value2 = value[keys2[j]];
                     if (value2["file"] != null) {
                         // found a series inside a block
                         str = str.concat(displaySeries(value2, keys2[j], StudyInstanceUID));
                     }
                 } 
                 str = str.concat("</ul>");

             } else {
                 // SeriesNumber found, this is a series
                 str = str.concat(displaySeries(value, keys[i], StudyInstanceUID));
             }
         }
         str = str.concat("</ul>");
         jQuery('#detected-scans').append(str);
}

function displaySeries(series, seriesName, StudyInstanceUID) {
         
         if (series["status"] == null) {
             console.log("ERROR: displaySeries: status not found");
         }

         if (series["SeriesNumber"] == null) {
             console.log("ERROR: displaySeries: SeriesNumber not found");
         }

         if (series["SeriesInstanceUID"] == null) {
             console.log("ERROR: displaySeries: SeriesInstanceUID not found");
         }

         //if (series["SeriesInstanceUID"] == null) {
         //    console.log("ERROR: displaySeries: SeriesInstanceUID not found");
         //}

         if (series["message"] == null) {
             console.log("ERROR: displaySeries: message not found");
         }

         // status workflow
         // acquired  (not in /quarantine)
         // readyToSend (in /quarantine)
         // transit (in /outbox)
         // transferred (in /DAIC)

         var transferStatus = "acquired";
         var filePath = null;
         if (series["file"] == null) {
             console.log("ERROR: displaySeries: file not found");
         } else {
             filePath = series["file"][0]["path"];
             transferStatus = filePath.substring(0,filePath.lastIndexOf("/")+1);
         }

         var str = "";
         str = str.concat("<li class=\"status"+series["status"]+"\">");
         str = str.concat("<div class='SeriesName'>" + seriesName + "</div>");
         str = str.concat("<div class='message'><p>" + series["message"] + "</p></div>");
         var id = "transferStatus"+createUUID();
         str = str.concat("<div id=\""+id+"\" class='TransferStatus'>TransferStatus: " + transferStatus + "</div>");
         str = str.concat("<div class='SeriesNumber'>SeriesNumber: " + series["SeriesNumber"] + "</div>");
         if (transferStatus == "/quarantine/") {
             str = str.concat("<button type='button' class='mdl-button send-series-button mdl-js-button mdl-button--raised pull-right' filename=\"" + filePath + "\" StudyInstanceUID =" + StudyInstanceUID + " SeriesInstanceUID=" + series['SeriesInstanceUID'] + ">Send</button></div>");
         }
         str = str.concat("</li>");
         str = str.concat("");
         //jQuery('#detected-scans').append(str);

         // update transfer status based on what fileStatus.php returns for this series (acquired, readytosend, transit, transfer)
         jQuery.getJSON('/php/fileStatus.php?filename=' + filePath, (function(id) {
             // return a function that knows about our series Instance UID variable
             return function(data) {
	         if (data.length == 0) {
		   jQuery('#'+id).text("TransferStatus: FILE_NOT_FOUND_ERROR");
                 }
		 for (var i = 0; i < data.length; i++) {
	           console.log("series instance uid: " + id + "  " + data[i].message + " " + data[i].filename);
		   jQuery('#'+id).html("TransferStatus: " + data[i].message + " <span title=\"" + data[i].filename + "\" >(path)</span>");
                 }
             };
           })(id)
         );
         return str;
}

function createUUID() {
    // http://www.ietf.org/rfc/rfc4122.txt
    var s = [];
    var hexDigits = "0123456789abcdef";
    for (var i = 0; i < 36; i++) {
        s[i] = hexDigits.substr(Math.floor(Math.random() * 0x10), 1);
    }
    s[14] = "4";  // bits 12-15 of the time_hi_and_version field to 0010
    s[19] = hexDigits.substr((s[19] & 0x3) | 0x8, 1);  // bits 6-7 of the clock_seq_hi_and_reserved to 01
    s[8] = s[13] = s[18] = s[23] = "-";

    var uuid = s.join("");
    return uuid;
}

function displayAdditionalScans(data, StudyInstanceUID) {

         var str = "";
         str = str.concat("<li>");
         str = str.concat("<div class='SeriesName'>Additional Series</div>");
         str = str.concat("</li>");
         str = str.concat("");

         var item;
         if (typeof data["AdditionalSeries"] == 'undefined') {
	         return;
         }
         var array = data["AdditionalSeries"];
         for (var i = 0; i < array.length; i++) {
             var item = array[i];
             console.log("item[ClassifyType]: " + JSON.stringify(item["ClassifyType"]));
             var classifyType = item["ClassifyType"];
             var seriesName = "ClassifyType: " + JSON.stringify(classifyType)
             str = str.concat(displaySeries(item, seriesName, StudyInstanceUID));
         }
         jQuery('#detected-scans').append(str);
     }

// get valid session names                                                                                                                                                                  
function getSessionNamesFromREDCap() {
    jQuery.getJSON('/php/getRCEvents.php', function(data) {
        jQuery('#session-name').children().remove();
        for (var i = 0; i < data.length; i++) {
            val = "";
            if (i == 1) {
                val = "selected=\"selected\"";
            }
            jQuery('#session-name').append("<option " + val + " value=\"" + data[i].unique_event_name + "\">" + data[i].event_name + "</option>");
        }
        getParticipantNamesFromREDCap();
    });
}

function getParticipantNamesFromREDCap() {
    jQuery.getJSON('/php/getParticipantNamesFromREDCap.php', function(data) {
        jQuery('#session-participant').children().remove();
        for (var i = 0; i < data.length; i++) {
            jQuery('#session-participant').append("<option class=\"drop-down-item\" value=\"" + data[i] + "\">" + data[i] + "</option>");
        }
	jQuery('#session-participant').val(null);
    });
}

var editor = "";    // one for setup
var editor2 = "";   // one for series informations
jQuery(document).ready(function() {

    jQuery('#list-of-subjects').on('click', '.pull-study', function() {
       // pull this study over from FIONA
       var study = jQuery(this).attr('study');
       if (study != "") {
	  // ask the scanner to send us this studies images
	  jQuery.get('/php/scanner.php?action=getStudy&study=' + study);
          /*jQuery(this).parent().find("li").each(function() {
	    var series = jQuery(this).attr('key');
            if (series != "") {
     	      jQuery.get('/php/scanner.php?action=get&series=' + series);
            }
          }); */
       }
    });

    loadSubjects();
    // TODO: temporarily disabled this until I am done debugging
    setTimeout(function() { loadSystem(); }, 100);
    //setInterval(function() { loadSystem(); }, 5000);
    createCalendar();

    // disable the circles for now
    //createCircles();
    // disable the bars for now			
    //createBars();

    jQuery('#load-subjects').click(function() {
	loadSubjects();
    });
    jQuery('#load-studies').click(function() {
	loadStudies();
    });
    jQuery('#load-scanner').click(function() {
	loadScanner();
    });

    jQuery('#receive-dicom-label').change(function() {
       changeSystemStatus();
     });
    jQuery('#receive-mpps-label').change(function() {
       changeSystemStatus();
    });
    jQuery('#anonymize-label').change(function() {
       changeSystemStatus();
    });

    var dialog = document.querySelector('#modal-series-info');
    if (!dialog.showModal) {
       dialogPolyfill.registerDialog(dialog);
    }
    jQuery('#list-of-subjects').on('click', '.open-series-info', function() {
      var dialog = document.querySelector('#modal-series-info');
      dialog.showModal();
      if (editor2 == "") {
             editor2 = ace.edit("series-info-text");
             editor2.setTheme("ace/theme/chrome");
             editor2.getSession().setMode("ace/mode/javascript");
             editor2.setValue("try to load series info...\n");
      }
      if (editor2 !== "") {
         editor2.setValue( JSON.stringify( studyData[ jQuery(this).attr('key') ][ jQuery(this).attr('entry') ], null, 4 ) );
         editor2.selection.moveTo(1,0);
      }

    });

    var dialog = document.querySelector('#modal-study-info');
        if (!dialog.showModal) {
        dialogPolyfill.registerDialog(dialog);
    }
    var studyinstanceuid;
    jQuery('#list-of-subjects').on('click', '.open-study-info', function() {
        console.log("clicked on study: ");
        var dialog = document.querySelector('#modal-study-info');
        dialog.showModal();
        jQuery('#session-participant').val(null);
	jQuery('#session-run').val(null);

	// get list of valid participant names from our database	
        getSessionNamesFromREDCap();	 	

        studyinstanceuid  = jQuery(this).attr('studyinstanceuid');
        seriesinstanceuid = jQuery(this).attr('seriesinstanceuid');
        console.log("studyinstanceuid: " + studyinstanceuid);
        console.log("seriesinstanceuid: " + seriesinstanceuid);

        var options = {
            "action": "getStudy",
            "study": studyinstanceuid
        };
        jQuery.getJSON('/php/existingData.php', options, function(data) {
            dataSec1 = {};
            dataSec2 = {};
            dataSec3 = {};
            var keys = Object.keys(data);
            console.log("keys: " + keys);
            for (var i = 0; i < keys.length; i++) {

                var value = data[keys[i]];
                if (Array.isArray(value)) {
                    dataSec3[keys[i]] = value;
                } else if (typeof value === 'object') {
                    dataSec2[keys[i]] = value;
                } else if (typeof value === 'string') {
                    dataSec1[keys[i]] = value;
                } else {
                    alert("Error: No existing data, perhaps protocol compliance check was not run.");
                }
            }
            console.log(dataSec1);
            displayHeaderSection(dataSec1);
            displayDetectedScans(dataSec2, studyinstanceuid);
            displayAdditionalScans(dataSec3, studyinstanceuid);

        });

    });

    var dialogCP = document.querySelector('#modal-change-password');
    if (!dialogCP.showModal) {
       dialogPolyfill.registerDialog(dialogCP);
    }
    var closeButton = dialogCP.querySelector('#change-password-cancel');
    var closeClickHandler = function (event) {
       dialogCP.close();
    }
    closeButton.addEventListener('click', closeClickHandler);

    var closeButton = dialogCP.querySelector('#change-password-save');
    var closeClickHandler = function (event) {
       dialogCP.close();
    }
    closeButton.addEventListener('click', closeClickHandler);

    var dialog = document.querySelector('#modal-setup');
    if (!dialog.showModal) {
       dialogPolyfill.registerDialog(dialog);
    }
    jQuery('#dialog-change-password-button').click(function() {
      var dialog = document.querySelector('#modal-change-password');
      dialog.showModal();
    });

    jQuery('#dialog-setup-button').click(function() {
      var dialog = document.querySelector('#modal-setup');
      dialog.showModal();
      jQuery.get('php/config.php', function(data) {
          if (editor == "") {
             editor = ace.edit("setup-text");
             //editor.setTheme("ace/theme/monokai");
             editor.setTheme("ace/theme/chrome");
             editor.getSession().setMode("ace/mode/javascript");
             editor.setValue("try to load settings...\n");
          }

 	  if (editor !== "") {
             editor.setValue(data);
          }
      });

    });
    jQuery('#setup-dialog-save').click(function() {
	jQuery.getJSON('php/config.php', { "action": "save", "value": editor.getValue() }, function(data) {
	    // did saving the data work?
            alert(data);
        });
    });

    jQuery('#dialog-about-button').click(function() {
       var dialog = document.querySelector('#modal-about');
       if (!dialog.showModal) {
         dialogPolyfill.registerDialog(dialog);
       }
       dialog.showModal();
    });
    var closeButton = dialog.querySelector('#setup-dialog-cancel');
    var closeClickHandler = function (event) {
       dialog.close();
    }
    closeButton.addEventListener('click', closeClickHandler);
    jQuery('.close-dialog').click(function() {
       var dialog = document.querySelector('#modal-about');
       dialog.close();
    });
    jQuery('#study-info-dialog-cancel').click(function() {
       var dialog = document.querySelector('#modal-study-info');
       dialog.close();     
    });
    jQuery('#study-info-dialog-sendall').click(function() {
       // check if we are allowed to send yet
       if (jQuery('#session-participant').val() == null || jQuery('#session-name').val() == null || jQuery('#session-run').val() == null) {
   	  alert("Please select a valid (screened) participant before uploading data");
	  return;
       }	

       var buttons = jQuery('#detected-scans .send-series-button');
       for (var i = 0; i < buttons.length; i++) {
          console.log("Try to press the send button for series " + jQuery(buttons[i]).attr('filename'));
	  jQuery(buttons[i]).trigger('click');
       }
       alert('Send ' + buttons.length + ' series to /data/outbox');
    });

         // onClick
    jQuery('#detected-scans').on('click', '.send-series-button', function() {
         
         // TODO: Send Study Info
         var StudyInstanceUID = jQuery(this).attr('StudyInstanceUID');
         var SeriesInstanceUID = jQuery(this).attr('SeriesInstanceUID');
         var filename = jQuery(this).attr('filename');
         // alert("send-series-button: StudyInstanceUID: " + StudyInstanceUID + " SeriesInstanceUID: " + SeriesInstanceUID);
	 if (jQuery('#session-participant').val() == null || jQuery('#session-name').val() == null || jQuery('#session-run').val() == null) {
		alert("Please select a valid (screened) participant before uploading data");
		return;
         }
				
         var options = {
             "filename": filename,
	     "id_redcap" : jQuery('#session-participant').val(),
	     "redcap_event_name": jQuery('#session-name').val(),
             "run": jQuery('#session-run').val()
         };
         jQuery.getJSON('/php/sendToDAIC.php', options, function(data) {
             alert(JSON.stringify(data));
         });
         //var dialog = document.querySelector('#modal-study-info');
         //dialog.close();     
     });
     jQuery('#series-info-dialog-cancel').click(function() {
         var dialog = document.querySelector('#modal-series-info');
         dialog.close();     
     });
         
});

</script>
    
  </body>
</html>
