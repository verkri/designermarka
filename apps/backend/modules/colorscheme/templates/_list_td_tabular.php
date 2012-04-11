<td class="sf_admin_text sf_admin_list_td_name">
  <?php echo link_to($marka_color_scheme->getName(), 'marka_color_scheme_edit', $marka_color_scheme) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_products">
  <?php echo $marka_color_scheme->getProducts()->count() ?> items
</td>