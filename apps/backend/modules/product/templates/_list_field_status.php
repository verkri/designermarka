<?php if ($value && ( !isset($display_icon) || $display_icon == true ) ) : ?>
  <?php echo image_tag('/images/icons/tick.png', array('alt' => __($desc, array(), 'sf_admin'), 'title' => __($desc, array(), 'sf_admin'))) ?>
<?php elseif (!$value && ( !isset($display_icon) || $display_icon == true ) ) : ?>
  <?php echo image_tag('/images/icons/error.png', array('alt' => __($desc, array(), 'sf_admin'), 'title' => __($desc, array(), 'sf_admin'))) ?>
<?php endif; ?>
