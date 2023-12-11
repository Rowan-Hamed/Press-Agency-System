<?php
include ('../model/db/DatabaseClass.php');
include ('../model/User.php');
class Admin extends User{

    public function addUser($fName,$lname,$userType,$email,$password,$phoneNum,$urlToPhoto){
        $sql = "
        INSERT INTO 'users' ('userType', 'fname', 
        'lname', 'email', 'phoneNum', 'password', 'urlToPhoto') 
        VALUES ($userType , $fName , $lname, $email, $phoneNum, $password, $urlToPhoto)
        ";
        $res = parent::$userCon->insert($sql);
        return true;
    }
    public function deleteUser($userId){
        $sql = "DELETE FROM users WHERE id = userId";
        return parent::$userCon->delete($sql);
    }

    public function updateUSer($userId,$fName,$lname,$userType,$email,$password,$phoneNum,$urlToPhoto){
            $sql = "
                    UPDATE users
                    SET
                        fname =      $fName,
                        lname =      $lname,
                        email =      $email,
                        phoneNum =   $phoneNum,
                        password =   $password,
                        urlToPhoto = $urlToPhoto
                    WHERE
                        id = $userId;
                ";
            $res = parent::$userCon->update($sql);
    }

    public function acceptPost($postId){
        $sql =
        "
        UPDATE post
        SET
            status = 1,
        WHERE
            postId = $postId;
        ";
        parent::$userCon->update($sql);
    }

    public function refusePost($postId){
        $sql =
        "
        UPDATE post
        SET
            status = -1,
        WHERE
            postId = $postId;
        ";
        parent::$userCon->update($sql);
    }

    public function deletePost($postId){
        $sql = "DELETE FROM post WHERE id = $postId";
        return parent::$userCon->delete($sql);
    }
    public function updatePost($postID,$title,$body,$status,$postType,$urlToPhoto){
        $sql="
        UPDATE post
        SET
            title = $title,
            body = $body,
            postType = $postType,
            status = $status,
            urlToPhoto = $urlToPhoto,
        WHERE
            postId = $postID; 
        ";
        parent::$userCon->update($sql);
    }

}
?>