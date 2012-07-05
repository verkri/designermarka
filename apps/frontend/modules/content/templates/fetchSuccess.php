<?php if ( $products->count() == 0 ) : ?>

<p class="notfound">No such Marka products found.</p>

<?php else : ?>

<?php if (! $is_featured_displayed ) : ?>
<div class="category_text clearfix">
  <p><?php echo $category->getDescription(); ?></p>
</div>
<?php endif ?>

<ul id="plist" class="clearfix">
<?php foreach ($products as $p): ?>
  <li class="w33p clearfix">
    <a href="<?php
      echo url_for('world_product', array('sf_subject' => $p,
        'type_slug' => $t_slug,
        'category_slug' => $cat_slug
      ))
      ?>">
      
      <article class="product clearfix">

      <?php $image = $p->getImages()->getFirst() ?>
      <?php if ( $image == null ) : ?>
        <?php echo image_tag("http://dummyimage.com/".sfConfig::get('app_product_image_medium_size')."/e0e0e0/666666.png&text=No Image",
                array('size' => sfConfig::get('app_product_image_medium_size'), 'alt' => "No image", 'title' => "No image") ); ?>
      <?php else : ?>
        <?php echo image_tag($image->getMediumpath(),
                array('size' => sfConfig::get('app_product_image_medium_size'), 'alt' => $p->getName(), 'title' => $p->getName() )); ?> 
      <?php endif; ?>
      
        <hgroup class="clearfix">
          <h1><?php echo $p->getName() ?></h1>
          <div class="w50p">
          <h2><?php echo $p->getCategory()->getName() ?></h2>
          </div>
          <h2 class="w50p price txtr">$<?php echo $p->getCadprice() ?>.0 CAD</h2>
        </hgroup>
        
      </article>
    </a>
  </li>
  
<?php endforeach ?>
</ul>

<?php endif; ?>