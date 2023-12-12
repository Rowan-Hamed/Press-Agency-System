
<?php 
require_once ('../model/db/DatabaseClass.php');
class Post {
    private $postID;
    private $title;
    private $body;
    private $creationTime;
    private $status;
    private $postType;
    private $numViews;
    private $likesNum;
    private $dislikesNum;
    private $owner;
    private $urlToPhoto;
    private $postCon;
    /*
    +addLike(userId)
    +addDislike(userId)
    +addComment(userId)
    +reply(userId)
    */
    function __construct($id)
    {
        $this->postCon = new database();
        $sql = "SELECT * FROM post WHERE postId = $id";
        $row = $this->postCon->select($sql);
        
        $this->postID = $row['postId'];
        $this->title = $row['title'];
        $this->creationTime = $row['creationTime'];
        $this->numViews = $row['numViews'];
        $this->status = $row['status'];
        $this->urlToPhoto = $row['urlToPhoto'];
        $this->likesNum = $row['likesNum'];
        $this->dislikesNum = $row['dislikesNum'];
        $this->postType = $row['postType'];
        
        //owner will return the name of the owner not the id
        $sql = "SELECT fname, lname FROM users WHERE id = $row[ownerId]";
        $res = $this->postCon->select($sql);
        $this->owner =$name =  $res['fname'] . ' ' . $res['lname'];        ;
        
    }

//----------------------------------------------
    private function updateAtt($att, $value) {
        $sql = "UPDATE post SET $att = '$value' WHERE postId = $this->postID";
        $status = $this->postCon->update($sql);

        if ($status) {
            $this->$att = $value;
            return true;
        } else {
            return false;
        }
    }
//--------------------------------------------
    public function miminuslikes(){
        $this->updateAtt('likesNum',$this->likesNum - 1);
    }
    public function miminusDislikes(){
        $this->updateAtt('dislikesNum',$this->dislikesNum - 1);
    }
public function addLike(){
        $this->updateAtt('likesNum',$this->likesNum + 1);
        
    }
    public function addDislike(){
        $this->updateAtt('dislikesNum',$this->dislikesNum + 1);
    }
    public function addComment($userID,$comment){
        $sql = 
        "
        INSERT INTO comments (postId, userId, comment)
        VALUES ($this->postID, $userID,$comment);
        ";
        $this->postCon->insert($sql);
    }
    public function reply($userID,$comment,$commentId){
        $sql = 
        "
        INSERT INTO comments (postId, userId, comment, parentCommentId)
        VALUES ($this->postID, $userID,'$comment', $commentId);
        ";
        $this->postCon->insert($sql);
    }

//--------------------------------------------
    public function setTitle($value) {
        $this->updateAtt('title',$value);
    }

    public function setBody($value) {
        $this->updateAtt('body',$value);
    }
    public function setUrlToPhoto($newUrlToPhoto){
        $this->updateAtt('urlToPhoto',$newUrlToPhoto);
    }

    public function setPostType($value) {
        $this->updateAtt('postType',$value);
    }
    public function setStatus($status){
        $this->status = $status;
    }
    //---------------------------------
    public function getPostID() {
        return $this->postID;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getBody() {
        return $this->body;
    }

    public function getCreationTime() {
        return $this->creationTime;
    }

    public function getNumViews() {
        return $this->numViews;
    }

    public function getLikesNum() {
        return $this->likesNum;
    }

    public function getDislikesNum() {
        return $this->dislikesNum;
    }

    public function getOwner() {
        return $this->owner;
    }

    public function getUrlToPhoto($newUrlToPhoto){
        return $this->urlToPhoto;
    }
    public function getStatus(){
        return $this->status;
    }

    
}
?>