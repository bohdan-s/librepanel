    <div class="container">
      <form class="form-horizontal" role="form">
<?php foreach ( $config['powerdns']['conf'] as $key => $value ) {?>
      <div class="form-group">
        <label class="col-sm-2 control-label"><?php echo($key); ?> <a href="#" class="disablehref" title="<?php echo($value['description']); ?>">?</a></label>
        <div class="col-sm-8">
          <input type="text" class="form-control" placeholder="<?php echo($value['value']); ?>">
        </div>
      </div>
<?php } ?>
      </form>
    </div>

    <script type="text/javascript">

      $(document).ready(function() {
        $(".disablehref").click(function( event ) {
          event.preventDefault();
        });
      });
    </script>
