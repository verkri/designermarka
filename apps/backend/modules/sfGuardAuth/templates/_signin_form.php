<style type="text/css">
  input[type=submit] {
    margin-top: 20px;
    margin-left: 250px;
  }
  
  label {
    font-size: 1.1em;
    margin: 5px auto;
  }
  input[type=text], input[type=password] {
    margin: 5px auto;
  }
</style>

<div class="w50p" id="sf_admin_container">
  <h1>Sign in</h1>
  <p>This is a protected area. You must sign in to proceed.</p>
  
  <form action="<?php echo url_for('@sf_guard_signin') ?>" method="post" class="w100p">
  
    <?php if ( $form['username']->hasError() ) : ?>
      <div class="w100p">
        <?php echo $form['username']->renderError(); ?>
      </div>
    <?php endif ?>
    
    <div class="w25p"><?php echo $form['username']->renderLabel(); ?></div>
    <div class="w75p"><?php echo $form['username']->render(array('size' => 30)); ?></div>
  
    <?php if ( $form['password']->hasError() ) : ?>
      <div class="w100p">
        <?php echo $form['password']->renderError(); ?>
      </div>
    <?php endif ?>
    
    <div class="w25p"><?php echo $form['password']->renderLabel(); ?></div>
    <div class="w75p"><?php echo $form['password']->render(array('size' => 30)); ?></div>
    
    <?php echo $form['_csrf_token']->render(); ?>
    
    <input type="submit" value="Log in" />
  </form>
</div>
<?php /*
  
  <table class="w50p">
    <tbody class="w100p">
      <?php echo $form ?>
    </tbody>
    <tfoot class="w100p">
      <tr>
        <td colspan="2">
          <input type="submit" value="<?php echo __('Signin', null, 'sf_guard') ?>" />
          
          <?php $routes = $sf_context->getRouting()->getRoutes() ?>
          <?php if (isset($routes['sf_guard_forgot_password'])): ?>
            <a href="<?php echo url_for('@sf_guard_forgot_password') ?>"><?php echo __('Forgot your password?', null, 'sf_guard') ?></a>
          <?php endif; ?>

          <?php if (isset($routes['sf_guard_register'])): ?>
            &nbsp; <a href="<?php echo url_for('@sf_guard_register') ?>"><?php echo __('Want to register?', null, 'sf_guard') ?></a>
          <?php endif; ?>
        </td>
      </tr>
    </tfoot>
  </table>
</form>
 * 
 * 
 */ ?>