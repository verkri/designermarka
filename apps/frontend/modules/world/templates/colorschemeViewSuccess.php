<style type="text/css">
  body > hr {
    border-color: <?php echo $colorscheme->getHexcolor1() ?>
  }
</style>

<article class="_900wide clearfix">
  
  <header class="tagline clearfix">
    <h1><?php echo $colorscheme->getName() ?></h1>
    <span><?php echo $colorscheme->getDescription() ?></span> 
  </header>
   
  <section class="w50p">
    <img src="<?php echo $colorscheme->getImage() ?>" height="500" width="440" />
  </section>
  
  <div class="w50p">
    <?php foreach ($categories as $c): ?>
    <h2 class="title" style="margin: 0;"> 
      <a href="<?php 
        echo url_for('world_category',
                array('colorscheme_slug' => $colorscheme->getSlug(),
                      'category_slug' => $c->getSlug())
                );
                ?>"><?php echo $c->getName() ?></a></h2>
    <p style="margin: 0; margin-bottom: 20px;"><?php echo $c->getDescription() ?></p>
    <?php endforeach ?>
  </div>
</article>