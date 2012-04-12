<?php foreach ($categories as $cat): ?>
  <div class="toggle-container">
    <h4 id="<?php echo $cat->getSlug() ?>" class="toggle"><?php echo $cat->getName() ?></h4>
    <div class="toggle-content">
      <ul>
        <?php foreach ($cat->getActiveColorschemes() as $cs): ?>
          <li id="li-<?php echo $cs->getSlug() . '_' . $cat->getSlug() ?>" class="category"><a href="/fetch/<?php echo $cs->getSlug() . '/' . $cat->getSlug() ?>"><?php echo $cs->getName() ?></a></li>
        <?php endforeach; ?>  
      </ul>
    </div>
  </div>
<?php endforeach ?>