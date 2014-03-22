<header class="_960wide clearfix"> 

    <div class="w25p">
      <div class="logo"> 
        <a href="http://designermarka.com" class="logo_img"><img src="/images/marka-logo2.png" alt="Marka Designs" title="Marka Designs" width="189" height="80"></a>
      </div> 
    </div>

    <div class="w75p">
      <div class="clearfix">
        <nav>
          <?php if ($sf_user->isAuthenticated()) : ?>
          <ul> 
            
            <li <?php echo (sfConfig::get('app_menu') == 'home_slider' ? 'class="active"' : '') ?>>
              <?php echo link_to('Home Slider','marka_home_slider') ?></li>
            
            <li <?php echo (sfConfig::get('app_menu') == 'category' ? 'class="active"' : '') ?>>
              <?php echo link_to('Categories','marka_category') ?></li>
            
            <li <?php echo (sfConfig::get('app_menu') == 'type' ? 'class="active"' : '') ?>>
              <?php echo link_to('Types','marka_type') ?></li>
            
            <li <?php echo (sfConfig::get('app_menu') == 'product' ? 'class="active"' : '') ?>>
              <?php echo link_to('Products','marka_product') ?></li>
			  
			<li <?php echo (sfConfig::get('app_menu') == 'event' ? 'class="active"' : '') ?>>
              <?php echo link_to('Events','marka_event') ?></li>
			  
            <li><?php echo link_to('Logout','sf_guard_signout') ?></li>
            
          </ul>
          <?php endif; ?>
        </nav>
      </div>

    </div>
</header>
<div class="divider w100p"></div>