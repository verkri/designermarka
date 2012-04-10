<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<style type="text/css">
  .current_photo_holder input {
    margin: 5px 0px;
  }
  
  .current_photo_holder label {
    margin: 5px;
  }
  
  .new_photo {
    margin-bottom: 10px;
  }
  h2 {
    margin-bottom: 10px;
  }
</style>

<div class="sf_admin_form">
  <?php echo form_tag_for($form, '@marka_product') ?>
    <?php echo $form->renderHiddenFields(false) ?>

    <?php if ($form->hasGlobalErrors()): ?>
      <?php echo $form->renderGlobalErrors() ?>
    <?php endif; ?>

    <?php foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?>
      <?php include_partial('product/form_fieldset', array('marka_product' => $marka_product, 'form' => $form, 'fields' => $fields, 'fieldset' => $fieldset)) ?>
    <?php endforeach; ?>

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
             */ ?>
        
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
  
      <div class="w50p">
        <h3>Upload Images</h3>
        <br/>
        <p>You can upload <?php echo sfConfig::get('app_product_upload_image_count') ?> photos at once. Make sure that they are high quality, rectangular, and  bigger than 440x440px!</p>
        <br/>
        <?php foreach ($form['newImages'] as $photo): ?>
          <div class="clearfix new_photo">
            <?php echo $photo['filename']->renderRow(array('width' => 100)) ?>
          </div>
        <?php endforeach; ?>
        &nbsp;
      </div>
    </div>
    <?php include_partial('product/form_actions', array('marka_product' => $marka_product, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </form>
</div>
