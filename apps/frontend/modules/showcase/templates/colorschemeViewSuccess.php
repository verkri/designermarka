<?php slot('submenu-colorscheme',$colorscheme->getId()) ?>

<div class="inner">
<article class="full-width clearfix"> 
  <div class="w50p">
    <h1><?php echo $colorscheme->getName() ?></h1>
    <div style="height: 200px;">PIcture here</div>
  </div>
  <div class="w50p">
    <?php foreach ($categories as $c): ?>
    <h3 class="title">
      <a href="<?php 
        echo url_for('showcase_category',
                array('colorscheme_slug' => $colorscheme->getSlug(),
                      'category_slug' => $c->getSlug())
                );
                ?>"><?php echo $c->getName() ?></a></h3>
    <?php endforeach ?>
  </div>
</article>
</div>