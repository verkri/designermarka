<?php

/**
 * product module configuration.
 *
 * @package    sf_sandbox
 * @subpackage product
 * @author     Your name here
 * @version    SVN: $Id: configuration.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class productGeneratorConfiguration extends BaseProductGeneratorConfiguration
{
  public function getCurrentImagesForm($product) {
    $ret = new sfForm;
    if ( $images != null ) {
      $i = 0;
      foreach ($product->getImages() as $image) {
        $form = new MarkaProductImageForm($image);
        $form->configureForDisplayAndRemove();

        $ret->embedForm($i++, $form);
      }
    }
    return $ret;
  }
  
  public function getUploadImagesForm($product) {
    return new MarkaProductUploadImageForm(null, array(
      'product' => $product
    ));
      /*
    $uploadform = new sfForm();
    for ($i = 0; $i < sfConfig::get('app_product_upload_image_count'); $i++) {
      $productImage = new MarkaProductImage();
      $productImage->Product = $product;

      $form = new MarkaProductImageForm($productImage);
      $form->configureForUpload();

      $uploadform->embedForm($i, $form);
    }
    return $uploadform;*/
  }
}
