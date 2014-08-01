<?php
$recTypes = array("SOA", "NS", "A", "AAAA", "CNAME", "TXT", "SPF", "MX");

if ( isset($_GET['id']) === false ) {
  echo('Error retriving ID');
  exit;
}
$domainid = $_GET['id'];
$db = dbConnect($config['powerdns']['conf']['gmysql-user']['value'], $config['powerdns']['conf']['gmysql-password']['value'], $config['powerdns']['conf']['gmysql-dbname']['value']);
if ( $db === false ) {
  echo('Error Connecting to DB!');
  exit;
}
if ( isset($_GET['sort']) === true ) {
  $sort = $_GET['sort'];
} else {
 $sort = "name";
}

?>
      <div class="container" style="padding: 0px; margin: 0px;">
        <div class="form-group">
          <div class="row">
            <div class="col-xs-3" style="padding: 0px;"><a href="#" class="manage-domain-sort" value="name">Name</a></div>
            <div class="col-xs-1" style="padding: 0px;"><a href="#" class="manage-domain-sort" value="type">Type</a></div>
            <div class="col-xs-5" style="padding: 0px;"><a href="#" class="manage-domain-sort" value="content">Content</a></div>
            <div class="col-xs-1" style="padding: 0px;"><a href="#" class="manage-domain-sort" value="prio">Priority</a></div>
            <div class="col-xs-1" style="padding: 0px;"><a href="#" class="manage-domain-sort" value="ttl">TTL</a></div>
            <div class="col-xs-1" style="padding: 0px;"></div>
          </div>
<?php foreach($db->query('SELECT * FROM records WHERE domain_id="' . $domainid . '" ORDER BY ' . $sort) as $row) {
        $content = htmlentities($row['content']);
?>
          <form id="record-<?php echo($row['id']); ?>">
            <div class="row">
              <div class="col-xs-3" style="padding: 0px;"><input type="text" class="form-control" style="font-size: 12px;" value="<?php echo($row['name']); ?>"></div>
              <div class="col-xs-1" style="padding: 0px;"><select class="form-control" style="font-size: 12px;">
<?php   foreach ( $recTypes as $recType ) {
          if ( $recType == $row['type'] ) { ?>
                <option selected><?php echo($recType); ?></option>
<?php     } else { ?>
                <option><?php echo($recType); ?></option>
<?php     }
        }  ?>
              </select></div>
              <div class="col-xs-5" style="padding: 0px;"><input type="text" class="form-control" style="font-size: 12px;" value="<?php echo($content); ?>"></div>
              <div class="col-xs-1" style="padding: 0px;"><input type="text" class="form-control" style="font-size: 12px;" value="<?php echo($row['prio']); ?>"></div>
              <div class="col-xs-1" style="padding: 0px;"><input type="text" class="form-control" style="font-size: 12px;" value="<?php echo($row['ttl']); ?>"></div>
              <div class="col-xs-1" style="padding: 0px;"><span class="glyphicon glyphicon-trash delete-record" id="record-<?php echo($row['id']); ?>" style="font-size: 18px; color: red;"></span> <span class="glyphicon glyphicon-floppy-disk" style="font-size: 18px; color: green;"></span></div>
            </div>
          </form>
<?php } ?>
        </div>
      </div>

    <script text/javascript>
      $(document).ready(function() {
        $('.manage-domain-sort').click(function( event ) {
          event.preventDefault();
          postDynContent("/powerdns/action=modifydomain/id=<?php echo($_GET['id']); ?>/sort=" + $(this).attr('value') + "/");
        });
        $('.delete-record').on('click', function( event ) {

        });
      });
    </script>
