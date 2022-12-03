<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: Classes');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/Classes.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog Classes object
  $classes = new Classes($db);

  // Get raw Classesed data
  $data = json_decode(file_get_contents("php://input"));

  
  $classes->class_name = $data->name;
  $classes->practical_hours = $data->practical_hours;
  $classes->theorical_hours = $data->theorical_hours;
  $classes->total = $data->total;
  $classes->major_id = $data->major_id;

  // Create Classes
  if($classes->create()) {
    echo json_encode(
      array('message' => 'Your class has been created')
    );
  } else {
    echo json_encode(
      array('message' => 'Your class coudnt be created')
    );
  }

