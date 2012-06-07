<?php

class CssRegister {
  static $content;
  
  public static function add_content($addition) { 
    CssRegister::$content .= $addition;
  }
  
  public static function get_content() { return CssRegister::$content; }
}

function register_css() {
  ob_start();
}

function end_register_css() {
  CssRegister::add_content(preg_replace('/<\/?style[^>]*>/e','', ob_get_clean()));
}

?>
