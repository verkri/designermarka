<td class="sf_admin_text sf_admin_list_td_name">
  <?php echo link_to($marka_event->getName(), 'marka_event_edit', $marka_event) ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_category_id">
  <?php echo $marka_event->getCategory()->getName() ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_type_id">
  <?php echo $marka_event->getType()->getName() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_stockqty">
  <?php echo $marka_event->getStockqty() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_cadprice">
  $ <?php echo $marka_event->getCadprice() ?>.0 CAD
</td>
<td class="sf_admin_boolean sf_admin_list_td_featured">
  <?php 
    $options = null;
    if ( $marka_event->getFeatured() ) {
      $options = array ( 'value' => true, 'desc' => 'Featured.');
    } else {
      $options = array ( 'value' => false, 'desc' => 'Not featured', 'display_icon' => false);
    }
    echo get_partial('event/list_field_status', $options) 
  ?>
</td> 
<td class="sf_admin_boolean sf_admin_list_td_is_active">
  <?php 
    $options = null;
    if ( $marka_event->getIsActive() ) {
      $options = array ( 'value' => true, 'desc' => 'Active');
    } else {
      $options = array ( 'value' => false, 'desc' => 'Inactive');
    }
    echo get_partial('event/list_field_status', $options) 
  ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_imagecount">
  <?php 
    $options = null;
    if ( $marka_event->getImagecount() != 0 ) {
      $options = array ( 'value' => true, 'desc' => 'Event has images uploaded.');
    } else {
      $options = array ( 'value' => false, 'desc' => 'No images found!');
    }
    echo get_partial('event/list_field_status', $options) 
  ?>
</td>
