<?php $categories = Utility::markaActiveCategories() ?>

<header class="clearfix"> 
  <div class="inner clearfix">

    <div class="w25p">
      <div class="logo"> 
        <a href="<?php echo url_for('@home'); ?>" class="logo_img"><img src="/images/logo.png?v=1" alt=""></a>
      </div> 
    </div>

    <div class="w75p">
      <div class="clearfix">
        <nav> 
          <ul> 
            <li <?php echo (sfConfig::get('app_menu') == 'world' ? 'class="current-menu-item"' : '') ?>>
              <a href="<?php echo url_for('@home'); ?>">World of Marka</a></li>
            
            <li <?php echo (sfConfig::get('app_menu') == 'about' ? 'class="current-menu-item"' : '') ?>>
              <a href="<?php echo url_for('@about'); ?>">About Marka</a></li>
            
            <li <?php echo (sfConfig::get('app_menu') == 'store' ? 'class="current-menu-item"' : '') ?>>
              <a href="<?php echo url_for('@store'); ?>">Marka Store</a></li>
            
            <li <?php echo (sfConfig::get('app_menu') == 'contact' ? 'class="current-menu-item"' : '') ?>>
              <a href="<?php echo url_for('@contact'); ?>">Contact</a></li>
          </ul>
        </nav>
      </div>

      <div class="clearfix">
        <?php include_component('meta', 'headersubmenu') ?>
      </div>
    </div>
        
  </div>
</header>
