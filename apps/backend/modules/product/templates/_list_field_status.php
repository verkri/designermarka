<?php if ($value): ?>
  <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/tick.png', array('alt' => __($desc, array(), 'sf_admin'), 'title' => __($desc, array(), 'sf_admin'))) ?>
<?php else: ?>
  <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/error.png', array('alt' => __($desc, array(), 'sf_admin'), 'title' => __($desc, array(), 'sf_admin'))) ?>
<?php endif; ?>
