<?php use_helper('Date') ?>
<?php use_helper('JavascriptRegister'); ?>

<?php register_js() ?><script>
  
  var onMouseOutOpacity = 0.3;
  $('#thumbs ul.thumbs li').opacityrollover({
    mouseOutOpacity:   onMouseOutOpacity,
    mouseOverOpacity:  1.0,
    fadeSpeed:         'fast',
    exemptionSelector: '.selected'
  });
  
  
  $('#thumbs').galleriffic({
    delay:                     2500,
    imageContainerSel:         '#slide',
    enableHistory:             false,
    autoStart:                 false,
    syncTransitions:           false,
    defaultTransitionDuration: 900,
    onSlideChange:             function(prevIndex, nextIndex) {
      this.find('ul.thumbs').children()
      .eq(prevIndex).fadeTo('fast', onMouseOutOpacity).end()
      .eq(nextIndex).fadeTo('fast', 1.0);
    },
    onPageTransitionOut:       function(callback) {
      this.fadeTo('fast', 0.0, callback);
    },
    onPageTransitionIn:        function() {
      this.fadeTo('fast', 1.0);
    }
  });
</script><?php end_register_js() ?>


<style type="text/css">
  hgroup { padding-top: 120px; }
  
  h1 { font-size: 5em; text-align: right; }
  
  h2 {
    margin: 30px 0px;
    font-size: 1.5em;
    text-align: justify;
  }
  
  p { text-align: justify; }
  
  div.hdr {
    font-size: 1.5em;
    font-weight: bold;
    margin: 5px 0px;
    font-family: 'Yanone Kaffeesatz';
  }
  
  div.dat {
    font-size: 1.5em;
    margin: 5px 0px;
    font-family: 'Yanone Kaffeesatz';
  }
  
  .thumb img {
    /*padding: 2px 2px 0px 2px;
    margin: 2px 0px;*/
    padding: 2px;
    margin-bottom: 8px;
    border: 1px solid #aaa;
  }
   
  #slide {
    border: 1px solid #aaa;
    padding-top: 3px;
    padding-bottom: 3px;
    margin-top: 13px;
  }
  /*
  #slide span {
    position: relative;
    top: -16px;
  }
  
  #categories {
    padding: 10px 7px; 
    font-size: 1.5em;
  }*/
  
</style>

  <?php /*
  <aside id="categories" class="clearfix">
    <?php foreach ($colorscheme->getCategories() as $category) : ?>
      <a href="<?php
      echo url_for('world_category', array('colorscheme_slug' => $colorscheme->getSlug(),
        'category_slug' => $category->getSlug())
      );
      ?>"><?php echo $category->getName() ?></a>
    <?php endforeach ?>
  </aside>
  */ ?>

  <section id="productimages" class="w60p">
    <div id="thumbs" class="w20p">
      <ul class="thumbs noscript">
      <?php foreach ($images as $image) : ?>
          <li>
            <a class="thumb" href="<?php echo $image->getImagepath() ?>" title="<?php echo $product->getName() ?>">
              <?php echo image_tag($image->getThumbnailpath(), array('alt'=> $product->getName()." Thumbnail", 'size' => sfConfig::get('app_product_image_thumbnail_size'))); ?>  
            </a>
            <div class="caption"></div>
          </li>
      <?php endforeach; ?>
      </ul>
    </div>
    <div class="w80p clearfix">
      <div id="slide"></div>
    </div>
  </section>  
    
  <section id="productinfo" class="w40p">
    <header>
      <hgroup>
        <h1><?php echo $product->getName() ?></h1>
        <h2><?php echo $product->getShort() ?></h2>
      </hgroup>
    </header>
    <p>
      <?php echo $product->getDescription() ?>
    </p>
      
    <footer class="clearfix">
      <div class="w75p txtr hdr">Manufactured:</div>
      <div class="w25p txtr dat"><?php echo time_ago_in_words($manufactured_timestamp) ?> ago</div>
        
      <div class="w75p txtr hdr">In stock:</div>
      <div class="w25p txtr dat"><?php 
        switch ($product->getStockqty()) {
          case 0:
            echo "No item"; break;
          case 1:
            echo "1 item"; break;
          default:
            echo $product->getStockqty()." items"; break;
        }
      ?></div>
      
      <div class="w75p txtr hdr">Price:</div>
      <div class="w25p txtr dat">$ <?php echo $product->getCadprice() ?>.0 CAD</div>
    </footer>
      
    <aside id="cpanel" style="margin-top: 40px;" class="clearfix">
      <a class="button right light" href="#" style="margin-left: 20px;">Go Back</a>      
      <a class="button right light" href="#">Add to Cart</a>
      <a class="button right light" href="#">Add to Wishlist</a>
    </aside>
  </section>