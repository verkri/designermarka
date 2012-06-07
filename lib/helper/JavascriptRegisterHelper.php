<?php

class JavascriptRegister {
  static $content;
  static $functional;
  public static function add_content($addition) { 
    JavascriptRegister::$content .= $addition;
  }
  public static function add_functional($addition) { 
    JavascriptRegister::$functional .= $addition;
  }
  public static function get_functional() { return JavascriptRegister::$functional; }
  public static function get_content() { return JavascriptRegister::$content; }
}

function register_js() {
  ob_start();
}

function end_register_js() {
  JavascriptRegister::add_content(preg_replace('/<\/?script[^>]*>/e','', ob_get_clean()));
}

function end_register_js_fn() {
  JavascriptRegister::add_functional(preg_replace('/<\/?script[^>]*>/e','', ob_get_clean()));
}
?>
