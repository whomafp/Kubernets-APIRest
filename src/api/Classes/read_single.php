<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Classes.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog Classes object
  $classes = new Classes($db);

  // Get ID
  $classes->id = isset($_GET['id']) ? $_GET['id'] : die();

  // Get Classes
  $classes->read_single();

  // Create array
  $post_arr = array(
    'id' => $classes->id,
    'major_name' => $classes->major_name,
    'class_name' => $classes->class_name,
    'practical_hours' => $classes->practical_hours,
    'theorical_hours' => $classes->theorical_hours,
    'total' => $classes->total
  );

  // Make JSON
  print_r(json_encode($post_arr));