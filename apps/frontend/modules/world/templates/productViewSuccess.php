<?php use_helper('Date') ?>

<style type="text/css">
  hgroup { padding-top: 150px; }
  
  h2 {
    margin: 30px 0px;
    font-size: 1.5em;
    text-align: justify;
  }
  
  p { text-align: justify; }
  
  div.hdr {
    font-size: 1.5em;
    font-weight: bold;
    margin: 5px 0px;
    font-family: 'Yanone Kaffeesatz';
  }
  
  div.dat {
    font-size: 1.5em;
    margin: 5px 0px;
    font-family: 'Yanone Kaffeesatz';
  }
    
</style>

<article class="full-width clearfix"> 
  
  <div class="w50p">
    <?php if ( $first_image == null ) : ?>
      <img src="http://dummyimage.com/200x120/46475c/dadbe3.png&text=No Image" height="450" width="450"/>
    <?php else : ?>
      <img src="<?php echo $first_image->getImagepath() ?>" height="450" width="450"/>  
    <?php endif; ?>
    
    <?php foreach ($other_images as $image) : ?>
      <div class="w50p">
        <img src="<?php echo $image->getImagepath() ?>" width="100%"/>  
      </div>
    <?php endforeach; ?>
  </div>

  <div class="w50p">
    <section>
      <header>
        
        <hgroup>
          <h1><?php echo $product->getName() ?></h1>
          <h2><?php echo $product->getShort() ?></h2>
        </hgroup>
      </header>
      <p>
        <?php echo $product->getDescription() ?>
      </p>

      <footer class="clearfix">
        <div class="w75p txtr hdr">Manufactured:</div>
        <div class="w25p txtr dat"><?php echo time_ago_in_words($manufactured_timestamp) ?> ago</div>

        <div class="w75p txtr hdr">Price:</div>
        <div class="w25p txtr dat">$ <?php echo $product->getCadprice() ?>.0 CAD</div>
      </footer>
      <br/>
      <div class="right">
          <a class="back" href="javascript: history.go(-1)" class="back">Back to <?php echo $product->getColorScheme(); ?> <?php echo $product->getCategory(); ?></a>
        </div>
    </section>
  </div>
</article>