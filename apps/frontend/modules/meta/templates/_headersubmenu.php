<nav class="subnav"> 
  <ul>
    <?php foreach ($marka_categories as $c): ?>
    <li><a href="<?php echo url_for('category_show',$c) ?>"><?php echo $c->getName() ?></a></li>
    <?php endforeach ?>
  </ul>
</nav>