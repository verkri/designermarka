<?php foreach ($colorschemes as $cs): ?>
  <div class="toggle-container">
    <h4 id="<?php echo $cs->getSlug() ?>" class="toggle"><?php echo $cs->getName() ?></h4>
    <div class="toggle-content">
      <ul>
        <?php foreach ($cs->getActiveCategories() as $cat): ?>
          <li id="li-<?php echo $cs->getSlug() . '_' . $cat->getSlug() ?>" class="category"><a href="/fetch/<?php echo $cs->getSlug() . '/' . $cat->getSlug() ?>"><?php echo $cat->getName() ?></a></li>
        <?php endforeach; ?>  
      </ul>
    </div>
  </div>
<?php endforeach ?>