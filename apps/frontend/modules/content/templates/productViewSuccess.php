<?php use_helper('Date') ?>
<?php use_helper('JavascriptRegister'); ?>
<?php use_helper('CssRegister'); ?>

<?php slot('title', $product->getName() . ' - Marka Designs') ?>

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
    defaultTransitionDuration: 500,
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

<?php register_css() ?>
<style type="text/css">

  #pimg-wrapper {
    display:inline;
    position: relative;
    float: left;
    width: 580px;
    margin: 0;
  }

  #pinfo-wrapper {
    display:inline;
    position: relative;
    float: left;
    width: 380px;
    margin: 0;
  }

  #productinfo {
    margin: 10px;
  }

  #mainimage a { text-decoration:none; }

  ul.thumbs li {
    float: left;
    margin-bottom: 5px;
  }  

  .thumb img {
    padding: 1px;
    margin-right: 1px;
    border: 1px solid #aaa;
  }

  ul.thumbs li:last-child .thumb img {
    margin-right: 0px;
  }

  #slide img {
    padding: 1px;
    border: 1px solid #aaa;
  }

  hgroup { margin-top: 120px; }
  h1 { text-align: right; margin: 30px auto; }
  h3 { text-align: justify; margin: 10px auto; }

  #metainfo { margin-top: 20px; }
  div.hdr { font-size: 1.5em; font-weight: bold; }
  div.dat { font-size: 1.2em; margin: 4px 0px; }
  div.meta { margin: 5px auto; }

  #ctrlpanel { margin-top: 20px;}
  
  
  .lt-ie9 #mainimage img {
    position: relative;
    left: -3px;
  }

</style>
<?php end_register_css() ?>

<div class="clearfix">
  <div id="pimg-wrapper">
    <div id="mainimage" class="clearfix">
      <div id="slide"></div>
    </div>

    <div id="thumbs" class="clearfix">
      <ul class="thumbs noscript">
        <?php foreach ($images as $image) : ?>
          <li>
            <a class="thumb" href="<?php echo $image->getImagepath() ?>" title="Marka Designs : <?php echo $product->getName() ?>">
              <?php echo image_tag($image->getThumbnailpath(), array('alt' => $product->getName() . " Thumbnail", 'size' => sfConfig::get('app_product_image_thumbnail_size'))); ?>  
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>

  </div>

  <div id="pinfo-wrapper">
    <section id="productinfo">
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
<<<<<<< .mine
          <?php /*<div class="clearfix meta">
            <div class="w60p txtr hdr"><h4>Manufactured:</h4></div>
            <div class="w40p txtr dat"><?php echo time_ago_in_words($manufactured_timestamp) ?> ago</div>
          </div> */?>
=======
>>>>>>> .r43

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
          <a class="button right light" href="<?php echo '/world-of-marka?category_slug=' . $category->getSlug() . '&type_slug=' . $type->getSlug() ?>" style="margin-left: 20px;">Back</a>
        </footer>
    </section>
  </div>
</div>
