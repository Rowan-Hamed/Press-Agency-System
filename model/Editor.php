<?php 
require_once ('../model/db/DatabaseClass.php');
require_once ('../model/Post.php');
class Editor 
{
    private  $userCon;

    public function __construct() {
        $this->userCon = new database();
    }

    public function addPost($title,$body ,$status,$postType,$ownerId,$urlToPhoto){
        $sql =
        "
        INSERT INTO post
                (title, body, postType, status, urlToPhoto, ownerId)
        VALUES ('$title', '$body', '$postType', $status, '$urlToPhoto', $ownerId);
        ";
        $this->userCon->insert($sql);
        return $this->userCon->getLastRecordPostId('post')['postId'];
    }

    public function deletePost($postId){
        $sql = "DELETE FROM post WHERE postId = $postId";
        return $this->userCon->delete($sql);
    }

    public function updatePost($postID,$title,$body ,$postType,$urlToPhoto){
        $sql =
        "UPDATE post
                    SET
                    title =     '$title',
                    body =      '$body',
                    postType =  '$postType',
                    urlToPhoto ='$urlToPhoto'

                    WHERE
                    postId = $postID;
        ";
        $this->userCon->update($sql);
    }

    public function reply($userId,$postId,$commentIdToReply,$commentBody){
        $post = new Post($postId);
        $post->reply($userId,$commentBody,$commentIdToReply);
    }
}

?>