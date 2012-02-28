<?php

class myUser extends sfBasicSecurityUser
{
  public function addToCart($item) {
    $ids = $this->getAttribute('cart', array());
    if ( isset($ids[$item]) ) {
      ++$ids[$item];
    } else {
      $ids[$item] = 1;
    }
    $this->setAttribute('cart', $ids);
  }
    
  public function removeFromCart($item) {
    $ids = $this->getAttribute('cart', array());
    unset($ids[$item]);
    $this->setAttribute('cart', $ids);
  }
  
  public function clearCart() {
    $this->setAttribute('cart', array());
  }
  
  public function cartContent() {
    return $this->getAttribute('cart',array());
  }
  
}