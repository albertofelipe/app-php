<?php

$config = require('config.php');
$db = new Database($config['database']);

$heading = 'Note';

$note = $db->query('select * from notes where id = :id', [
   'id' => $_GET['id']
])->findOrfail();

authorize($note['user_id'] !== 5);

require "views/note.view.php";
