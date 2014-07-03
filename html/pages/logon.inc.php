    <div class="container">
      <div class="page-header">
        <h1 class="form-signin-heading">Logon</h1>
      </div>
      <div class="container">
        <form class="form-signin" id="logon">
            <div class="form-group">
                <label></label>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="username" class="form-control" id="username" name="username" placeholder="Enter username" required autofocus>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
              <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
              </label>
            </div>
            <input type="submit" class="btn btn-lg btn-primary btn-block" id="submit-logon" value="Submit">
        </form>
      </div>
    </div>

    <script type="text/javascript">
      $(document).ready(function() {
        $("#logon").submit(function( event ) {
          event.preventDefault();
          $.post("includes/authentication.inc.php", {
            request: "login",
            username: trim($('#username').val()),
            password: trim($('#password').val()),
          })
          .done(function( data ) {
            if(data==='sucsess'){
              window.location='/';
            } else {
              alert( data );
            }
          });
        });
      });

      function trim(str) {
        var str=str.replace(/^\s+|\s+$/,'');
        return str;
      }
    </script>
