<td class="sf_admin_text sf_admin_list_td_name">
  <?php echo link_to($marka_product->getName(), 'marka_product_edit', $marka_product) ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_category_id">
  <?php echo $marka_product->getCategory()->getName() ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_colorscheme_id">
  <?php echo $marka_product->getColorScheme()->getName() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_stockqty">
  <?php echo $marka_product->getStockqty() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_cadprice">
  $ <?php echo $marka_product->getCadprice() ?>.0 CAD
</td>
<td class="sf_admin_boolean sf_admin_list_td_is_active">
  <?php echo get_partial('product/list_field_boolean', array('value' => $marka_product->getIsActive())) ?>
</td>
