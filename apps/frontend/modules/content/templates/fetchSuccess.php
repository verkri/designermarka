<style type="text/css">

  .product {
    margin: 10px 0px;
    border: 1px solid transparent;
    padding: 10px;
    background-color: rgb(255,240,240);
    border-radius: 5px;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    color: black;
  }
  
  #plist li:hover .product { border: 1px solid #ffb4b4; }
  
  #plist a:hover { text-decoration: none; }
  
  .product h1 { 
    font-size: 1.6em; 
    color: #f14343;
    text-shadow: #888 1px 1px 2px;
    -moz-text-shadow:  #888 1px 1px 2px;
    -webkit-text-shadow:  #888 1px 1px 2px;
    margin: 5px auto;
  }
  
  .product h2 { font-size: 1.3em; }
  
  .product img {
    border: 1px solid #888;
    padding: 2px;    
  }
  
  /*
  .product h3 {
    margin: 0px;
    font-size: 2em;
    color: crimson;
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
  
  .product img { margin-bottom: 5px; }
  #productlist { margin: 0px; }
  
  #productlist li:hover div.product {
    border: 1px solid #aaa;
  }
  */
</style>

<ul id="plist" class="clearfix">
  
<?php foreach ($products as $p): ?>
  <li class="w25p clearfix">
    <a href="<?php
      echo url_for('world_product', array('sf_subject' => $p,
        'colorscheme_slug' => $p->getColorScheme()->getSlug(),
        'category_slug' => $p->getCategory()->getSlug()
      ))
      ?>">
      
      <article class="product">

      <?php $image = $p->getImages()->getFirst() ?>
      <?php if ( $image == null ) : ?>
        <img src="http://dummyimage.com/198x198/46475c/dadbe3.png&text=No Image" height="143" width="143"/>
      <?php else : ?>
        <?php echo image_tag($image->getMediumpath(),array('size' => sfConfig::get('app_product_image_medium_size'))); ?> 
      <?php endif; ?>
      
        <hgroup>
          <h1><?php echo $p->getName() ?></h1>
          <h2><?php echo $p->getCategory()->getName() ?></h2>
          <h2 class="txtr">$<?php echo $p->getCadprice() ?>.0 CAD</h2>
        </hgroup>
        
      </article>
    </a>
  </li>
  
<?php endforeach ?>
</ul>