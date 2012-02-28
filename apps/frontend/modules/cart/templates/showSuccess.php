<?php foreach($products as $token => $item ): ?>
<?php echo $token.' Name: '.$item['product']->getName().' Quantity: '.$item['qty'] ?><br/>
<?php endforeach ?>