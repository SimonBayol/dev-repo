<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
	<link rel="stylesheet" href="<?php echo PUBLICDIR ;?>css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?php echo PUBLICDIR ;?>css/bootstrap-responsive.min.css" />
	<link rel="stylesheet" href="<?php echo PUBLICDIR ;?>css/style.css" />
	<link rel="stylesheet" href="<?php echo PUBLICDIR ;?>css/colorbox.css" />
	<link rel="stylesheet" href="<?php echo PUBLICDIR ;?>css/bootstrap-lightbox.min.css" />
    <link href='http://fonts.googleapis.com/css?family=Merriweather+Sans&subset=latin,latin-ext' rel='stylesheet' type='text/css'/>
        
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="<?php echo PUBLICDIR ;?>js/jquery-1.7.2.js" type="text/javascript" ></script>
	<script src="<?php echo PUBLICDIR ;?>js/bootstrap-lightbox.min.js"></script>
	<script src="<?php echo PUBLICDIR ;?>js/bootstrap.js"></script>
	
	<script src="<?php echo PUBLICDIR ;?>js/ascenceur.js" type="text/javascript"></script>
	<script src="<?php echo PUBLICDIR ;?>js/jquery.fullscreenr.js" type="text/javascript"></script>
	<script type="text/javascript">  
		<!--
			// You need to specify the size of your background image here (could be done automatically by some PHP code)
			var FullscreenrOptions = {  width: 750, height: 500, bgID: '#bgimg' };
			// This will activate the full screen background!
			jQuery.fn.fullscreenr(FullscreenrOptions);
		//-->
	</script>
	<script src="<?php echo PUBLICDIR ;?>js/jquery.colorbox-min.js"></script>
	<script type="text/javascript">
			$(document).ready(function(){
				$(".group1").colorbox({rel:'group1', transition:"none", maxWidth:"600px", maxHeight:"600px", current:"image {current} / {total}"});
			});
	</script>
</head>
<body>

<?php 
include('background.php');
?>
<div id="realBody">
    <div id="calqueoverlay">
<div  class="container-fluid">
	<div class="row-fluid">
		<header class="span3">
		<?php include('logo.php'); ?>
		</header>
		<?php include('login.php'); ?>
	</div>
	<div class="row-fluid topmarge20" >
		<section class="span2 ">
		<?php include('nav.php');?>
		</section>
		<section  class="span8">
			<header class="ssnav">
			<?php include('onglet_nav.php') ;?>
			</header>
			<section id="content_max" class="topmarge20neg">
				<article class="article ">