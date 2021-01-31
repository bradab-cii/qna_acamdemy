<?php
$msg = "";
$css_class = "";

$conn = mysqli_connect('localhost' , 'root' , '' , 'qnaacademy');
if(isset($_GET['post'])){
    $question = $_GET['question'];
    $detail = $_GET['detail'];
    if(isset($title) || isset($detail)){
        $mysql = "INSERT INTO data_qna (question, detail) VALUES ('$question', '$detail')";
        if(mysqli_query($conn, $mysql)){

            $msg = 'Post Sucessfully';
            $css_class = 'alert-success';

        }else{
            $msg = 'Failed to post';
            $css_class = 'alert-danger';

        }
        

    }else{
        $msg = 'Failed to post a public question';
        $css_class = 'alert-danger';
    }

}