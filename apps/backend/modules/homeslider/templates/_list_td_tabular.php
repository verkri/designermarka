<td class="sf_admin_text sf_admin_list_td_filename">
  <?php echo link_to( image_tag( $marka_home_slider->getImagePath(), array('size' => '128x80')), 'marka_home_slider_edit', $marka_home_slider) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_caption">
  <?php echo $marka_home_slider->getCaption() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_priority">
  <?php echo $marka_home_slider->getPriority() ?>
</td>
