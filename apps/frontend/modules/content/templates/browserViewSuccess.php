<?php use_helper('JavascriptRegister'); ?>
<?php use_helper('CssRegister'); ?>

<?php slot('title', 'Browse the Marka World - Marka Designs') ?>

<?php register_js() ?><script>
  $('.toggle-container h4').click(function () {
    var text = $(this).parent().children('.toggle-content');
    
    if (text.is(':hidden')) {
      text.slideDown('fast');
      $(this).addClass('active');		
    } else {
      text.slideUp('fast');
      $(this).removeClass('active');		
    }		
  });
   
  $('.category a').click(function() {
    $('li.category').removeClass('active');
    $(this).parent('li').addClass('active');
    
    $('#product-list').html('<p class="loader"><img src="/images/ajax-loader.gif" width="220" height="19"/><br/>Loading content ...</p>');
    $('#product-list').load($(this).attr('href'));
    return false;
  });
  
  // prefetch the featured products
  //$('#product-list').html('<p class="loader"><img src="/images/ajax-loader.gif" width="220" height="19"/><br/>Loading content ...</p>');
  <?php if ( $cat_slug.$t_slug == "" ) : ?>
    $('#product-nav .toggle-container:first-child h4').click();
    $('#product-nav .toggle-container:first-child a:first-child').click();
  <?php else : ?>
    $('#<?php echo $cat_slug ?>').click();
    $('#li-<?php echo $cat_slug.'_'.$t_slug ?> > a').click();
  <?php endif; ?>
    
</script><?php end_register_js() ?>

<?php register_css() ?>
<style type="text/css">

  .category_text {
    background: url('/images/black-alpha-20.png') repeat-x;
    
    border-radius: 5px;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    padding: 5px 20px;
    margin-top: 10px;
  }
  
  .category_text p {
    margin: 0;
    font-style: italic;
    font-size: 1.3em;
    color: white;
    text-shadow: #888 1px 1px 2px;
    -moz-text-shadow:  #888 1px 1px 2px;
    -webkit-text-shadow:  #888 1px 1px 2px;
  }
  
  p.loader, p.notfound { margin-top: 250px; text-align: center; font-size: 1.3em; }
  p.loader > img { margin-bottom: 10px;}
  
  p.fallback { margin-top: 250px;  font-size: 1.6em; }
  
  #product-nav { margin-top: 20px; }
  
  .toggle-container { width:100%; }

  .toggle-container { margin-bottom:4px; position:relative; cursor:pointer; overflow:hidden; }
  .toggle-container h4 { 
    color: #f14343;
    text-shadow: #888 1px 1px 2px;
    -moz-text-shadow:  #888 1px 1px 2px;
    -webkit-text-shadow:  #888 1px 1px 2px;
    
    text-decoration: none; 
    text-transform: 
    uppercase; 
    padding: 5px 5px 5px 40px; 
    font-size:2em;  
    margin:0; 
  }

  .toggle { background: url('/images/toggle.png') no-repeat 10px 10px; }
  h4.active { background: url('/images/toggle.png') no-repeat 10px -40px;}

  .toggle-container p, .toggle-container div { padding:10px 10px 10px 32px; margin:0px; } 
  .toggle-content { display:none; }
  
  .category {
    font-size: 1.5em;
    margin: 5px auto;
  }
  
  .product img {
    border: 1px solid #888;
    padding: 1px;
  }
  
  .product {
    margin: 5px 0px;
    border: 1px solid transparent;
    padding: 10px;
    border-radius: 5px;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    color: black;
  }
  
  #plist li:hover .product { 
    border: 1px solid #ffb4b4;
    background-color: rgb(255,250,250);
  }
  
  #plist a:hover { text-decoration: none; }
  
  .product h1 { 
    font-size: 1.8em; 
    color: #f14343;
    text-shadow: #888 1px 1px 2px;
    -moz-text-shadow:  #888 1px 1px 2px;
    -webkit-text-shadow:  #888 1px 1px 2px;
    margin: 5px auto;
  }
  
  .product h2 { font-size: 1.4em; }
  
  h2.price {
    font-size: 1.5em;
  }
  
  

</style>
<?php end_register_css() ?>

<nav class="w25p" id="product-nav">
  
  <?php if ($featured_count > 0) : ?>
  <div class="toggle-container">
    <h4 id="featured" class="toggle">Featured</h4>
    <div class="toggle-content">
      <ul>
        <li id="li-featured" class="category active"><a href="/fetch">Featured products</a></li>
      </ul>
    </div>
  </div>
  <?php endif ?>
  
  <?php foreach ($categories as $cat): ?>
  <div class="toggle-container">
    <h4 id="<?php echo $cat->getSlug() ?>" class="toggle"><?php echo $cat->getName() ?></h4>
    <div class="toggle-content">
      <ul>
        <?php foreach ($cat->getActiveTypes() as $type): ?>
          <li id="li-<?php echo $cat->getSlug() . '_' . $type->getSlug() ?>" class="category"><a href="/fetch/<?php echo $cat->getSlug() . '/' . $type->getSlug() ?>"><?php echo $type->getName() ?></a></li>
        <?php endforeach; ?>  
      </ul>
    </div>
  </div>
<?php endforeach ?>
    
</nav>

<section id="product-list" class="w75p">
   <p class="fallback">Sorry, there are no products uploaded yet. Stay tuned!</p>
</section>