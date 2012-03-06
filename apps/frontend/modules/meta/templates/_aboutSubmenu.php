<nav class="subnav"> 
  <ul>
    <?php if ( sfConfig::get('app_submenu') == 'designer' ): ?><li class="current-menu-item"><?php else: ?><li><?php endif ?>
    <a href="<?php echo url_for('@about_designer') ?>">About the Designer</a></li>
    
    <?php if ( sfConfig::get('app_submenu') == 'press' ): ?><li class="current-menu-item"><?php else: ?><li><?php endif ?>
    <a href="<?php echo url_for('@about_press') ?>">Press</a></li>
    
    <?php if ( sfConfig::get('app_submenu') == 'blog' ): ?><li class="current-menu-item"><?php else: ?><li><?php endif ?>
    <a href="<?php echo url_for('@about_blog') ?>">Marka's Blog</a></li>
    
    </li>
  </ul>
</nav>