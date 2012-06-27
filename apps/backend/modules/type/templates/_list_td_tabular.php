<td class="sf_admin_text sf_admin_list_td_name">
  <?php echo link_to($marka_type->getName(), 'marka_type_edit', $marka_type) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_products">
  <?php echo $marka_type->getProducts()->count() ?> items
</td>