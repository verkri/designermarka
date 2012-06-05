<?php
require_once(dirname(__FILE__).'/../config/ProjectConfiguration.class.php');

// get the domain parts as an array
$domain_array = array_reverse(explode('.', $_SERVER['HTTP_HOST']));
list($tld, $domain) = $domain_array;
$subdomain = isset($domain_array[2]) ? $domain_array[2] : "";

// determine which subdomain we're looking at
$env = ( $tld == 'dev' ) ? 'dev' : 'prod';
$app = ( $subdomain == 'www' || empty($subdomain) ) ? 'frontend' : $subdomain;

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