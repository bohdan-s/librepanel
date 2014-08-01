
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

include_once('includes/functions.inc.php');
include('plugins/powerdns/default.conf.php');
include('plugins/powerdns/config.inc.php');

if ( isset($_GET, $_GET['page'], $_GET['action']) ) {
  if ( $_GET['action'] === "modifydomain" ) {
    include('plugins/powerdns/modifydomain.inc.php');
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
    <div class="navbar navbar-default navbar-fixed-top" style="margin-top: 50px;" role="navigation">
      <div class="container-fluid">
        <div class="navbar-inner">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-sub">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" style="font-size: 14px;" href="/powerdns/">&raquo; PowerDNS</a>
          </div>
          <div class="navbar-collapse collapse" id="navbar-collapse-sub">
            <ul class="nav navbar-nav">
              <li>
                <div class="btn-group navbar-btn">
                  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown"> Select Domain<span class="caret"></span></button>
                  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#" class="manage-domain" id="new">New Domain</a></li>
                    <li class="divider"></li>
<?php foreach($db->query('SELECT * FROM domains') as $row) { ?>
                    <li role="presentation"><a role="menuitem" tabindex="-1" class="manage-domain" id="<?php echo($row['id']); ?>" href="#"><?php echo($row['name']); ?></a></li>
<?php } ?>
                    <li class="divider"></li>
                  </ul>
                </div>
              </li>
              <li><a href="#" id="manage-configuration">Configuration</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="main" id="dynamic_content" style="margin-top: 60px;"></div>

    <script type="text/javascript">
      $(document).ready(function() {
        $(".manage-domain").click(function( event ) {
          var $domain = $(this).text();
          $('#dropdownMenu1').text($domain);
          event.preventDefault();
          postDynContent("/powerdns/action=modifydomain/id=" + $(this).attr('id') + "/");
        });

        $("#manage-configuration").click(function( event ) {
          event.preventDefault();
          postDynContent("/powerdns/action=configuration/" + $(this).attr('id') + "/");
        });
      });

      function postDynContent($post) {
          $.post($post, { })
            .done(function( data ) {
              $('#dynamic_content').html(data);
          });

      }
    </script>
