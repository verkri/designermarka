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

  .thumb img {
    padding: 2px;
    margin-bottom: 9px;
    border: 1px solid #aaa;
  }
    
  #slide {
    border: 1px solid #aaa;
    padding-top: 3px;
    padding-bottom: 3px;
    margin-top: 13px;
  }

  #productinfo > div {
    margin-left: 20px;
  }
  
  hgroup { margin-top: 120px; }
  h1 { text-align: right; margin: 30px auto; }
  h3 { text-align: justify; margin: 10px auto; }
  
  #metainfo { margin-top: 20px; }
  div.hdr { font-size: 1.5em; font-weight: bold; }
  div.dat { font-size: 1.2em; margin: 4px 0px; }
  div.meta { margin: 5px auto; }
 
  #mainimage a { text-decoration:none; }
  
  #ctrlpanel { margin-top: 20px;}
</style>
  
<section id="productimages" class="w60p">
  
  <div id="thumbs" class="w20p">
    <ul class="thumbs noscript">
      <?php foreach ($images as $image) : ?>
        <li>
          <a class="thumb" href="<?php echo $image->getImagepath() ?>" title="<?php echo $product->getName() ?>">
            <?php echo image_tag($image->getThumbnailpath(), array('alt' => $product->getName() . " Thumbnail", 'size' => sfConfig::get('app_product_image_thumbnail_size'))); ?>  
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
    
  <div id="mainimage" class="w80p clearfix">
    <div id="slide"></div>
  </div>
   
</section>  

<section id="productinfo" class="w40p">
  
  <div class="clearfix">
  <header class="clearfix">
    <hgroup>
      <h1><?php echo $product->getName() ?></h1>
      <h3><?php echo $product->getShort() ?></h2>
    </hgroup>
  </header>
  
  <p>
    <?php echo $product->getDescription() ?>
  </p>

  <aside id="metainfo" class="clearfix">
    <div class="clearfix meta">
      <div class="w60p txtr hdr"><h4>Manufactured:</h4></div>
      <div class="w40p txtr dat"><?php echo time_ago_in_words($manufactured_timestamp) ?> ago</div>
    </div>
    
    <div class="clearfix meta">
      <div class="w60p txtr hdr"><h4>In stock:</h4></div>
      <div class="w40p txtr dat"><?php
      switch ($product->getStockqty()) {
        case 0:
          echo "No item";
          break;
        case 1:
          echo "1 item";
          break;
        default:
          echo $product->getStockqty() . " items";
          break;
      }
      ?></div>
    </div>

    <div class="clearfix meta">
      <div class="w60p txtr hdr"><h4>Price:</h4></div>
      <div class="w40p txtr dat">$ <?php echo $product->getCadprice() ?>.0 CAD</div>
    </div>
  </aside>

  <footer id="ctrlpanel" class="clearfix">
    <a class="button right light" href="<?php echo '/world-of-marka?colorscheme=' . $colorscheme->getSlug() . '&category=' . $category->getSlug() ?>" style="margin-left: 20px;">Back</a>      
  </footer>
  
  </div>
</section>