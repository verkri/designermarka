<?php


$dbh = pg_connect("host=localhost dbname=marka user=postgres password=postgres");


$sql = "ALTER TABLE marka_event_image ADD CONSTRAINT marka_event_image_event_id_marka_event_id FOREIGN KEY (event_id) REFERENCES marka_event(id) NOT DEFERRABLE INITIALLY IMMEDIATE;";

$result = pg_query($dbh, $sql);


die('loszar');




?>