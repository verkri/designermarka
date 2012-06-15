<?php use_helper('JavascriptRegister'); ?>
<?php use_helper('CssRegister'); ?>

<?php slot('title', 'Contact Us - Marka Designs') ?>

<?php register_js() ?><script>
 $('#submit').click(function(){
   $('form, .notice, .error').hide();
   $('.loader').show();
 });
</script><?php end_register_js() ?>

<?php register_css() ?>
<style type="text/css">
  input[type=submit] {
    margin-top: 20px;
    margin-left: 145px;
  }

  label {
    font-size: 1.1em;
    margin: 7px auto;
    display: block;
  }

  input[type=text], textarea {
    margin: 5px auto;
    padding: 5px;
    color: #555;
  }

  ul.error_list, .error
  {
    background-color: #ffdddd;
    border: 1px solid #ddbbbb;
    border-radius: 4px;
    -moz-border-radius: 4px;
    -webkit-border-radius: 4px;
    font-weight: bold;
  }
  
  .error,
  ul.error_list li {
    margin: 4px 0;
    padding: 5px;
    color: darkred;
    padding-left: 35px;
    background: #ffdddd url('/images/icons/error.png') no-repeat 10px 4px;
  }

  .notice {
    margin: 4px 0;
    background: url('/images/icons/tick.png') no-repeat 10px 4px;
    border-radius: 4px;
    -moz-border-radius: 4px;
    -webkit-border-radius: 4px;
    font-weight: bold;
    color: black;
    background-color: #ffffcc;
    padding: 5px 5px 5px 35px;
    border: 1px solid #bbddbb;
  }
  
  .loader {
    margin-left: 60px;
    margin-top: 70px;
  }
  .loader > img {
    margin-bottom: 10px;
  }
  
  
</style>
<?php end_register_css() ?>

<div class="w60p">
  <h1>Contact us</h1>
  <p>May have any question or want to place an order, please fill the form below to contact us.</p>
  
  <div class="w100p">
  <?php if ($sf_user->hasFlash('notice') ) : ?>
    <div class="notice"><?php echo $sf_user->getFlash('notice') ?></div>
  <?php endif ?>
  
  <?php if ($sf_user->hasFlash('error') ) : ?>
    <div class="error"><?php echo $sf_user->getFlash('error') ?></div>
  <?php endif ?>
  </div>
  
  <p class="loader w100p txtc" style="display:none;">
    <img src="/images/ajax-loader.gif" width="220" height="19"/>
    <br/>Processing your request ...
  </p>
  
  <form action="<?php echo url_for('@contact-submit') ?>" method="post" class="w100p">
  
    <?php if ( $form['email']->hasError() ) : ?>
      <div class="w100p">
        <?php echo $form['email']->renderError(); ?>
      </div>
    <?php endif ?>
    
    <div class="w25p"><?php echo $form['email']->renderLabel(); ?></div>
    <div class="w75p"><?php echo $form['email']->render(array('size' => 40)); ?></div>
  
    <?php if ( $form['subject']->hasError() ) : ?>
      <div class="w100p">
        <?php echo $form['subject']->renderError(); ?>
      </div>
    <?php endif ?>
    
    <div class="w25p"><?php echo $form['subject']->renderLabel(); ?></div>
    <div class="w75p"><?php echo $form['subject']->render(array('size' => 40)); ?></div>
    
    <?php if ( $form['message']->hasError() ) : ?>
      <div class="w100p">
        <?php echo $form['message']->renderError(); ?>
      </div>
    <?php endif ?>
    
    <div class="w25p"><?php echo $form['message']->renderLabel(); ?></div>
    <div class="w75p"><?php echo $form['message']->render(array('rows' => 15, 'cols' => 50)); ?></div>
    
    <?php echo $form['_csrf_token']->render(); ?>
    <input class="button" type="submit" id="submit" value="Send message"/>
    
  </form>
</div>