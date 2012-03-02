<div class="inner">
<article class="full-width clearfix"> 
  <div class="w50p">
    <?php foreach ($products as $p): ?>
      <h4><a href="<?php 
              echo url_for('world_product',
                            array('sf_subject' => $p,
                                  'colorscheme_slug' => $colorscheme->getSlug(),
                                  'category_slug' => $category->getSlug()
                                )) ?>"><?php echo $p->getName() ?></a></h4>
    <?php endforeach ?>
  </div>
</article>
</div>