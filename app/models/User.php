<?php
  class User {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }
    
    public function getGuests(){
      $this->db->query('SELECT *
                        FROM guests
                        ');

      $results = $this->db->resultSet();

      return $results;
    }

    // Regsiter user
    public function register($data){
      $this->db->query('INSERT INTO users (name, email, status, password) VALUES(:name, :email, :status, :password)');
      // Bind values
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':status', $data['status']);
      $this->db->bind(':password', $data['password']);
      
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }


    // User RSVP
    public function reserve($data){
      $this->db->query('INSERT INTO guests (name, email, rsvp) VALUES(:name, :email, :rsvp)');
      // Bind values
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':rsvp', $data['rsvp']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function prefferences($data){
      $this->db->query('UPDATE guests SET prefferences = :prefferences WHERE email = :email');
      // Bind values
      
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':prefferences', $data['prefferences']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    // Login User
    public function login($email, $password){
      $this->db->query('SELECT * FROM users WHERE email = :email');
      $this->db->bind(':email', $email);

      $row = $this->db->single();

      $hashed_password = $row->password;
      if(password_verify($password, $hashed_password)){
        return $row;
      } else {
        return false;
      }
    }

    // Find user by email
    public function findUserByEmail($email){
      $this->db->query('SELECT * FROM users WHERE email = :email');
      // Bind value
      $this->db->bind(':email', $email);

      $row = $this->db->single();

      // Check row
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }

    // Check if User already added idea 
    public function findGuestsByEmail($email){
      $this->db->query('SELECT * FROM guests WHERE email = :email');
      // Bind value
      $this->db->bind(':email', $email);

      $row = $this->db->single();

      // Check row
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }

    // Get User by ID
    public function getUserById($id){
      $this->db->query('SELECT * FROM users WHERE id = :id');
      $this->db->bind(':id', $id);

      $row = $this->db->single();

      return $row;
    }
  }