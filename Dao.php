<?php
require_once 'KLogger.php';
require 'vendor/autoload.php';
class Dao{

    // huroku
    private $host = "us-cdbr-east-02.cleardb.com";
    private $db = "heroku_c13a055430c7240";
    private $user = "b59d3ac2d34d68";
    private $pass = "4d1df6ac";

    // local host 
    // private $host = "localhost";
    // private $db = "cs401";
    // private $user = "joe";
    // private $pass = "password";

    private $logger;


    public function __construct () {
        $this->logger = new KLogger ("log.txt" , KLogger::DEBUG);
    }

    
    public function getConnection (){
        try{
            $this->logger->LogDebug("getting a connection");
            $conn = new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->pass);
            return $conn;
        }
        catch(Exception $e){
            $this->logger->LogFatal("it died via Doa.php: " . print_r($e, 1));
            exit;
        }
    }

    public function getComments() {
        $conn = $this->getConnection();
        return $conn->query("select commentID, name, comment, dateEntered from comment order by dateEntered desc;", PDO::FETCH_ASSOC);
      }

    public function addComment($comment, $name){
        $this->logger->LogInfo("adding a comment [{$comment}]");
        $conn = $this->getConnection();
        $saveQuery = "insert into comment (name, comment) values (:name, :comment)";
        $q = $conn->prepare($saveQuery);
        $q->bindParam(":comment", $comment);
        $q->bindParam(":name", $name);
        $q->execute();
    }

    public function deleteComment ($id) {
        $conn = $this->getConnection();
        $this->logger->LogInfo("deleting a comment [{$id}]");
        $deleteQuery = "delete from comment where commentID = :commentID;";
        $q = $conn->prepare($deleteQuery);
        $q->bindParam(":commentID", $id);
        $q->execute();
      }
      public function userExists ($email) {
        $conn = $this->getConnection();
        $userQuery = "select * FROM user WHERE email = :email";
        $q = $conn->prepare($userQuery);
        $q->bindParam(":email", $email);
        $q->execute();
        return $q->fetchAll();
      }


      public function createUser ($nameFirst, $nameLast, $email, $password, $salt){
        $conn = $this->getConnection();
        $createQuery = "insert into user (nameFirst, nameLast, email, password, salt, access) values(:nameFirst, :nameLast, :email, :password, :salt, 0)";
        $q = $conn->prepare($createQuery);
        $q->bindParam(":nameFirst", $nameFirst);
        $q->bindParam(":nameLast", $nameLast);
        $q->bindParam(":email", $email);
        $q->bindParam(":password", $password);
        $q->bindParam(":salt", $salt);
        $q->execute();
      }

      // public function addSalt($salt, $email){
      //   $conn = $this->getConnection();
      //   $saltQuery = "update user set salt = 'ab12' where email = 'email';";
      //   $q = $conn->prepare($saveQuery);
      //   $q->bindParam(":salt", $salt);
      //   $q->execute();
      // }

      public function getPassSalt ($email) {
        $conn = $this->getConnection();
        $saltQuery = "select password, salt FROM user WHERE email = :email";
        $q = $conn->prepare($saltQuery);
        $q->bindParam(":email", $email);
        $q->execute();
        return $q->fetchAll();
      }

      public function getPass ($email) {
        $conn = $this->getConnection();
        echo $email;
        return $conn->query("select password FROM user WHERE email = '$email';");
      }
      
}



