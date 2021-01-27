<?php
include "connection.php";

$table = $_GET['table'];

switch ($table) {
    case 'forms':
        $form_id        = $_GET['form_id'];
        $url            = $_GET['url'];
        mysqli_query($connect, "DELETE FROM $table WHERE form_id=$form_id");

        header("location:../layouts/master.php?p=$url");
    break;
    case 'questions':
        $form_id        = $_GET['form_id'];
        $question_id    = $_GET['id'];
        mysqli_query($connect, "DELETE FROM $table WHERE question_id=$question_id");

        header("location:../layouts/master.php?p=form&id=$form_id");
    break;
    case 'answer':
    break;
}
?>