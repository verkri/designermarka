<?php

class MarkaProductUploadImageForm extends sfForm {

  public function configure() {
    if (!$product = $this->getOption('product')) {
      throw new InvalidArgumentException('You must provide a product object.');
    }

    for ($i = 0; $i < $this->getOption('size', sfConfig::get('app_product_upload_image_count') ); $i++) {
      $productImage = new MarkaProductImage();
      $productImage->Product = $product;

      $form = new MarkaProductImageForm($productImage);
      $form->configureForUpload();

      $this->embedForm($i, $form);
    }
    $this->mergePostValidator(new MarkaProductUploadImageValidatorSchema());
  }
  
}

?>
