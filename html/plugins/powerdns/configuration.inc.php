      <div class="page-header">
        <h2 class="form-heading">PowerDNS Config</h2>
      </div>
      <div class="container">
        <form class="form-horizontal" role="form">
<?php foreach ( $config['powerdns']['conf'] as $key => $value ) {?>
        <div class="form-group">
          <label class="col-sm-2 control-label"><?php echo($key); ?> <a href="3" title="<?php echo($value['description']); ?>">?</a></label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="<?php echo($key); ?>" placeholder="<?php echo($value['value']); ?>">
          </div>
        </div>
<?php } ?>
        </form>
      </div>
      <script>
        $(function() {
          $( a ).tooltip();
        });
      </script>
