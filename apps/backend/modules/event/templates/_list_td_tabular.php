<td class="sf_admin_text sf_admin_list_td_name">
  <?php echo link_to($marka_event->getName(), 'marka_event_edit', $marka_event) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_date">
  <?php echo $marka_event->getDate() ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_imagecount">
  <?php 
    $options = null;
    if ( $marka_event->getIsUpcoming() ==true ) {
      $options = array ( 'value' => true, 'desc' => 'Event is upcoming.');
    } else {
      $options = array ( 'value' => false, 'desc' => 'Event is not upcoming');
    }
    echo get_partial('event/list_event_status', $options) 
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
