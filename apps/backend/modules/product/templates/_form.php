<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<?php use_helper('JavascriptRegister'); ?>

<?php register_js() ?><script>
  $('#product-nav ul li a').click(function() {
    $('#product-nav ul li').removeClass('active');    
    var href = $(this).attr('href');
    $('.sf_admin_form').hide();
    $(href).fadeIn(400);
    $(this).parent().addClass('active');
    return false;
  });
</script><?php end_register_js() ?>

<style type="text/css">
  
  #product-nav {
    margin-top: 40px;
  }
  
  #product-nav ul li {
    font-size: 1.5em;
    margin: 5px auto;
    padding: 2px;
  }
  
  .photo img
  {
    margin: 5px;
    padding: 2px;
    border: 1px solid grey;
  }
  
  input[type=file] {
    margin: 5px;
  }
  
  #product-image-upload table {
      width: 48%;
      margin: 5px 1%;
      float: left;
  }
  
  span.delete_label {
    line-height: 20px;
    margin: 5px;
    font-weight: bold;
    padding:5px 12px; 
    color: #333;
  }
  
 
  
</style>

<div class="w25p">
  <nav id="product-nav">
    <ul>
      <li class="active" ><a href="#product-info">Edit Product information</a></li>
      <?php if ( !$form->isNew() ) : ?>
      
        <?php if ($marka_product->getImages()->count() > 0) : ?>
        <li><a href="#product-image-delete">Delete Images</a></li>
        <?php endif ?>
        
        <li><a href="#product-image-upload">Upload Images</a></li>
      
      <?php endif ?>
    </ul>
  </nav>
</div>

<div class="w75p">
    
    <?php if (!$form->isNew()) : ?>
        <div id="current_images" class="clearfix">
            <h2>Current Images</h2>
            <?php if ($marka_product->getImages()->count() > 0) : ?>
            
              <?php foreach ($marka_product->getImages() as $image): ?>
                <div class="w25p txtc photo">
                  <?php echo image_tag($image->getThumbnailpath(), array('size' => sfConfig::get('app_product_image_thumbnail_size'))); ?>  
                </div>
              <?php endforeach; ?>
                    
            <?php else : ?>
              <p>There are no images uploaded!</p>
                      
            <?php endif ?>
        </div>
    <?php endif ?>
    
    <?php echo form_tag_for($form, '@marka_product') ?>
  
    <div class="sf_admin_form" id="product-info">
        <h2>Product information</h2>
            
        <?php echo $form->renderHiddenFields(false) ?>
            
        <?php if ($form->hasGlobalErrors()): ?>
            <?php echo $form->renderGlobalErrors() ?>
        <?php endif; ?>
            
        <?php foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?>
            <?php include_partial('product/form_fieldset', array('marka_product' => $marka_product, 'form' => $form, 'fields' => $fields, 'fieldset' => $fieldset)) ?>
        <?php endforeach; ?>
            
        <?php include_partial('product/form_actions', array('marka_product' => $marka_product, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
        
    </div>
  
    <?php if (!$form->isNew()) : ?>
    <div class="sf_admin_form" id="product-image-upload" style="display:none;">
        <h2>Upload Images</h2>
        <p>You can upload <?php echo sfConfig::get('app_product_upload_image_count') ?> photos at once. Make sure that they are high quality, landscape, and have an aspect ratio of 1.5! The size of the images should exceed 575x383!</p>
        <br/>

        <?php foreach ($form['newPhotos'] as $upload): ?>
            <?php echo $upload->render() ?>
        <?php endforeach; ?>

        <ul class="sf_admin_actions">
          <?php echo $helper->linkToList(array(  'params' =>   array(  ),  'class_suffix' => 'list',  'label' => 'Back to list',)) ?>
          <li><input type="submit" value="Upload selected images"/></li>
        </ul>
    </div>
    
    <div class="sf_admin_form" id="product-image-delete" style="display:none;">
      <h2>Delete Images</h2>
      <br/>
      <?php if ($marka_product->getImages()->count() > 0) : ?>
        
        <div class="clearfix">
        <?php foreach ($form['Photos'] as $photo): ?>
          <div class="w25p txtc photo">
            <?php echo $photo['filename']->renderRow(array('width' => '83%')) ?>
            <span class="delete_label">Delete</span>
          </div>
        <?php endforeach; ?>
        </div>            
      <?php else : ?>
        <p>There are no images uploaded!</p>
                      
      <?php endif ?>
        <ul class="sf_admin_actions">
          <?php echo $helper->linkToList(array(  'params' =>   array(  ),  'class_suffix' => 'list',  'label' => 'Back to list',)) ?>
          <li><input type="submit" value="Delete marked images"/></li>
        </ul>
    </div>
    <?php endif ?>
  
      
    </form>
    
</div>




  <?php /*
    <h2>Product Images</h2>
    <div class="w100p clearfix">
      <div class="w50p">
        <h3>Currently Uploaded Images</h3>
        <br/>
        <p>The optimal number of product photos is 4.</p>
        <br/>
        <?php if ( count($form['currentImages']) == 0 ) : ?>
          No images uploaded yet.
        <?php else : ?>
          <?php foreach ($form['currentImages'] as $photo): ?>
          
            <div class="current_photo_holder w33p clearfix">
              <?php echo $photo['filename']->renderRow(array('width' => "100%")) ?>
            </div>
            <?php /*
            <div class="current_photo w33p clearfix">
              <img src="<?php echo sfConfig::get('app_product_image_dir').$photo['filename']->getValue(); ?>" width="100%" height="100"/><br/>
              <input class="left" type="checkbox" id="<?php echo $photo['filename']->renderId(); ?>"/>
              <label class="left" for="<?php echo $photo['filename']->renderId(); ?>">Remove</label>
            </div>
             * 
             * ?>
        
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
  
      <div class="w50p">
        <h3>Upload Images</h3>
        <br/>
        <p>You can upload <?php echo sfConfig::get('app_product_upload_image_count') ?> photos at once. Make sure that they are high quality, landscape, and have an aspect ratio of 4:3!</p>
        <br/>
        <?php foreach ($form['newImages'] as $photo): ?>
          <div class="clearfix new_photo">
            <?php echo $photo['filename']->renderRow(array('width' => 100)) ?>
          </div>
        <?php endforeach; ?>
        &nbsp;
      </div>
    </div>
   * 
   */ ?>
    
</div>
