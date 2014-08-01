<?php
/*
 * This file is part of LibrePanel
 *
 * Copyright (c) 2014 Bohdan Sanders <http://bohdans.com/>
 *
 * This program is free software: you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the
 * Free Software Foundation, either version 3 of the License, or (at your
 * option) any later version.  Please see LICENSE.txt at the top level of
 * the source code distribution for details.
 */
?>
<?php
if ( !(isset($authenticated) && $authenticated === true )) {
  echo('<script>window.location.href = "/";</script>');
  echo('Please Login to access this page');
  exit;
}

// Set custom settings here if needed
//$config['powerdns']['conf_location'] = '/etc/pdns/pdns.conf';

// Load settings from file
if ( isset($config['powerdns']['conf_location']) && is_readable($config['powerdns']['conf_location']) ) {
  $fhandle = fopen($config['powerdns']['conf_location'], "r") or die("Unable to open file!");
  while ( ($line = fgets($fhandle) ) !== false) {
    if ( strpos($line, '#') !== 0 ) {
      $pref = explode ('=', $line, 2);
      if ( array_key_exists($pref[0], $config['powerdns']['conf']) ) {
        $config['powerdns']['conf'][$pref[0]]['value'] = trim($pref[1]);
      }
    }
  }
} else {
  echo('Failed to Open File');
}
fclose($fhandle);
?>
