<td class="sf_admin_text sf_admin_list_td_name">
  <?php echo link_to($marka_category->getName(), 'marka_category_edit', $marka_category) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_description">
  <?php echo $marka_category->getDescription() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_products">
  <?php echo $marka_category->getProducts()->count() ?> items
</td>
<td class="sf_admin_admin_input_file_tag sf_admin_list_td_icon">
  <?php if ( $marka_category->hasIcon() ) : ?>
    <?php echo image_tag($marka_category->getIconpath(),array('size' => sfConfig::get('app_category_icon_size'))); ?>
  <?php else : ?>
    &nbsp;
  <?php endif; ?>
</td>
<td class="sf_admin_text sf_admin_list_td_has_icon">
  <?php echo get_partial('category/list_field_boolean', array('value' => $marka_category->hasIcon())) ?>
</td>