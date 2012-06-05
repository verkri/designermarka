<?php
/**
 * Utility class for the whole project
 * Purpose: provide static methods
 */
class Utility {

    /**
     * Slugification of texts
     * Transforms any text to contain only a-zA-Z0-9- characters.
     */
    static public function slugify($text) {
        $text = preg_replace('/&/', '-and-', $text);
        // replace non letter or digits by -
        $text = preg_replace('#[^\\pL\d]+#u', '-', $text);
        // trim
        $text = trim($text, '-');
        // transliterate
        if (function_exists('iconv')) {
            $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        }
        // lowercase
        $text = strtolower($text);
        // remove unwanted characters
        $text = preg_replace('#[^-\w]+#', '', $text);
        if (empty($text)) {
            return 'n-a';
        }
        return $text;
    }
    
    static public function debug($mixed) {
      echo "<pre>";
      print_r($mixed);
      echo "</pre>";
    }

    static public function markaActiveCategories() {
      return Doctrine_Core::getTable('MarkaCategory')->getNotEmptyCategories();
    }
    
    static public function logModel($model,$string) {
      file_put_contents(sfConfig::get('sf_log_dir').DIRECTORY_SEPARATOR.$model.'.log', $string."\n", FILE_APPEND);
    }
}