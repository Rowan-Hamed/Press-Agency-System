<?php
include ('../model/db/DatabaseClass.php');
class Admin{

    public  $userCon;

    public function __construct() {
        $this->userCon = new database();
    }

    public function addUser($fName,$lname,$userType,$email,$password,$phoneNum,$urlToPhoto){
        $sql = "SELECT * FROM users where email = '$email'";

        if($this->userCon->check($sql) != 0)
            return 0;
        
        $sql = "
        INSERT INTO users (userType, fname, 
        lname, email, phoneNum, password, urlToPhoto) 
        VALUES ('$userType' , '$fName' , '$lname', '$email', '$phoneNum', '$password', '$urlToPhoto')
        ";
        $res = $this->userCon->insert($sql);
        
        return $this->userCon->getLastRecordData('users')['id'];
    }
    public function deleteUser($userId){
        $sql = "DELETE FROM users WHERE id = $userId";
        return $this->userCon->delete($sql);
    }

    public function updateUser($userId,$fName,$lname,$userType,$email,$password,$phoneNum,$urlToPhoto){
            $sql = "
                    UPDATE users
                    SET
                        fname =      '$fName',
                        lname =      '$lname',
                        email =      '$email',
                        phoneNum =   '$phoneNum',
                        password =   '$password',
                        urlToPhoto = '$urlToPhoto'
                    WHERE
                        id = $userId;
                ";
            $res = $this->userCon->update($sql);
    }

    public function acceptPost($postId){
        $sql =
        "
        UPDATE post
        SET
            status = 1
        WHERE
            postId = $postId;
        ";
        $this->userCon->update($sql);
    }

    public function refusePost($postId){
        $sql =
        "
        UPDATE post
        SET
            status = -1
        WHERE
            postId = $postId;
        ";
        $this->userCon->update($sql);
    }

    public function deletePost($postId){
        $sql = "DELETE FROM post WHERE id = $postId";
        $this->userCon->delete($sql);
    }
    public function updatePost($postID,$title,$body,$status,$postType,$urlToPhoto){
        $sql="
        UPDATE post
        SET
            title = '$title',
            body = '$body',
            postType = '$postType',
            status = $status,
            urlToPhoto = '$urlToPhoto'
        WHERE
            postId = $postID; 
        ";
        $this->userCon->update($sql);
    }

}
?>