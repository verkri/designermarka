<?php if ( $products->count() == 0 ) : ?>

<p class="notfound">No such Marka products found.</p>

<?php else : ?>

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
        <?php echo image_tag("http://dummyimage.com/".sfConfig::get('app_product_image_medium_size')."/e0e0e0/666666.png&text=No Image",
                array('size' => sfConfig::get('app_product_image_medium_size'), 'alt' => "No image", 'title' => "No image") ); ?>
      <?php else : ?>
        <?php echo image_tag($image->getMediumpath(),
                array('size' => sfConfig::get('app_product_image_medium_size'), 'alt' => $p->getName(), 'title' => $p->getName() )); ?> 
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

<?php endif; ?>