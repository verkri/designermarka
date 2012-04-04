<?php use_helper('JavascriptRegister'); ?>
<!doctype html>
<!--[if lt IE 7 ]> <html class="no-js ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->
<head>
<!--[if IE]><![endif]-->
    <?php include_http_metas() ?>
    <meta itemprop="name" content="">
    <meta itemprop="description" content="">
    <meta itemprop="image" content="">
    
    <title><?php include_slot('title','Marka Designs'); ?></title>
    <?php include_metas() ?>
    <link rel="shortcut icon" href="/images/favicon.ico" />
    <?php include_stylesheets() ?>

    <script type="text/javascript" src="/js/libs/modernizr-1.7.min.js"></script>
    <meta charset="UTF-8"/>
</head>

<!--[if lt IE 7 ]> <body class="ie6 _960wide"> <![endif]-->
<!--[if IE 7 ]>    <body class="ie7 _960wide"> <![endif]-->
<!--[if IE 8 ]>    <body class="ie8 _960wide"> <![endif]-->
<!--[if IE 9 ]>    <body class="ie9 _960wide"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<body class="_960wide">
<!--<![endif]-->
<?php include_partial('global/header') ?>

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

  <article class="clearfix">
  <?php echo $sf_content; ?>
  </article>
  <?php include_partial('global/footer') ?>

  <!--[if lt IE 7 ]>
    <script src="js/libs/dd_belatedpng.js"></script>
    <script>DD_belatedPNG.fix("img, .png_bg");</script>
  <![endif]-->
  <?php include_javascripts() ?>
  
  <script type="text/javascript">
  <?php echo JavascriptRegister::get_functional() ?>
  
  $(function() {
    <?php echo JavascriptRegister::get_content() ?>
  });
  </script>
  
</body>
</html>