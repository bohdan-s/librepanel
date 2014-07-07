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

include('includes/functions.inc.php');
include('plugins/powerdns/default.conf.php');
include('plugins/powerdns/config.inc.php');

$recTypes = array("SOA", "NS", "A", "AAAA", "CNAME", "TXT", "SPF", "MX");

if ( isset($_GET, $_GET['page'], $_GET['action']) ) {
  if ( $_GET['action'] === "modifydomain" ) {
    if ( isset($_GET['id']) === false ) {
      echo('Error retriving ID');
      exit;
    }
    $domainid = $_GET['id'];
    $db = dbConnect($config['powerdns']['conf']['gmysql-user']['value'], $config['powerdns']['conf']['gmysql-password']['value'], $config['powerdns']['conf']['gmysql-dbname']['value'], $config['powerdns']['conf']['hostname']['value']);
    if ( $db === false ) {
      echo ('Error Connecting to DB!');
    }
?>
      <div class="container" style="padding: 0px; margin: 0px;">
        <form class="form" role="form">
          <div class="form-group">
            <div class="row">
              <div class="col-xs-3" style="padding: 0px;">Name</div>
              <div class="col-xs-1" style="padding: 0px; width: 90px;">Type</div>
              <div class="col-xs-6" style="padding: 0px;">Content</div>
              <div class="col-xs-1" style="padding: 0px; width: 60px;">Priority</div>
              <div class="col-xs-1" style="padding: 0px;">TTL</div>
              <div class="col-xs-1" style="padding: 0px; width: 40px;"></div>
            </div>



<?php foreach($db->query('SELECT * FROM records WHERE domain_id="' . $domainid . '"') as $row) {
        $content = htmlentities($row['content']);
        // to undo html_entity_decode($string);
?>
          <div class="form-group">
            <div class="row">
              <div class="col-xs-3" style="padding: 0px;"><input type="text" class="form-control" style="font-size: 12px;" value="<?php echo($row['name']); ?>"></div>
              <div class="col-xs-1" style="padding: 0px; width: 90px;"><select class="form-control" style="font-size: 12px;">
<?php   foreach ( $recTypes as $recType ) {
          if ( $recType == $row['type'] ) { ?>
                <option selected><?php echo($recType); ?></option>
<?php     } else { ?>
                <option><?php echo($recType); ?></option>
<?php     }
        }  ?>
              </select></div>
              <div class="col-xs-6" style="padding: 0px;"><input type="text" class="form-control" style="font-size: 12px;" value="<?php echo($content); ?>"></div>
              <div class="col-xs-1" style="padding: 0px; width: 60px;"><input type="text" class="form-control" style="font-size: 12px;" value="<?php echo($row['priority']); ?>"></div>
              <div class="col-xs-1" style="padding: 0px;"><input type="text" class="form-control" style="font-size: 12px;" value="<?php echo($row['ttl']); ?>"></div>
              <div class="col-xs-1" style="padding: 0px; width: 10px;"><span class="glyphicon glyphicon-remove" style="font-size: 14px; color: red;"></span><span class="glyphicon glyphicon-ok" style="font-size: 14px; color: green;" ></span></div>
            </div>
<?php } ?>
          </div>
<?php
  }
  elseif ( $_GET['action'] === "configuration" ) {
    include('plugins/powerdns/configuration.inc.php');
  }
  exit;
}

$db = dbConnect($config['powerdns']['conf']['gmysql-user']['value'], $config['powerdns']['conf']['gmysql-password']['value'], $config['powerdns']['conf']['gmysql-dbname']['value'], $config['powerdns']['conf']['gmysql-host']['value']);
if ( $db === false ) {
  echo ('Error Connecting to DB!');
}

?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
              <li><a href="#" class="navbar-brand">PowerDNS</a></li>
            </ul>
            <ul class="nav nav-sidebar">
            <div class="dropdown">
             &nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
              Select Domain
               <span class="caret"></span>
             </button>
             <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
               <li role="presentation"><a role="menuitem" tabindex="-1" href="#" class="manage-domain" id="new">New Domain</a></li>
               <li class="divider"></li>
<?php foreach($db->query('SELECT * FROM domains') as $row) { ?>
               <li role="presentation"><a role="menuitem" tabindex="-1" class="manage-domain" id="<?php echo($row['id']); ?>" href="#"><?php echo($row['name']); ?></a></li>
<?php } ?>
               <li class="devider"></li>
             </ul>
            </div>
            </ul>
            <ul class="nav nav-sidebar">
              <li><a href="" class="manage-configuration">Configuration</a></li>
            </ul>
          </div>
          <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" id="dynamic_content">stuff</div>
        </div>
      </div>

      <script type="text/javascript">
        $(document).ready(function() {
          $(".manage-domain").click(function( event ) {
            var $domain = $(this).text();
            $('#dropdownMenu1').text($domain);
            event.preventDefault();
            $.post("/powerdns/action=modifydomain/id=" + $(this).attr('id') + "/", {
            })
              .done(function( data ) {
                $('#dynamic_content').html(data);
            });
          });
          $(".manage-configuration").click(function( event ) {
            event.preventDefault();
            $.post("/powerdns/action=configuration/" + $(this).attr('id') + "/", {
            })
              .done(function( data ) {
                $('#dynamic_content').html(data);
            });
          });
        });
      </script>
