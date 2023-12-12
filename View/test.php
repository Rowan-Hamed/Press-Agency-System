<?php 
require_once('../model/Editor.php');
    $editor = new Editor();
    $postId = $editor->addPost('test','tesst',0,'sport',1,'');
    //    public function reply($userId,$postId,$commentIdToReply,$commentBody)
    $editor ->reply(1,$postId, 1,'wow');
?>
