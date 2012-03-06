<td class="sf_admin_text sf_admin_list_td_name">
  <?php echo link_to($marka_color_scheme->getName(), 'marka_color_scheme_edit', $marka_color_scheme) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_description">
  <?php echo $marka_color_scheme->getDescription() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_products">
  <?php echo $marka_color_scheme->getProducts()->count() ?> items
</td>
<td class="sf_admin_text sf_admin_list_td_hexcolor1">
  <div style="height: 100%; width: 100%; margin: 2px; background-color: <?php echo $marka_color_scheme->getHexcolor1() ?>">&nbsp;</div>
</td>
<td class="sf_admin_text sf_admin_list_td_hexcolor2">
  <div style="height: 100%; width: 100%; margin: 2px; background-color: <?php echo $marka_color_scheme->getHexcolor2() ?>">&nbsp;</div>
</td>
<td class="sf_admin_text sf_admin_list_td_hexcolor3">
  <div style="height: 100%; width: 100%; margin: 2px; background-color: <?php echo $marka_color_scheme->getHexcolor3() ?>">&nbsp;</div>
</td>