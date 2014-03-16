<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<?php use_helper('JavascriptRegister'); ?>

<?php register_js() ?><script>
  $('#event-nav ul li a').click(function() {
    $('#event-nav ul li').removeClass('active');    
    var href = $(this).attr('href');
    $('.sf_admin_form').hide();
    $(href).fadeIn(400);
    $(this).parent().addClass('active');
    return false;
  });
</script><?php end_register_js() ?>

<style type="text/css">
  
  #event-nav {
    margin-top: 40px;
  }
  
  #event-nav ul li {
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
  
  #event-image-upload table {
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
  <nav id="event-nav">
    <ul>
      <li class="active" ><a href="#event-info">Edit Event information</a></li>
      <?php if ( !$form->isNew() ) : ?>
      
        <?php if ($marka_event->getImages()->count() > 0) : ?>
        <li><a href="#event-image-delete">Delete Images</a></li>
        <?php endif ?>
        
        <li><a href="#event-image-upload">Upload Images</a></li>
      
      <?php endif ?>
    </ul>
  </nav>
</div>

<div class="w75p">
    
    <?php if (!$form->isNew()) : ?>
        <div id="current_images" class="clearfix">
            <h2>Current Images</h2>
            <?php if ($marka_event->getImages()->count() > 0) : ?>
            
              <?php foreach ($marka_event->getImages() as $image): ?>
                <div class="w25p txtc photo">
                  <?php echo image_tag($image->getThumbnailpath(), array('size' => sfConfig::get('app_event_image_thumbnail_size'))); ?>  
                </div>
              <?php endforeach; ?>
                    
            <?php else : ?>
              <p>There are no images uploaded!</p>
                      
            <?php endif ?>
        </div>
    <?php endif ?>
    
    <?php echo form_tag_for($form, '@marka_event') ?>
  
    <div class="sf_admin_form" id="event-info">
        <h2>Event information</h2>
            
        <?php echo $form->renderHiddenFields(false) ?>
            
        <?php if ($form->hasGlobalErrors()): ?>
            <?php echo $form->renderGlobalErrors() ?>
        <?php endif; ?>
            
        <?php foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?>
            <?php include_partial('event/form_fieldset', array('marka_event' => $marka_event, 'form' => $form, 'fields' => $fields, 'fieldset' => $fieldset)) ?>
        <?php endforeach; ?>
            
        <?php include_partial('event/form_actions', array('marka_event' => $marka_event, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
        
    </div>
  
    <?php if (!$form->isNew()) : ?>
    <div class="sf_admin_form" id="event-image-upload" style="display:none;">
        <h2>Upload Images</h2>
        <p>You can upload <?php echo sfConfig::get('app_event_upload_image_count') ?> photos at once. Make sure that they are high quality, landscape, and have an aspect ratio of 1.5! The size of the images should exceed 575x383!</p>
        <br/>

        <?php foreach ($form['newPhotos'] as $upload): ?>
            <?php echo $upload->render() ?>
        <?php endforeach; ?>

        <ul class="sf_admin_actions">
          <?php echo $helper->linkToList(array(  'params' =>   array(  ),  'class_suffix' => 'list',  'label' => 'Back to list',)) ?>
          <li><input type="submit" value="Upload selected images"/></li>
        </ul>
    </div>
    
    <div class="sf_admin_form" id="event-image-delete" style="display:none;">
      <h2>Delete Images</h2>
      <br/>
      <?php if ($marka_event->getImages()->count() > 0) : ?>
        
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

    
</div>
