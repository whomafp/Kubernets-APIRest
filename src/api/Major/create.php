<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/Major.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $major = new Major($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  $major->name = $data->name;

  // Create Major
  if($major->create()) {
    echo json_encode(
      array('message' => 'Major Created')
    );
  } else {
    echo json_encode(
      array('message' => 'Major Not Created')
    );
  }
