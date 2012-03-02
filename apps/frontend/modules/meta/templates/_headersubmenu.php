<nav class="subnav"> 
  <ul>
    <?php foreach ($marka_colorschemes as $c): ?>
      <?php if ( sfConfig::get('app_submenu') == $c->getId() ): ?>
        <li class="current-menu-item">
      <?php else: ?>
        <li>
      <?php endif ?>
      <a href="<?php echo url_for('world_colorscheme',$c) ?>"><?php echo $c->getName() ?></a>
      </li>
    <?php endforeach ?>
  </ul>
</nav>