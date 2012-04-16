<style type="text/css">
  h1,h2 { margin: 10px auto; }
</style>

<section class="w50p" id="error">
  <header>
    <hgroup>
      <h1>Error 404</h1>
      <h2>The requested page is not found.</h2>
    </hgroup>
  </header>
  <p>Please follow the links below or use the navigation menu at the top of the page.</p>
  <?php echo link_to('Home','@home',array('class' => 'button light')) ?>
  <?php echo link_to('Discover Marka products','@world',array('class' => 'button light')) ?>
</section>
