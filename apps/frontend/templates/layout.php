<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">
<head>
  
  <!--[if lte IE 8]><meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" /><![endif]-->
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title><?php include_slot('title','Marka Designs'); ?></title>
  
  <?php include_javascripts() ?>  
  <?php include_stylesheets() ?>
  
  <link rel="shortcut icon" href="#"/>
  <!--[if lte IE 8]><link rel="stylesheet" type="text/css" href="css/lt8.css" media="screen"/><![endif]-->

</head>
<body>
 
<div id="wrapper">

  <?php include_partial('global/header') ?>
  <div id="main">
  <div class="main-area">
  
    <div class="content_full_width">
    <?php if ($sf_user->hasFlash('flash_ok')): ?>
      <p class="message_green">
        <?php echo $sf_user->getFlash('flash_ok') ?>
      </p>
      <p class="message_yellow">
        <?php echo Utility::debug($sf_user->cartContent()) ?>
      </p>
    <?php endif; ?>
    
    <?php if ($sf_user->hasFlash('flash_error')): ?>
      <p class="message_red">
        <?php echo $sf_user->getFlash('flash_error') ?>
      </p>
    <?php endif; ?>
    </div>
    <br class="clear">
      
    <div class="tools"><div class="holder"><div class="frame">
      <h1><?php include_slot('page-heading'); ?></h1>
    </div></div></div>
  
    <div class="main-holder">
    <?php echo $sf_content; ?>
    </div>
    
  </div>
  <?php include_partial('global/footer') ?>
  </div>
  
</div>
  
<script type="text/javascript" src="/js/jquery.cycle.all.min.js"></script>
<script type="text/javascript" src="/js/jquery-1-slider.js"></script>
<script type="text/javascript" src="/js/testimonial-slider.js"></script>

</body>
</html>