<nav class="subnav"> 
  <ul>
    <?php foreach ($marka_colorschemes as $c): ?>
      <?php if ( has_slot('submenu-colorscheme') && (int)get_slot('submenu-colorscheme') == $c->getId() ): ?>
        <li class="current-menu-item">
      <?php else: ?>
        <li>
      <?php endif ?>
      <a href="<?php echo url_for('showcase_colorscheme',$c) ?>"><?php echo $c->getName() ?></a>
      </li>
    <?php endforeach ?>
  </ul>
</nav>