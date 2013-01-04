<!DOCTYPE HTML> 
<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:og="http://ogp.me/ns#"
      xmlns:fb="http://www.facebook.com/2008/fbml"> 
<head>
	<meta charset="utf-8"> 
	<title><?=$meta_title?></title> 
	
	<link href="<?=base_url('public/css/bootstrap.min.css')?>" rel="stylesheet" media="all">
	<link href="<?=base_url('public/css/bootstrap-responsive.min.css')?>" rel="stylesheet" media="all">
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="<?=base_url('public/js/bootstrap.min.js')?>"></script>
	<script src="<?=base_url('public/js/main.js')?>"></script>
	
	<!--[if IE]>
	  	<script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]--> 
</head>
<body>
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="brand" href="<?=base_url()?>">Tango Carder</a>
				<div class="nav-collapse">
					<ul class="nav pull-right">
						<li><a href="http://tangocard.com/">Tango Card</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="container" style="margin-top: 60px;">
		<?php echo $yield; ?>
	</div>
	<div class="container">
		<hr>
		<footer class="footer">
			<p class="pull-right">a simple tango card app by <a href="http://ronaldarichardson.com/">ronald a. richardson</a></p>
		</footer>
	</div>
</body>
</html>