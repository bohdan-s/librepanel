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
?>

<?php
function dbConnect($username, $password, $database, $host = "localhost")
{
  $dsn = 'mysql:host=' . $host . ';dbname=' . $database . ';';

  try {
    $db = new PDO($dsn, $username, $password);
    return $db;
  } catch(PDOException $ex) {
    echo "An Error occured: " . $ex->getMessage();
    return false;
  }
  return false;
}

//function dbQuery($query, $db)
//{
//  foreach($db->query('SELECT * FROM domains') as $row)
//}
?>
