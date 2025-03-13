<?php

$config = require base_path('config.php');
$db = new Database($config['database']);


$note = $db->query('select * from notes where id = :id', [
   'id' => $_GET['id']
])->findOrfail();

authorize($note['user_id'] !== 5);

view(
   "notes/show.view.php",
   [
      'heading' => 'Note',
      'note' => $note
   ]
);
