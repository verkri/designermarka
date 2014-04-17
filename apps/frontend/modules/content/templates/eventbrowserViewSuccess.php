<?php slot('title', 'Browse the Marka World - Marka Designs') ?>



<div class="w60p" id="pinfo-wrapper">


  <div >
  

  
  <table width=600>
  <tr><td colspan=5 align=center>Upcoming events</td></tr>
  <?php foreach ($events as $event): ?>
  
  
  <tr>
  <td>
  <?php $images=$event->getImages();
		shuffle($images);

		foreach ($images as $image)
		{
		echo image_tag($image->getThumbnailpath(), array('alt' => $event->getName() . " Thumbnail", 'size' => sfConfig::get('app_event_image_thumbnail_size')));
		break;
		}

		?>
  
  
  </td>
  <td align=center><a href=<?php echo url_for('event', array('sf_subject' => $p,
        'name' => $event->getName()
      )) ?> >
    <h3 id="<?php echo $event->getName() ?>" ><?php echo $event->getName()?></h3></a>
	</td>
	
	  <td align=center>
    <h3 id="<?php echo $event->getPlace() ?>" ><?php echo $event->getPlace() ?></h3>
	</td>
	
	 <td align=center>
    <h3 id="<?php echo $event->getDate() ?>" ><?php echo $event->getDate() ?></h3>
	</td>
	
	 <td align=center>
    <h3 id="<?php echo $event->getShort() ?>" ><?php echo $event->getShort() ?></h3>
	</td>
	
	
	</tr>
  
  
<?php endforeach ?>
</table>
<br><br>
</div>

    <div class="divider"></div>
	
	  <div >
	  <br><br>
  <table width=600>
   <tr><td colspan=5 align=center>Past events</td></tr>
  <?php foreach ($events_n as $event): ?>
  <tr>
  <td>
  <?php $images=$event->getImages();
		shuffle($images);

		foreach ($images as $image)
		{
		echo image_tag($image->getThumbnailpath(), array('alt' => $event->getName() . " Thumbnail", 'size' => sfConfig::get('app_event_image_thumbnail_size')));
		break;
		}

		?>
  
  
  </td>
  <td align=center><a href=<?php echo url_for('event', array('sf_subject' => $p,
        'name' => $event->getName()
      )) ?> >
    <h3 id="<?php echo $event->getName() ?>" ><?php echo $event->getName()?></h3></a>
	</td>
	
	  <td align=center>
    <h3 id="<?php echo $event->getPlace() ?>" ><?php echo $event->getPlace() ?></h3>
	</td>
	
	 <td align=center>
    <h3 id="<?php echo $event->getDate() ?>" ><?php echo $event->getDate() ?></h3>
	</td>
	
	 <td align=center>
    <h3 id="<?php echo $event->getShort() ?>" ><?php echo $event->getShort() ?></h3>
	</td>
	
	
	</tr>
  
  
<?php endforeach ?>
</table>
</div>


</div>
