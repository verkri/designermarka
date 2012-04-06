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
<td class="sf_admin_boolean sf_admin_list_td_imagecount">
  <?php 
    $options = null;
    if ( $marka_product->getImagecount() != 0 ) {
      $options = array ( 'value' => true, 'desc' => 'Product has images uploaded.');
    } else {
      $options = array ( 'value' => false, 'desc' => 'No images found!');
    }
    echo get_partial('product/list_field_status', $options) 
  ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_is_active">
  <?php 
    $options = null;
    if ( $marka_product->getIsActive() != 0 ) {
      $options = array ( 'value' => true, 'desc' => 'Activated');
    } else {
      $options = array ( 'value' => false, 'desc' => 'Inactive!');
    }
    echo get_partial('product/list_field_status', $options) 
  ?>
</td>
