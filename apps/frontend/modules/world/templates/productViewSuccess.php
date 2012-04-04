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
    <?php if ( $product->getPrimaryImage() == null ) : ?>
        <img src="http://dummyimage.com/200x120/46475c/dadbe3.png&text=No Image" height="450" width="450"/>
      <?php else : ?>
        <img src="<?php echo $product->getPrimaryImage()->getPath() ?>" height="450" width="450"/>  
      <?php endif; ?>
  </div>

  <div class="w50p">
    <section>
      <header>
        <div class="txtr">
          <a href="javascript: history.go(-1)" class="back">Back to <?php echo $product->getColorScheme(); ?> <?php echo $product->getCategory(); ?></a>
        </div>

        <hgroup>
          <h1><?php echo $product->getName() ?></h1>
          <h2><?php echo $product->getShort() ?></h2>
        </hgroup>
      </header>
      <p>
        <?php echo $product->getDescription() ?>
      </p>

      <footer>
        <div class="w75p txtr hdr">Manufactured:</div>
        <div class="w25p txtr dat"><?php echo time_ago_in_words($manufactured_timestamp) ?> ago</div>

        <div class="w75p txtr hdr">Price:</div>
        <div class="w25p txtr dat">$ <?php echo $product->getCadprice() ?>.0 CAD</div>
      </footer>
    </section>
  </div>
</article>