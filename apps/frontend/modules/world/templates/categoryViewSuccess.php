<style type="text/css">
  body > hr {
    border-color: <?php echo $colorscheme->getHexcolor1() ?>
  }
  
  .product {
    border: 2px solid <?php echo $colorscheme->getHexcolor1() ?>;
    border-radius: 5px;
    background-color: <?php echo $colorscheme->getHexcolor2() ?>;
    margin-bottom: 10px;
    padding: 10px;
  }
  
  .product h3 {
    text-align: center;
    margin: 10px auto;
  }
</style>

<article class="_900wide clearfix">
  
  <header class="tagline clearfix">
    <h1 style="display: inline-block;"><?php echo $colorscheme->getName() ?> - <?php echo $category->getName() ?></h1>
    <span><?php echo $category->getDescription() ?></span> 
  </header>

    <?php foreach ($products as $p): ?>
      <div class="w25p">
        <div class="product">
        <h3><a href="<?php 
              echo url_for('world_product',
                            array('sf_subject' => $p,
                                  'colorscheme_slug' => $colorscheme->getSlug(),
                                  'category_slug' => $category->getSlug()
                                )) ?>"><?php echo $p->getName() ?></a></h3>
        
        <img src="<?php echo $p->getImage() ?>" height="150" width="100%"/>
        </div>        
      </div>
    <?php endforeach ?>
      

</article>