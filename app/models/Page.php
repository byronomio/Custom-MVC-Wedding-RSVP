<?php
class Pages
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  // public function getUsers(){
  //   $this->db->query('SELECT *,
    
  //                     users.id as userId
  //                     FROM users
  //                     ');

  //   $results = $this->db->resultSet();

  //   return $results;
  // }
}
