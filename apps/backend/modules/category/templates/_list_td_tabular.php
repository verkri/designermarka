<td class="sf_admin_text sf_admin_list_td_name">
  <?php echo link_to($marka_category->getName(), 'marka_category_edit', $marka_category) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_products">
  <?php echo $marka_category->getProducts()->count() ?> items
</td>