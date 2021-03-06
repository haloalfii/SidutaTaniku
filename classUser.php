<?php
class USER
{
    public $user;
    public $pdo;

    public function __construct(){
        $host="localhost";
        $database="pertanianbeta";
        $user="root";
        $password="";
        $this->pdo = new PDO("mysql:host={$host};dbname={$database}", $user, $password);
    }
 
    public function register($fname,$lname,$uname,$umail,$upass,$role)
    {
       try
       {
           $new_password = password_hash($upass, PASSWORD_DEFAULT);
   
           $stmt = $this->pdo->prepare("INSERT INTO users(user_name,user_email,user_pass,role) 
                                                       VALUES(:uname, :umail, :upass, :urole)");
              
           $stmt->bindparam(":uname", $uname);
           $stmt->bindparam(":umail", $umail);
           $stmt->bindparam(":upass", $new_password);  
           $stmt->bindParam(":urole", $role);          
           $stmt->execute(); 
   
           return $stmt; 
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }    
    }
 
    public function login($uname,$umail,$upass)
    {
       try
       {
          $stmt = $this->pdo->prepare("SELECT * FROM users WHERE user_name=:uname OR user_email=:umail LIMIT 1");
          $stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
          $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
          if($stmt->rowCount() > 0)
          {
             if(password_verify($upass, $userRow['user_pass']))
             {
                if($userRow['role'] == "1") {
                  $_SESSION['admin_session'] = $userRow['user_id'];
                  $_SESSION['level'] = "1";
                  return true;
                }
                else {
                  $_SESSION['user_session'] = $userRow['user_id'];
                  $_SESSION['level'] = "0";
                  return true;
                }
             }
             else
             {
                return false;
             }
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
 
   public function is_loggedin()
   {
      if(isset($_SESSION['user_session']))
      {
         return true;
      }
      if(isset($_SESSION['admin_session']))
      {
         return true;
      }
   }
 
   public function redirect($url)
   {
       header("Location: $url");
   }
}
?>