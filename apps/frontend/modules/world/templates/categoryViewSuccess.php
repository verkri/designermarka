<style type="text/css">
  .product {
    margin: 5px;
    border: 1px solid transparent;
    padding: 10px;
  }
  
  .product h3 {
    margin: 0px;
    font-size: 2em;
    color: #FF6464;
    float:left;
  }
  
  .product h4 {
    margin: 0px;
    text-align: right;
    line-height: 1.7em;
    font-size: 1.5em;
    color: black;
    float:right;
  }
  
  .product img {
    margin-bottom: 5px;
  }
  
  #productlist {
    margin: 0px;
  }
  
  #productlist li:hover div.product {
    border: 1px solid #aaa;
    border-radius: 5px;
  }
  
  hgroup.tagline {
    padding-left: 10px;
  }
  
</style>

<?php /*
<header>
  <hgroup class="tagline clearfix">
    <h1><?php echo $colorscheme->getName() ?> - <?php echo $category->getName() ?></h1>
    <h2>,,<?php echo $category->getDescription() ?>"</h2>
  </hgroup>
</header>

*/ ?>

<section id="holder">

<ul id="productlist" class="clearfix">
<?php foreach ($products as $p): ?>
  <li class="w25p clearfix">
    <a href="<?php
  echo url_for('world_product', array('sf_subject' => $p,
      'colorscheme_slug' => $colorscheme->getSlug(),
      'category_slug' => $category->getSlug()
  ))
  ?>">
    <div class="product">
 
      <?php $image = $p->getImages()->getFirst() ?>
      <?php if ( $image == null ) : ?>
        <img src="http://dummyimage.com/198x198/46475c/dadbe3.png&text=No Image" height="198" width="198"/>
      <?php else : ?>
        <?php echo image_tag($image->getMediumpath(),array('size' => sfConfig::get('app_product_image_medium_size'))); ?> 
      <?php endif; ?>
      
        <div class="clearfix">
          <h3><?php echo $p->getName() ?></h3>
          <h4>$<?php echo $p->getCadprice() ?>.0 CAD</h4>
        </div>
    </div></a>
  </li>
<?php endforeach ?>
</ul>
  
</section>
