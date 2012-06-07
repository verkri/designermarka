<header class="_960wide clearfix"> 
  <div class="w25p">
    <div class="logo"> 
      <a href="<?php echo url_for('@home'); ?>" class="logo_img"><img src="/images/marka-logo.png" alt="Marka Designs" title="Marka Designs" width="150" height="80"></a>
    </div> 
  </div>
  <div class="w75p">
      <nav> 
        <ul class="clearfix"> 
          <li <?php echo (sfConfig::get('app_menu') == 'home' ? 'class="active"' : '') ?>>
            <a href="<?php echo url_for('@home'); ?>">Home</a></li>
          <li <?php echo (sfConfig::get('app_menu') == 'world' ? 'class="active"' : '') ?>>
            <a href="<?php echo url_for('@world'); ?>">The World of Marka</a></li>
          <li <?php echo (sfConfig::get('app_menu') == 'about' ? 'class="active"' : '') ?>>
            <a href="<?php echo url_for('@about'); ?>">About Marka</a></li>
          <li <?php echo (sfConfig::get('app_menu') == 'contact' ? 'class="active"' : '') ?>>
            <a href="<?php echo url_for('@contact'); ?>">Contact</a></li>
        </ul>
      </nav>
  </div>
</header>
<div class="divider w100p"></div>
