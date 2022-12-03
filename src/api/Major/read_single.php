<?php

  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Major.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();
  // Instantiate blog major object
  $major = new Major($db);

  // Get ID
  $major->id = isset($_GET['id']) ? $_GET['id'] : die();

  // Get post
  $major->read_single();

  // Create array
  $major_arr = array(
    'id' => $major->id,
    'name' => $major->name
  );

  // Make JSON
  print_r(json_encode($major_arr));
