<?php

/**
 * cart actions.
 *
 * @package    sf_sandbox
 * @subpackage cart
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class cartActions extends sfActions
{
 
  public function executeShow(sfWebRequest $request)
  {
    $cart = $this->getUser()->cartContent();
    $this->products = array();
    foreach($cart as $token => $qty ) {
      $product = Doctrine_Core::getTable('MarkaProduct')->findBy('token',$token)->getFirst();
      if ( $product ) {
        $this->products[$token] = array('product' => $product, 'qty' => $qty);
      }
    }   
  }
  
  public function executePush(sfWebRequest $request)
  {
    $product = Doctrine_Core::getTable('MarkaProduct')->findBy('token', $request->getParameter('token'))->getFirst();
    $referer = $request->getReferer();
    
    if ( $product ) {
      $this->getUser()->addToCart($product->getToken());
      $this->getUser()->setFlash('flash_ok', 'PUSH OK');
    }
    else {
      $this->getUser()->setFlash('flash_error', 'PUSH ERROR');
    }
    $this->redirect($referer);    
  }
  
  public function executePop(sfWebRequest $request)
  {
    $product = Doctrine_Core::getTable('MarkaProduct')->findBy('token', $request->getParameter('token'));
    $referer = $request->getReferer();
    
    if ( $product && $this->getUser()->hasInCart($product->getToken()) ) {
      $this->getUser()->removeFromCart($product->getToken());
      $this->getUser()->setFlash('flash_ok', 'POP OK');
    }
    else {
      $this->getUser()->setFlash('flash_error', 'POP ERROR');
    }
    $this->redirect($referer);
  }
  
  public function executeClear(sfWebRequest $request)
  {
    $referer = $request->getReferer();
    $this->getUser()->clearCart();
    $this->getUser()->setFlash('flash_ok', 'CLEAR OK');
    $this->redirect($referer);
  }
}
