<?php slot('page-heading', 'Marka Store') ?>

<div class="content_full_width">

  
<!-- ***************** - Homepage jQuery Slider - ***************** -->
<div class="home-bnr-jquery">
<ul>
<li class="jqslider">
 <div class="home-banner-main">
 <h2>Premium Website Template</h2>
 <p>Karma is an amazingly powerful Website Template. Karma comes with 20 page templates and 20 professionally designed color variations. Combine that with the over 70 built in styled elements, easy multi columns and a super cool PHP+AJAX contact form, and this will be the only template you'll need to purchase for a long time to come.</p>
 </div><!-- end home-banner-main -->

 <div class="home-banner-sub">
 <div class="home-banner-sub-content">
 <a href="#"><img src="/images/store/01.jpg" alt="Premium Website Template" width="404" height="256" /></a><div class="home-banner-bottom">&nbsp;</div>
 </div><!-- end home-banner-sub-content -->
 </div><!-- end home-banner-sub -->
</li>




<li class="jqslider">
 <div class="home-banner-main">
 <h2>20 Gorgeous Color Variations</h2>
 <p>Karma was designed and built by professional web designers. It comes packed with 20 gorgeous color variations. You can also easily mix and match color schemes for a completely custom look.</p>
 </div><!-- end home-banner-main -->

 <div class="home-banner-sub">
 <div class="home-banner-sub-content">
 <a href="#"><img src="/images/store/02.jpg" alt="Premium Website Template" width="404" height="256" /></a><div class="home-banner-bottom">&nbsp;</div>
 </div><!-- end home-banner-sub-content -->
 </div><!-- end home-banner-sub -->
</li>



 
 
<li class="jqslider">
<div class="home-banner-sub-full">
<img title="Premium Website Template" src="http://files.truethemes.net/themes/karma-html/jquery-1-fullwidth.png" alt="" width="940" height="283" />
</div><!-- end home-banner-sub-full -->
</li>



</ul></div><!-- end home-bnr-jquery -->

<!-- ***************** - END Homepage jQuery Slider - ***************** -->
  

<!-- ***************** - END Homepage jQuery Slider - ***************** -->
<br/>
<br/>
<div class="hr_shadow"></div>

<?php foreach ($marka_categories as $i => $category): ?>
<?php if (($i+1)%4 == 0 && $i != 0 ): ?>
<div class="one_fourth_last">
<?php else: ?>
<div class="one_fourth">
<?php endif ?>
  
  <h6><?php echo $category->getName() ?></h6> 
  <div class="modern_img_frame modern_four_col_large">
    <div class="preload_four_col_large">
    <div class="attachment-fadeIn"><a href="<?php echo url_for('category_show',$category) ?>"><img src="/images/store/category/<?php echo $category->getCategorySlug() ?>.png" alt="CSS Template" width="190" height="111" /></a></div></div>
  </div><!-- end modern_img_frame -->
  
  <p><?php echo $category->getDescription() ?></p>
</div><!-- end first one_fourth_column -->

<?php endforeach ?>

</div>