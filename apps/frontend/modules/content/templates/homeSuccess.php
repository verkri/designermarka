<?php use_helper('JavascriptRegister'); ?>

<?php register_js() ?><script>
 $('.peKenBurns').peKenburnsSlider();
</script><?php end_register_js() ?>

<style type="text/css">
.peKenBurns {
  width: 900px;
  height: 600px;
  margin: 20px auto 0px auto;
}

</style>

<header>
  <h1>Proudly presenting: Marka Designs</h1>
</header>

<div class="peKenBurns peNoJs" data-autopause="image" data-mode="kb" data-controls="disabled" data-shadow="enabled" data-logo="disabled">
        
    <?php for ($i = 0; $i < count($slides); ++$i) : ?>
      <?php if ($i == 0): ?>
      <div data-delay="5" data-duration="10" data-zoom="in" data-thumb="/<?php echo $slides[$i] ?>">
        <img src="/<?php echo $slides[$i] ?>" alt=""/>
      </div>
    <?php else: ?>
      <div data-delay="5" data-duration="10" data-zoom="in" data-thumb="/<?php echo $slides[$i] ?>">
        <img src="/images/estroslider/blank.png" data-src="/<?php echo $slides[$i] ?>" alt=""/>
      </div>
    <?php endif ?>
  <?php endfor ?>
          
</div>