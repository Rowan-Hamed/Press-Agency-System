
<?php 
include ('../model/db/DatabaseClass.php');
class User 
{
    protected  $id;
    protected  $fName;
    protected  $lname;
    protected  $userType;
    protected  $email;
    protected  $password;
    protected  $phoneNum;
    protected  $urlToPhoto;
    protected  $userCon;
//--------------------------------------------
    function __construct()
    {
        $this->userCon = new database();
    }
//--------------------------------------------

    //functional functions

    private function startSession($userData){
        session_start();
        $_SESSION['id'] = $userData['id'];
        $this->id = $userData['id'];

        $_SESSION['fName'] = $userData['fname'];
        $this->fName = $userData['fname'];

        $_SESSION['lname'] = $userData['lname'];
        $this->lname = $userData['lname'];

        $_SESSION['userType'] = $userData['userType'];
        $this->userType = $userData['userType'];

        $_SESSION['email'] = $userData['email'];
        $this->email = $userData['email'];

        $_SESSION['password'] = $userData['password'];
        $this->password = $userData['password'];

        $_SESSION['phoneNum'] = $userData['phoneNum'];
        $this->phoneNum = $userData['phoneNum'];

        $_SESSION['urlToPhoto'] = $userData['urlToPhoto'];
        $this->urlToPhoto = $userData['urlToPhoto'];

    }
    //update Attributes
    private function updateAtt($att, $value) 
    {
        $sql = "
            UPDATE users
            SET $att = '$value'
            WHERE id = $this->id;
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
        return $this->id;
    }

    public function getfName() {
        return $this->fName;
    }

    public function setfName($fName) {
        $this->updateAtt('fname',$fName);
    }
    

    public function getlName() {
        return $this->lname;
    }

    public function setlName($lName) {
        $this->updateAtt('lname',$lName);
    }

    
    public function getUserType() {
        return $this->userType;
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

    public function getPhoneNum() {
        return $this->phoneNum;
    }

    public function setPhone($phone) {
        $this->updateAtt('phoneNum',$phone);
    }

    public function getUrlToPhoto() {
        return $this->urlToPhoto;
    }
    public function setPhotoURL($photoURL) {
        $this->updateAtt('urlToPhoto',$photoURL);
    }

}
?>
