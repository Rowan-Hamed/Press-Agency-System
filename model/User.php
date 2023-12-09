
<?php 
include ('../model/db/DatabaseClass.php');
class User 
{
    private $userId;
    private $fName;
    private $lName;
    private $type;
    private $email;
    private $password;
    private $phone;
    private $photoURL;
    private $userCon;
//--------------------------------------------

    //contractor for create conection
    function __construct()
    {
        $this->userCon = new database();
    }
//--------------------------------------------

    //functional functions

    private function startSession($userData){
        session_start();
        $_SESSION['userId'] = $userData['id'];
        $this->userId = $userData['id'];

        $_SESSION['fName'] = $userData['fname'];
        $this->fName = $userData['fname'];

        $_SESSION['lName'] = $userData['lname'];
        $this->lName = $userData['lname'];

        $_SESSION['type'] = $userData['userType'];
        $this->type = $userData['userType'];

        $_SESSION['email'] = $userData['email'];
        $this->email = $userData['email'];

        $_SESSION['password'] = $userData['password'];
        $this->password = $userData['password'];

        $_SESSION['phone'] = $userData['phoneNum'];
        $this->phone = $userData['phoneNum'];

        $_SESSION['photoURL'] = $userData['urlToPhoto'];
        $this->photoURL = $userData['urlToPhoto'];

    }
    //update Attributes
    private function updateAtt($att, $value) 
    {
        $sql = "
            UPDATE users
            SET $att = '$value'
            WHERE id = $this->userId;
        ";
    
        $status = $this->userCon->update($sql);
    
        if ($status) {
            $_SESSION[$att] = $value;
            $this->$att = $value;
            return true;
        } else {
            return false;
        }
    }
    
    //boolean function
    public function login($email, $password) {
    
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    
        $userData = $this->userCon->select($sql);
    
        if ($userData) {
            $this->startSession($userData);
            return true;
        } else {
            return false;
        }

    }
    //void function
    public function logout(){
        session_destroy();
    }

//--------------------------------------------
    //getter and setter
    public function getUserId() {
        return $this->userId;
    }

    public function getfName() {
        return $this->fName;
    }

    public function setfName($fName) {
        $this->updateAtt('fname',$fName);
    }
    

    public function getlName() {
        return $this->lName;
    }

    public function setlName($lName) {
        $this->updateAtt('lname',$lName);
    }

    
    public function getType() {
        return $this->type;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->updateAtt('email',$email);
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->updateAtt('password',$password);
    }

    public function getPhone() {
        return $this->phone;
    }

    public function setPhone($phone) {
        $this->updateAtt('phoneNum',$phone);
    }

    public function getPhotoURL() {
        return $this->photoURL;
    }
    public function setPhotoURL($photoURL) {
        $this->updateAtt('urlToPhoto',$photoURL);
    }

}
?>