<?php slot('page-heading', 'Marka Store') ?>


<div class="inner">
  
  <div class="tagline">
  <h1> Blog left 3</h1>
</div>
  
<div class="content content_right blog3">

  <form action="<?php url_for('@store') ?>" method="POST">
    <?php echo $form ?>
    <input type="submit" value="submit"/>
  </form>
  
  <?php foreach ($marka_products as $p): ?>
  <div class="post">  
    <div class="post-image"> 
      <a href=""><img src="/app/timthumb.jpg"></a> 
    </div>
    
    <div class="post-entry"> 
      <h1 class="title"><a href="<?php url_for('world_product',$p) ?>"><?php echo $p->getName() ?></a></h1> 
      <span class="post-meta">Posted by <strong><a href="" title="Posts by Tauris" rel="author">Tauris</a></strong> in <strong><a href="" title="View all posts in Uncategorized" rel="category">Uncategorized</a></strong></span>
      <p><?php echo $p->getDescription(); ?></p>
    </div> 
  </div>
  <?php endforeach ?>
</div>


  <div class="sidebar sidebar_left"> 

    <div class="sidebar_item"><h5>Category</h5>		<ul>
        <li class="cat-item cat-item-3"><a href="http://rta.zxy.me/purity_wp/?cat=3" title="View all posts filed under Articles">Articles</a>
        </li>
        <li class="cat-item cat-item-15"><a href="http://rta.zxy.me/purity_wp/?cat=15" title="View all posts filed under Random">Random</a>
        </li>
        <li class="cat-item cat-item-1"><a href="http://rta.zxy.me/purity_wp/?cat=1" title="View all posts filed under Uncategorized">Uncategorized</a>
        </li>
      </ul>
    </div>                  

    <div class="sidebar_item"><h5>Category</h5>		<ul>
        <li class="cat-item cat-item-3"><a href="http://rta.zxy.me/purity_wp/?cat=3" title="View all posts filed under Articles">Articles</a>
        </li>
        <li class="cat-item cat-item-15"><a href="http://rta.zxy.me/purity_wp/?cat=15" title="View all posts filed under Random">Random</a>
        </li>
        <li class="cat-item cat-item-1"><a href="http://rta.zxy.me/purity_wp/?cat=1" title="View all posts filed under Uncategorized">Uncategorized</a>
        </li>
      </ul>
    </div>                  

  </div>
</div>