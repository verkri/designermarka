<header class="_960wide clearfix"> 

    <div class="w25p">
      <div class="logo"> 
        <a href="http://dev.designermarka.com" class="logo_img"><img src="/images/marka-logo.png" alt="Marka Designs"></a>
      </div> 
    </div>

    <div class="w75p">
      <div class="clearfix">
        <nav>
          <ul> 
            <li <?php echo (sfConfig::get('app_menu') == 'colorscheme' ? 'class="active"' : '') ?>>
              <?php echo link_to('Colorschemes','marka_color_scheme') ?></li>
            
            <li <?php echo (sfConfig::get('app_menu') == 'category' ? 'class="active"' : '') ?>>
              <?php echo link_to('Categories','marka_category') ?></li>
            
            <li <?php echo (sfConfig::get('app_menu') == 'product' ? 'class="active"' : '') ?>>
              <?php echo link_to('Products','marka_product') ?></li>

          </ul>
        </nav>
      </div>

    </div>
</header>
<div class="divider w100p"></div>