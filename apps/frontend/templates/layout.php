<?php use_helper('JavascriptRegister'); ?>
<?php use_helper('CssRegister'); ?>
<?php use_helper('sfCombine') ?>

<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  
  <title><?php include_slot('title','Marka Designs'); ?></title>
  
  <meta name="viewport" content="width=device-width">
  <meta name="description" content="">
  <meta itemprop="name" content="">
  <meta itemprop="description" content="">
  <meta itemprop="image" content="">

  <link rel="shortcut icon" href="/favicon.ico" />
  <?php include_combined_stylesheets() ?>

  <script src="/js/libs/modernizr-1.7.min.js"></script>
  <script src="/js/libs/jquery.fs.zoomer.js"></script>

  <style type="text/css">
    <?php echo CssRegister::get_content() ?>
  </style>
  
  <?php if (sfConfig::get('sf_environment') == 'prod') : ?>
  <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-3008801-5']);
  _gaq.push(['_setDomainName', 'designermarka.com']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

  </script>
  <?php endif ?>
  
</head>

<body class="_960wide">
  
  <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
  
  <?php include_partial('global/header') ?>

  <article class="clearfix" id="maincontent">
    <?php echo $sf_content; ?>
  </article>

  <?php include_partial('global/footer') ?>

  <?php include_combined_javascripts() ?>
  
  <script type="text/javascript">
    <?php echo JavascriptRegister::get_functional() ?>
    $(function() {
      <?php echo JavascriptRegister::get_content() ?>
    });
  </script>
  
</body>
</html>