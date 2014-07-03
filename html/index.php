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
session_start();
if(isset($_SESSION['LOGIN_STATUS']) && !empty($_SESSION['LOGIN_STATUS'])) {
  $authenticated = true;
} else {
  $authenticated = false;
}

if ( $authenticated === true ) {
  if ( isset($_GET, $_GET['page'], $_GET['action']) ) {
    if ( file_exists('plugins/'.$_GET['page'].'.inc.php') ) {
      include('plugins/'.$_GET['page'].'.inc.php');
    } else {
      echo('Error: Invalid Request');
    }
  }
}

?>
<?php
$config['site']['page_title'] = "LibrePanel";
$config['site']['base_url'] = "http://librepanel.bohdans.com/";
$config['project']['version'] = "alpha 0.0.1";

$config['plugin']['0']['enabled'] = true;
$config['plugin']['0']['menu_name'] = "DNS";
$config['plugin']['0']['plugin_name'] = "powerdns";
$config['plugin']['1']['enabled'] = true;
$config['plugin']['1']['menu_name'] = "Web";
$config['plugin']['1']['plugin_name'] = "apache";
$config['plugin']['2']['enabled'] = true;
$config['plugin']['2']['menu_name'] = "Mail";
$config['plugin']['2']['plugin_name'] = "postfix";

?>
<!DOCTYPE html>
<html>
  <head>
    <title><?php echo($config['site']['page_title']);?></title>
    <base href="<?php echo($config['site']['base_url']); ?>" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/default.css" rel="stylesheet">
  </head>
  <body>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
<?php if ( $authenticated === true ) { ?>
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><?php echo($config['site']['page_title']); ?></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
<?php
foreach ($config['plugin'] as $plugin) {
  if ( $plugin['enabled'] === true ) {
?>
            <li><a href="<?php echo($plugin['plugin_name']); ?>/"/><?php echo($plugin['menu_name']) ?></a></li>
<?php
  }
}
?>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Settings <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Global Settings</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Plugin Settings</li>
                <li><a href="#">DNS</a></li>
                <li class="divider"></li>
                <li><a href="#" class="logout">Loggoff</a></li>
                <li class="divider"></li>
                <li><a href="#">About</a></li>
              </ul>
            </li>
            <li><a href="#" class="logout"><?php echo($authenticated === true ? $_SESSION['USERNAME'] : 'Guest'); ?></a></li>
          </ul>
        </div>
      </div>
    </div>
<?php } ?>
<?php
if ( $authenticated === true ) {
  if ( isset($_GET) && isset($_GET['page'])) {
    if ( file_exists('plugins/'.$_GET['page'].'.inc.php') ) {
      include('plugins/'.$_GET['page'].'.inc.php');
    } else {
      echo('Error: Invalid Request');
    }
  } else {
    include('pages/home.inc.php');
  }
} else {
  include('pages/logon.inc.php');
}
?>
  <div id="footer">
    <div class="container">
      <p class="text-muted">
        LibrePanel - Copyright (c) 2014 Bohdan Sanders<br />
        Version: <?php echo($config['project']['version']); ?><br /><br />
     </p>
    </div>
  </div>

  <script type="text/javascript">
    $(document).ready(function() {
      $(".logout").click(function( event ) {
        event.preventDefault();
        $.post("includes/authentication.inc.php", {
          request: "logout",
        })
        .done(function( data ) {
          window.location='/';
        })
      });
    });
  </script>

  </body>
</html>
