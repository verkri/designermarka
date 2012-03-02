<?php use_helper('JavascriptRegister'); ?>

<?php register_js() ?><script>
 $('.peKenBurns').peKenburnsSlider();
 prettyPhoto();
</script><?php end_register_js() ?>

<style type="text/css">
.peKenBurns {
  width: 90%;
  height: 600px;
  margin: auto;
}
</style>

<div id="main"> 
  
      <div class="peKenBurns peNoJs" data-autopause="image" data-mode="kb" data-controls="disabled" data-shadow="enabled" data-logo="disabled">
        
        <div data-delay="5" data-duration="10" data-zoom="in" data-thumb="/app/homeslider/5w.jpg">
          <img src="/app/homeslider/5w.jpg" alt=""/>
        </div>
        
        <div data-delay="5" data-duration="10" data-zoom="in" data-thumb="/app/homeslider/2w.jpg">
          <img src="/images/estroslider/blank.png" data-src="/app/homeslider/2w.jpg" alt=""/>
        </div>
        
        <div data-delay="5" data-duration="10" data-zoom="in" data-thumb="/app/homeslider/6w.jpg">
          <img src="/images/estroslider/blank.png" data-src="/app/homeslider/6w.jpg" alt=""/>
        </div>
        
        <div data-delay="5" data-duration="10" data-zoom="in" data-thumb="/app/homeslider/8w.jpg">
          <img src="/images/estroslider/blank.png" data-src="/app/homeslider/8w.jpg" alt=""/>
        </div>

      </div>

</div>