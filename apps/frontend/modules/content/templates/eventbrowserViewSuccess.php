<?php use_helper('JavascriptRegister'); ?>
<?php use_helper('CssRegister'); ?>

<?php slot('title', 'Browse the Marka World - Marka Designs') ?>



<?php register_css() ?>
<style type="text/css">

  .category_text {
    background: url('/images/black-alpha-20.png') repeat-x;
    
    border-radius: 5px;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    padding: 5px 20px;
    margin-top: 10px;
  }
  
  .category_text p {
    margin: 0;
    font-style: italic;
    font-size: 1.3em;
    color: white;
    text-shadow: #888 1px 1px 2px;
    -moz-text-shadow:  #888 1px 1px 2px;
    -webkit-text-shadow:  #888 1px 1px 2px;
  }
  
  p.loader, p.notfound { margin-top: 250px; text-align: center; font-size: 1.3em; }
  p.loader > img { margin-bottom: 10px;}
  
  p.fallback { margin-top: 250px;  font-size: 1.6em; }
  
  #product-nav { margin-top: 20px; }
  
  .toggle-container { width:100%; }

  .toggle-container { margin-bottom:4px; position:relative; cursor:pointer; overflow:hidden; }
  .toggle-container h4 { 
    color: #f14343;
    text-shadow: #888 1px 1px 2px;
    -moz-text-shadow:  #888 1px 1px 2px;
    -webkit-text-shadow:  #888 1px 1px 2px;
    
    text-decoration: none; 
    text-transform: 
    uppercase; 
    padding: 5px 5px 5px 40px; 
    font-size:2em;  
    margin:0; 
  }

  .toggle { background: url('/images/toggle.png') no-repeat 10px 10px; }
  h4.active { background: url('/images/toggle.png') no-repeat 10px -40px;}

  .toggle-container p, .toggle-container div { padding:10px 10px 10px 32px; margin:0px; } 
  .toggle-content { display:none; }
  
  .category {
    font-size: 1.5em;
    margin: 5px auto;
  }
  
  .product img {
    border: 1px solid #888;
    padding: 1px;
  }
  
  .product {
    margin: 5px 0px;
    border: 1px solid transparent;
    padding: 10px;
    border-radius: 5px;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    color: black;
  }
  
  #plist li:hover .product { 
    border: 1px solid #ffb4b4;
    background-color: rgb(255,250,250);
  }
  
  #plist a:hover { text-decoration: none; }
  
  .product h1 { 
    font-size: 1.8em; 
    color: #f14343;
    text-shadow: #888 1px 1px 2px;
    -moz-text-shadow:  #888 1px 1px 2px;
    -webkit-text-shadow:  #888 1px 1px 2px;
    margin: 5px auto;
  }
  
  .product h2 { font-size: 1.4em; }
  
  h2.price {
    font-size: 1.5em;
  }
  
  

</style>
<?php end_register_css() ?>

<div class="w60p" id="pinfo-wrapper">
  

  <div >
  <table width=600>
  <?php foreach ($events as $event): ?>
  <tr>
  <td><a href=<?php echo url_for('event', array('sf_subject' => $p,
        'id' => $event->getId()
      )) ?> >
    <h3 id="<?php echo $event->getName() ?>" ><?php echo $event->getName()?></h3></a>
	</td>
	
	  <td>
    <h3 id="<?php echo $event->getPlace() ?>" ><?php echo $event->getPlace() ?></h3>
	</td>
	
	 <td>
    <h3 id="<?php echo $event->getDate() ?>" ><?php echo $event->getDate() ?></h3>
	</td>
	
	 <td>
    <h3 id="<?php echo $event->getShort() ?>" ><?php echo $event->getShort() ?></h3>
	</td>
	
	
	</tr>
  
  
<?php endforeach ?>
</table>
</div>

    <div class="divider"></div>
	
	  <div >
  <table width=600>
  <?php foreach ($events_n as $event): ?>
  <tr>
  <td>
    <h3 id="<?php echo $event->getName() ?>" ><?php echo $event->getName() ?></h3>
	</td>
	
	  <td>
    <h3 id="<?php echo $event->getPlace() ?>" ><?php echo $event->getPlace() ?></h3>
	</td>
	
	 <td>
    <h3 id="<?php echo $event->getDate() ?>" ><?php echo $event->getDate() ?></h3>
	</td>
	
	 <td>
    <h3 id="<?php echo $event->getShort() ?>" ><?php echo $event->getShort() ?></h3>
	</td>
	
	
	</tr>
  
  
<?php endforeach ?>
</table>
</div>


</div>
