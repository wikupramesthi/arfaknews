<!DOCTYPE html>
 <html lang="en">
   <head>
	<title>Admin Panel</title>
	<meta name="keywords" content="Admin Panel"/>
	<meta name="description" content="Admin"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="<?=ASSETS_IMAGE?>icon.png" type="image/x-icon" />

	<!-- Bootstrap core CSS -->
	<link href="<?=ASSETS_CSS?>bootstrap.min.css" rel="stylesheet">

	<link href="<?=ASSETS_CSS?>signin.css" rel="stylesheet">
	<script src="<?=ASSETS_JS?>ie-emulation-modes-warning.js"></script>

     </head>
     <body>

  <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Login Admin</h3>
                    </div>
                    <div class="panel-body">
	       <form class="form-sign" role="form" method="post" action="<?=base_url()?>login/process">
		<?php if ($this->session->flashdata('msg')) { ?>
		<div class="alert alert-danger"><?=$this->session->flashdata('msg')?></div>
		<?php } ?>
                            <fieldset>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                                </div>
                                <div class="form-group">
                                   <input type="password" class="form-control" name="password" placeholder="Password" required>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                        	<button class="btn btn-lg btn-success btn-block" type="submit">Login</button>        
                        </fieldset>
	</form>
          </div>
        </div>
       </div>
      </div>
    </div>

	<script src="<?=ASSETS_JS?>ie10-viewport-bug-workaround.js"></script>

	</body>
</html>
