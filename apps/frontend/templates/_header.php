<?php $categories = Utility::markaActiveCategories() ?>

<header> 
  <div class="inner">

    <div class="w25p">
      <div class="logo"> 
        <a href="http://rta.zxy.me/purity_wp" class="logo_img"><img src="http://rta.zxy.me/purity_wp/wp-content/themes/purity/img/logo.png" alt=""></a>
      </div> 
    </div>

    <div class="w75p">
      <div class="clearfix">
        <nav> 
          <ul> 
            <li class="current-menu-item"><a href="http://rta.zxy.me/purity_wp/">Home</a></li>
            <li><a href="http://rta.zxy.me/purity_wp/">World of Marka</a></li>
            <li><a href="http://rta.zxy.me/purity_wp/">Marka Store</a></li>
            <li><a href="http://rta.zxy.me/purity_wp/">Contact</a></li>
          </ul>
        </nav>
      </div>

      <div class="clearfix">
        <?php include_component('meta', 'headersubmenu') ?>
      </div>
    </div>
        
  </div>
</header>
