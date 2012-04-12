<?php use_helper('JavascriptRegister'); ?>

<?php register_js() ?><script>
 $('.peKenBurns').peKenburnsSlider();
</script><?php end_register_js() ?>

<style type="text/css">
.peKenBurns {
  width: 800px;
  height: 500px;
  margin: 10px auto;
}

.peKenBurns .peKb_slides .peKb_caption h1 {
  color: whitesmoke;
}

.peKenBurns .peKb_slides .peKb_caption .peKb_real {
  padding: 10px 30px;
}
</style>

<div class="peKenBurns peNoJs" data-autopause="image" data-mode="kb" data-controls="disabled" data-shadow="enabled" data-logo="disabled">
  
  <?php for ($i = 0; $i < $slides->count(); ++$i) : ?>
    <?php if ($i == 0): ?>
      <div data-delay="5" data-duration="10" data-zoom="in">
        <img src="<?php echo $slides->get($i)->getImagepath() ?>" alt=""/>
        <h1><?php echo $slides->get($i)->getCaption()?></h1>
      </div>
    <?php else: ?>
      <div data-delay="5" data-duration="10" data-zoom="in">
        <img src="/images/estroslider/blank.png" data-src="<?php echo $slides->get($i)->getImagepath() ?>" alt=""/>
        <h1><?php echo $slides->get($i)->getCaption()?></h1>
      </div>
    <?php endif ?>
  <?php endfor ?>
    
</div>

<a class="button light right" style="margin-right: 50px;" href="<?php echo url_for('@world') ?>">Discover the World of Marka</a>
  