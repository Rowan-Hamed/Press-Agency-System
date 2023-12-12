<?php 
require_once ('../model/db/DatabaseClass.php');
require_once ('../model/Post.php');
class Viewer{
    private  $userCon;

    public function __construct() {
        $this->userCon = new database();
    }
    public function  addLike($userId,$postId){
        $post = new Post($postId);
        //check if the  user add like before
        $sql = "SELECT * FROM likes
            WHERE postId = $postId AND userId = $userId";
        if($res = $this->userCon->select($sql)){
            //this mean that the user react to this post 
            if( $res['status'] ==-1){
                $post->miminusDislikes();
                $post->addLike();

                $sql = "UPDATE likes SET status = '1' WHERE postId = postID AND userId = $userId";
                $this->userCon->update($sql);

            }
        }
        else{
        //add userid and postid to the table
        $sql ="INSERT INTO likes (postId, userId, status)
                VALUES ($postId, $userId, 1)";
        $this->userCon->insert($sql);
        $post->addLike();
        }
    }


    public function  addDislike($userId,$postId){
        $post = new Post($postId);
        //check if the  user add like before
        $sql = "SELECT * FROM likes
            WHERE postId = $postId AND userId = $userId";
        if($res = $this->userCon->select($sql)){
            //this mean that the user react to this post 
            if( $res['status'] ==1){
                $post->miminuslikes();
                $post->addDislike();

                $sql = "UPDATE likes SET status = '-1' WHERE postId = postID AND userId = $userId";
                $this->userCon->update($sql);

            }
        }
        else{
        //add userid and postid to the table
        $sql ="INSERT INTO likes (postId, userId, status)
                VALUES ($postId, $userId, -1)";
        $this->userCon->insert($sql);
        $post->addDislike();
        }
        }

    /*
    +addComment(postId)
    +SavePost(postId)
    */

    public function addComment($userId,$postId,$commentBody){
        $post = new Post($postId);
        $post->addComment($userId,$commentBody);
    }

    public function savePost($userId,$postId){        
        $sql = "SELECT * FROM savedPost WHERE postId = $postId AND userId = $userId";

    // If the post has been saved before, return false
    if ($this->userCon->check($sql) == 1) {
        return false;
    }    
    $sql = "INSERT INTO savedPost (postId, userId) VALUES ($postId, $userId)";
    $this->userCon->insert($sql);
    return true;
    }


}
?>