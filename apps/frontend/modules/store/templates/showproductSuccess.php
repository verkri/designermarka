<?php slot('page-heading', $product->getName()) ?>
        
<!-- ***************** - START sub-nav - ***************** -->
<div id="sub_nav">
<ul class="sub-menu">

<?php foreach ($marka_categories as $i => $c): ?>
  <?php if ($c->getId() == $category->getId() ): ?>
  <li class="current_page_item">
  <?php else: ?>
  <li>
  <?php endif ?>
    
  <a href="<?php echo url_for('category_show',$c) ?>"><span><?php echo $c->getName() ?></span></a>
  
  </li>
<?php endforeach ?>
  
</ul>
</div><!-- end sub_nav -->
  
<div id="content">
<?php echo $product->getName() ?>
<br/>
<?php echo $product->getFabricated(); ?>
<br/>
<?php echo $product->getToken(); ?>
<br/>
<?php echo $product->getNameSlug(); ?>
</div>

<a href="/frontend_dev.php/cart/push/<?php echo $product->getToken() ?>" class="ka_button small_button small_coffee" target="" style="opacity: 0.7; "><span>Add to Cart</span></a>