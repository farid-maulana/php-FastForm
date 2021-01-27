<?php
include "connection.php";

$table = $_GET['table'];

switch ($table) {
    case 'forms':
        $user_id    = $_POST['user_id'];
        $form_name  = $_POST['form_name'];
        $form_desc  = $_POST['form_desc'];
        $url        = $_POST['url'];
        mysqli_query($connect, "INSERT INTO $table VALUES('', '$user_id', '$form_name', '$form_desc', '')");

        header("location:../layouts/master.php?p=$url");
    break;
    case 'questions':
        $id         = $_POST['form_id'];
        $question   = $_POST['question'];
        $type       = $_POST['type'];
        $required   = $_POST['required'];
        mysqli_query($connect, "INSERT INTO $table VALUES('', '$id', '$question', '$type', '$required')");

        header("location:../layouts/master.php?p=form&id=$id");
    break;
    case 'answers':        
        $sid = $_POST['session_id'];
        $id = $_POST['form_id'];
        for ($i = 0; $i < count($_POST['questions']); $i++) {
            $question_id = $_POST['questions'][$i];
            $answer = $_POST['answers'][$i];
            $date = date('Y-m-d h:i:S');
            mysqli_query($connect, "INSERT INTO $table VALUES('', '$question_id', '$answer', '$date', '$sid', '$id')");
        }
        header("location:../layouts/master.php?p=thanks&publish=true");
    break;
}
?>