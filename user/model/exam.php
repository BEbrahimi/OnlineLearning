<?php

function createExam($examCategory = null,$examTime=null){
    global $connect,$tbl_exam_cat;
    $examCategory = sanitize($examCategory);
    $examTime = sanitize($examTime);

    $sql = "INSERT INTO $tbl_exam_cat(category,exam_time) VALUES ('$examCategory','$examTime')";

    $result = $connect->query($sql);

    return $result;

}

function findExam(){
    global $connect,$tbl_exam_cat;
    $sql = ("SELECT * FROM `$tbl_exam_cat` ORDER BY `id` DESC LIMIT 8 ");
    $result = $connect->query($sql);
    $result->execute();
    if ($result->rowCount()>=1){
        return $result;
    }
    return false;
}

function deleteExamById($id = null){
    $id = $_GET['id'];
    global $connect,$tbl_exam_cat;
    $id = intval($id);
    $sql = ("DELETE FROM `$tbl_exam_cat` WHERE `id`=? LIMIT 1");
    $result = $connect->prepare($sql);
    $result->bindValue(1,$id);
    $result->execute();
    if ($result->rowCount()==1){
        return $result;
        header("location:create_test.php");
    }
    return false;
}

// Update Exam
function updateExamById($id,$examCategory = null,$examTime=null){
    global $connect,$tbl_exam_cat;

    $id = intval($id);
    $examCategory = sanitize($examCategory);
    $examTime = sanitize($examTime);
    $sql = ("UPDATE `$tbl_exam_cat` SET `category`=?,`exam_time`=? WHERE `id`=? LIMIT 1");
    $result = $connect->prepare($sql);
    $result->bindValue(1,$examCategory);
    $result->bindValue(2,$examTime);
    $result->bindValue(3,$id);
    $result->execute();
    return $result;
}

function findExamById($id){
    global $connect,$tbl_exam_cat;
    $id = intval($id);
    $sql = ("SELECT * FROM `$tbl_exam_cat` WHERE `id`=?");
    $result = $connect->prepare($sql);
    $result->bindValue(1,$id);
    $result->execute();
    if ($result->rowCount()>=1){
        return $result;
    }
    return false;
}

function createExamQuestion($question_no = null,$question = null,$opt1=null,$opt2=null,$opt3=null,$opt4=null,$answer=null,$category=null){
    global $connect,$tbl_online_quiz;

    $question_no = intval($question_no);
    $question = sanitize($question);
    $opt1 = sanitize($opt1);
    $opt2 = sanitize($opt2);
    $opt3 = sanitize($opt3);
    $opt4 = sanitize($opt4);
    $answer = sanitize($answer);
    $category = sanitize($category);

    $sql = "INSERT INTO $tbl_online_quiz(question_no,question,opt1,opt2,opt3,opt4,answer,category) VALUES ('$question_no','$question','$opt1','$opt2','$opt3','$opt4','$answer','$category')";

    $result = $connect->query($sql);

    return $result;

}

function findExamQuestion(){
    global $connect,$tbl_online_quiz;
    $sql = ("SELECT * FROM `$tbl_online_quiz` ORDER BY `id` DESC LIMIT 30 ");
    $result = $connect->query($sql);
    $result->execute();
    if ($result->rowCount()>=1){
        return $result;
    }
    return false;
}
