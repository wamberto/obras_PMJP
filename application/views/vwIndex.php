<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo HTTP_CSS_PATH; ?>favicon.png">
    <title>Free Codeigniter Admin Panel with Twitter Bootstrap 3.0 - .arkAdminPanel Ver 1.0</title>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo HTTP_CSS_PATH; ?>bootstrap.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="<?php echo HTTP_JS_PATH; ?>html5shiv.js"></script>
      <script src="<?php echo HTTP_JS_PATH; ?>respond.min.js"></script>
    <![endif]-->
	<script src="<?php echo HTTP_JS_PATH; ?>das.js"></script>
  </head>
<body>
    <?php
    $pg = isset($page) && $page != '' ?  $page :'home'  ;    
    ?>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url(); ?>">ARK Admin Panel</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li <?php echo  $pg =='home' ? 'class="active"' : '' ?>><a href="<?php echo base_url(); ?>">Home</a></li>
            <li <?php echo  $pg =='about' ? 'class="active"' : '' ?>><a href="<?php echo base_url(); ?>aboutus">About</a></li>
            <li <?php echo  $pg =='contact' ? 'class="active"' : '' ?>><a href="<?php echo base_url(); ?>contactus">Contact</a></li>
                 <li <?php echo  $pg =='signup' ? 'class="active"' : '' ?>><a href="<?php echo base_url(); ?>signup">SignUp</a></li>

          </ul>
          <form class="navbar-form navbar-right">
            <div class="form-group">
              <input type="text" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </div>
    
     <div class="container">
         <?php echo $show_contents; ?>
     <hr>
    
    <footer>
     <p>&copy; Company <?php echo date('Y') ?>. ark Admin Panel for Codeigniter. Downloaded from <a href='http://devzone.co.in' target='_blank'>http://devzone.co.in</a></p>
    </footer>
    </div> <!-- /container -->
  
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo HTTP_JS_PATH; ?>jquery.js"></script>
    <script src="<?php echo HTTP_JS_PATH; ?>bootstrap.min.js"></script>
  </body>
</html>

