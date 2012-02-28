<?php slot('page-heading', $category->getName()) ?>
<?php use_helper('Date') ?>

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

<?php foreach ($category_products as $product): ?>
  <div class="one_third">
  <h4><?php echo $product->getName() ?></h4>
  <div class="modern_img_frame modern_four_col_large">
    <div class="preload_four_col_large">
    <div class="attachment-fadeIn"><a href="<?php echo url_for('product_show',$product) ?>"><img src="/images/store/product/<?php echo $product->getId() ?>.png" alt="CSS Template" width="190" height="111" /></a></div></div>
  </div><!-- end modern_img_frame -->
  
  <p>Price: $<?php echo $product->getCadprice() ?></p>
  <p>Created: <?php echo time_ago_in_words(date_format(new DateTime($product->getFabricated()),'U')) ?> ago</p>
  <p>Uploaded: <?php echo time_ago_in_words(date_format(new DateTime($product->getCreatedAt()),'U')) ?> ago</p>
  </div><!-- end one_third -->
<?php endforeach ?>  
  
<br class="clear" />
</div>
