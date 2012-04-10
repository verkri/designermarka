<style type="text/css">
.categorylist {
  margin-top: 200px;
}

.categorylist h1, .categorylist h2 {
  text-align: right;
}
.categorylist h1 { font-size: 6em; }
.categorylist h2 { font-size: 2em; }


.category-icon {
  float: right;
  width: 32px;
  height: 32px;
  padding: 2px 0px 2px 20px;
}

.categorylist h3 a {
  color: #888;
}

.categorylist h3 a:hover {
  color: red;
}

.categorylist h3 {
  float:right;
  font-size: 2em;
  font-family: 'Yanone Kaffeesatz', Helvetica, Arial, sans-serif;
  text-transform: uppercase;
  padding: 2px 0;
}

.categorylist hgroup {
  margin-bottom: 40px;
}

</style>

<section class="w50p">
  <?php if ( $colorscheme->hasImage() ) : ?>
    <?php echo image_tag($colorscheme->getImagepath(), array('size' => /*sfConfig::get('app_colorscheme_image_size')*/ "460x580") ); ?>
  <?php else : ?>
    <?php echo image_tag(sfConfig::get('app_colorscheme_default_image'), array('size' => sfConfig::get('app_colorscheme_image_size')) ); ?>
  <?php endif; ?>
</section>

<section class="w50p categorylist">
  <header>
    <hgroup class="clearfix">
      <h1><?php echo $colorscheme->getName() ?></h1>
      <h2><?php echo $colorscheme->getDescription() ?></h2> 
    </hgroup>
  </header>
  
  <ul>
  <?php foreach ($categories as $c): ?>
    <li class="w100p clearfix">
      <?php if ( $c->hasIcon() ) : ?>
        <?php echo image_tag($c->getIconpath(), array('size' => sfConfig::get('app_category_icon_size'), 'class' => 'category-icon')); ?>
      <?php else : ?>
        <?php echo image_tag(sfConfig::get('app_category_default_icon'), array('size' => sfConfig::get('app_category_icon_size'), 'class' => 'category-icon')); ?>
      <?php endif; ?>
      <h3 class="title" style="margin: 0;"> 
      <a href="<?php
  echo url_for('world_category', array('colorscheme_slug' => $colorscheme->getSlug(),
      'category_slug' => $c->getSlug())
  );
    ?>"><?php echo $c->getName() ?></a></h3>
    
    </li>
  <?php endforeach ?>
  </ul>
</section>
