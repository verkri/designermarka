<style type="text/css">
  .product {
    
    /*border: 2px solid #FF6464;
    border-radius: 5px;
    background-color: #FFE7E7;*/
    /*padding: 0px 10px 10px 10px;*/
  }
  
  .product h3 {
    margin: 5px auto;
    font-size: 2em;
    color: #FF6464;
  }
  
  .product h4 {
    margin: 5px;
    text-align: right;
    font-size: 1.8em;
    color: black;
  }
  
  #productlist li div{
    border: 1px solid transparent;
    padding: 10px;
  }
  
  #productlist li:hover div{
    border: 1px solid #FF6464;
    border-radius: 5px;
    background-color: #FFEAEA;
  }
  
  hgroup.tagline {
    padding-left: 10px;
  }
  
</style>

<header>
  <hgroup class="tagline clearfix">
    <h1><?php echo $colorscheme->getName() ?> - <?php echo $category->getName() ?></h1>
    <h2><?php echo $category->getDescription() ?></h2>
  </hgroup>
</header>

<section id="holder">

<ul id="productlist">
<?php foreach ($products as $p): ?>
  <li class="w25p clearfix">
    <a href="<?php
  echo url_for('world_product', array('sf_subject' => $p,
      'colorscheme_slug' => $colorscheme->getSlug(),
      'category_slug' => $category->getSlug()
  ))
  ?>">
    <div class="product">
 
      <?php $image = $p->getImages()->getFirst() ?>
      <?php if ( $image == null ) : ?>
        <img src="http://dummyimage.com/200x120/46475c/dadbe3.png&text=No Image" height="150" width="100%"/>
      <?php else : ?>
        <img src="<?php echo $image->getImagepath() ?>" height="150" width="100%"/>  
      <?php endif; ?>
        
      <h3><?php echo $p->getName() ?></h3>
      <h4>$<?php echo $p->getCadprice() ?>.0 CAD</h4>
    </div></a>
  </li>
<?php endforeach ?>
</ul>
  
</section>
