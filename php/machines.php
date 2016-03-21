<?php
	
  $machines = [];
  $pw_file = 'machines.json';

  function loadDB() {
     global $pw_file;

     if (!file_exists($pw_file)) {
        // try to create the file
        file_put_contents($pw_file, "{}");
     }
     if (!is_readable($pw_file)) {
        echo ('error: cannot read machine file at '.$pw_file);
        return;
     }
     $d = NULL;
     $d = json_decode(file_get_contents($pw_file), true);
     if ($d == NULL) {
        echo('error: could not parse the machines file. Got: '.$d);
     }
     return $d;
  }
  function saveDB( $d ) {
     global $pw_file;

     if (!is_writable($pw_file)) {
        echo ('Error: cannot write machine file ('.$pw_file.')');
        return;
     }
     // be more careful here, we need to write first to a new file, make sure that this
     // works and copy the result over to the pw_file
     $testfn = $pw_file . '_test';
     file_put_contents($testfn, json_encode($d));
     if (filesize($testfn) > 0) {
        // seems to have worked, now rename this file to pw_file
	rename($testfn, $pw_file);
     } else {
        syslog(LOG_EMERG, 'ERROR: could not write machine data into '.$testfn);
     }
  }

  $data = loadDB();

  $action = "";
  if (isset($_GET['action'])) {
    $action = $_GET['action'];
  }

  if ($action == "create") {
    $name = uniqid('invention');
    if (isset($_GET['name'])) {
       $name = $_GET['name'];
    }
    // create a docker image with shellinabox (needs to be done by processing user)
    $id = uniqid('machine');
    touch('inventions/create_'.$id); // should start the creation from the processing user
    echo ("{ \"message\": \"Done\", \"id\": \"$id\" }");
    // start checking for this container, should come up soon
    return;
  } else if ($action == "start") {
    $id = "";
    if (isset($_GET['id'])) {
       $id = $_GET['id'];
    }
    // start a specific container
    if ($id != "") {
      touch('inventions/start_'.$id); // should start the creation from the processing user
      echo ("{ \"message\": \"Done\", \"id\": \"$id\" }");
      return;
    }
  } else if ($action == "save") {
    $id = "";
    if (isset($_GET['id'])) {
       $id = $_GET['id'];
    }
    // save a specific container
    if ($id != "") {
      touch('inventions/save_'.$id); // should start the creation from the processing user
      echo ("{ \"message\": \"Done\", \"id\": \"$id\" }");
      return;
    }
  } else if ($action == "stop") {
    $id = "";
    if (isset($_GET['id'])) {
       $id = $_GET['id'];
    }
    // stop a specific container
    if ($id != "") {
      touch('inventions/stop_'.$id); // should start the creation from the processing user
      echo ("{ \"message\": \"Done\", \"id\": \"$id\" }");
      return;
    }

  } else { // default action is to print all results
    echo(json_encode($data, JSON_PRETTY_PRINT));
    return;
  }


?>