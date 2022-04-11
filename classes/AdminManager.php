<?php

class AdminManager {

    
    protected $db;

    public function __construct($db)
    {
      $this->db = $db;
    }
  
    public function connect(Admin $admin)
    {
   
      $q = $this->db->prepare('SELECT * FROM admin WHERE admin = :admin AND password = :password');
      
      $q->bindValue(':password', $admin->getPassword());
      $q->bindValue(':admin', $admin->getAdmin());

      
      $q->execute();
      $adminArray = $q->fetch(PDO::FETCH_ASSOC);
      
      $admin->hydrate([
        'id' => $adminArray['id']
      ]);
    }
}
