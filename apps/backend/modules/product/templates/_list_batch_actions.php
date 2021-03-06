<li class="sf_admin_batch_actions_choice">
  <select name="batch_action">
    <option value=""><?php echo __('Choose an action', array(), 'sf_admin') ?></option>
    <option value="batchDelete"><?php echo __('Delete', array(), 'sf_admin') ?></option>
    <option value="batchActivate"><?php echo __('Activate', array(), 'sf_admin') ?></option>
    <option value="batchDeactivate"><?php echo __('Deactivate', array(), 'sf_admin') ?></option>
    <option value="batchFeaturize"><?php echo __('Featurize', array(), 'sf_admin') ?></option>
    <option value="batchUnfeaturize"><?php echo __('Unfeaturize', array(), 'sf_admin') ?></option>
  </select>
  <?php $form = new BaseForm(); if ($form->isCSRFProtected()): ?>
    <input type="hidden" name="<?php echo $form->getCSRFFieldName() ?>" value="<?php echo $form->getCSRFToken() ?>" />
  <?php endif; ?>
  <input type="submit" value="<?php echo __('Apply', array(), 'sf_admin') ?>" />
</li>
