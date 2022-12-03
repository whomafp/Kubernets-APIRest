<?php 
  class Classes {
    // DB stuff
    private $conn;
    private $table = 'classes';

    // Post Properties
    public $id;
    public $major_id;
    public $major_name;
    public $class_name;
    public $theorical_hours;
    public $practical_hours;
    public $total;
    public $created_at;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Posts
    public function read() {
      // Create query
      $query = 'SELECT c.id, c.major_id, c.name as class_name, c.theorical_hours, c.practical_hours, m.name as major_name, c.total, c.created_at
                                FROM ' . $this->table . ' c
                                LEFT JOIN
                                  major m ON c.major_id = m.id
                                ORDER BY
                                  c.created_at DESC';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    // Get Single Post
    public function read_single() {
          // Create query
          $query = 'SELECT c.id, c.major_id, c.name as class_name, c.theorical_hours, c.practical_hours, m.name as major_name, c.total, c.created_at
                                    FROM ' . $this->table . ' c
                                    LEFT JOIN
                                      major m ON c.major_id = m.id
                                    WHERE
                                      c.id = ?
                                    LIMIT 0,1';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Bind ID
          $stmt->bindParam(1, $this->id);

          // Execute query
          $stmt->execute();

          $row = $stmt->fetch(PDO::FETCH_ASSOC);

          // Set properties
          $this->id = $row['id'];
          $this->major_name = $row['major_name'];
          $this->class_name = $row['class_name'];
          $this->practical_hours = $row['practical_hours'];
          $this->theorical_hours = $row['theorical_hours'];
          $this->total = $row['total'];
          
          
    }

    // Create Post
    public function create() {
          // Create query
          $query = 'INSERT INTO ' . $this->table . ' SET practical_hours = :practical_hours, theorical_hours = :theorical_hours, name = :name, major_id = :major_id, total =:total';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->class_name = htmlspecialchars(strip_tags($this->class_name));
          $this->practical_hours = htmlspecialchars(strip_tags($this->practical_hours));
          $this->theorical_hours = htmlspecialchars(strip_tags($this->theorical_hours));
          $this->total = htmlspecialchars(strip_tags($this->total));
          $this->major_id = htmlspecialchars(strip_tags($this->major_id));

          // Bind data
          $stmt->bindParam(':name', $this->class_name);
          $stmt->bindParam(':practical_hours', $this->practical_hours);
          $stmt->bindParam(':theorical_hours', $this->theorical_hours);
          $stmt->bindParam(':total', $this->total);
          $stmt->bindParam(':major_id', $this->major_id);

          // Execute query
          if($stmt->execute()) {
            return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }

    // Update Post
    public function update() {
          // Create query
          $query = 'UPDATE ' . $this->table . '
                                SET name = :name, theorical_hours = :theorical_hours, practical_hours = :practical_hours,total = :total, major_id = :major_id
                                WHERE id = :id';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->total = htmlspecialchars(strip_tags($this->total));
          $this->practical_hours = htmlspecialchars(strip_tags($this->practical_hours));
          $this->theorical_hours = htmlspecialchars(strip_tags($this->theorical_hours));
          $this->class_name = htmlspecialchars(strip_tags($this->class_name));
          $this->major_id = htmlspecialchars(strip_tags($this->major_id));
          $this->id = htmlspecialchars(strip_tags($this->id));

          // Bind data
          $stmt->bindParam(':total', $this->total);
          $stmt->bindParam(':practical_hours', $this->practical_hours);
          $stmt->bindParam(':theorical_hours', $this->theorical_hours);
          $stmt->bindParam(':name', $this->class_name);
          $stmt->bindParam(':major_id', $this->major_id);
          $stmt->bindParam(':id', $this->id);

          // Execute query
          if($stmt->execute()) {
            return true;
          }

          // Print error if something goes wrong
          printf("Error: %s.\n", $stmt->error);

          return false;
    }

    // Delete Post
    public function delete() {
          // Create query
          $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->id = htmlspecialchars(strip_tags($this->id));

          // Bind data
          $stmt->bindParam(':id', $this->id);

          // Execute query
          if($stmt->execute()) {
            return true;
          }

          // Print error if something goes wrong
          printf("Error: %s.\n", $stmt->error);

          return false;
    }
    
  }