<?php
require_once(dirname(__FILE__).'/../config/ProjectConfiguration.class.php');

// get the domain parts as an array
list($tld, $domain, $subdomain, $subdomain2) = array_reverse(explode('.', $_SERVER['HTTP_HOST']));

// determine which subdomain we're looking at
$env = ( $subdomain == 'dev' ) ? 'dev' : 'prod';
$app = ( $subdomain == 'dev' ) ? $subdomain2 : $subdomain;
$app = (empty($app) || $app == 'www' ) ? 'frontend' : $app;

// determine which app to load based on subdomain
if (!is_dir(realpath(dirname(__FILE__).'/..').'/apps/'.$app))
{
  $configuration = ProjectConfiguration::getApplicationConfiguration('frontend', $env, false);
}
else
{
  $configuration = ProjectConfiguration::getApplicationConfiguration($app, $env, false);
}

sfContext::createInstance($configuration)->dispatch();