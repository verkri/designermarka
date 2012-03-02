<?php $categories = Utility::markaActiveCategories() ?>

<header class="clearfix"> 
  <div class="inner">

    <div class="w25p">
      <div class="logo"> 
        <a href="<?php echo url_for('@home'); ?>" class="logo_img"><img src="/images/logo.png?v=1" alt=""></a>
      </div> 
    </div>

    <div class="w75p">
      <div class="clearfix">
        <nav> 
          <ul> 
            <li class="current-menu-item"><a href="<?php echo url_for('@home'); ?>">Home</a></li>
            <li><a href="<?php echo url_for('@world'); ?>">World of Marka</a></li>
            <li><a href="<?php echo url_for('@store'); ?>">Marka Store</a></li>
            <li><a href="<?php echo url_for('@contact'); ?>">Contact</a></li>
          </ul>
        </nav>
      </div>

      <div class="clearfix">
        <?php include_component('meta', 'headersubmenu') ?>
      </div>
    </div>
        
  </div>
</header>
