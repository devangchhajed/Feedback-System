<?php

/**
 * Created by PhpStorm.
 * User: Devang
 * Date: 10/16/2017
 * Time: 9:36 PM
 */
class DB_Functions
{
    private $conn;

    // constructor
    function __construct() {
        // Connecting to mysql database
        require_once 'include/DB_Connect.php';
        $db = new DB_Connect();
        $this->conn = $db->connect();
    }

    function __destruct() {

    }


    /**
     * Table : User
     */


    public function storeUser($usertype, $loginid, $password, $name, $dob, $email, $phone) {


      if(!$this->checkUser($loginid, $email)){
        $stmt = $this->conn->prepare("INSERT INTO `user` (`uid`, `usertype`, `loginid`, `password`, `name`, `dob`, `email`, `phone`, `create_time`, `usercol`) VALUES
        (NULL, ?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP, NULL)");
        $stmt->bind_param("sssssss",$usertype, $loginid, $password, $name, $dob, $email, $phone);
        $result = $stmt->execute();
        $stmt->close();
        return true;

      }
      else
      return false;

    }

    public function checkUser($id, $email){
        $sql = "SELECT * from user where loginid = '".$id."' or email = '".$email."'";
        $result = $this->conn->query($sql);
//                return $result->fetch_assoc();
        if ($result->num_rows > 0)
           return true;
          else
            return false;
    }

    public function changePassword($uid, $password) {

      $sql = "UPDATE user SET password = '".$password."' where uid = ".$uid;
      $result = $this->conn->query($sql);

      if($result)
        return true;
      else
        return false;

    }

    public function loginUser($id, $password){
        $sql = "SELECT * from user where loginid = '".$id."' and password = '".$password."'";
        $result = $this->conn->query($sql);
//                return $result->fetch_assoc();
           return $result;
    }

    public function checkConnectivity(){
        $stmt = $this->conn->prepare("Select NOW()");
        $result = $stmt->execute();
        return "Connected : ";
    }


    /**
     * Table : Feedback Form
     */


    public function getActiveForm($id){
        $sql = "SELECT * from feedback_form where createdby = ".$id;
        $result = $this->conn->query($sql);
        return $result;
    }

    public function getAllForm($id){
        $sql = "SELECT * from feedback_form";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function createFeedbackForm($id){
        $sql = "INSERT INTO `feedback_form` (`uid`, `createdby`, `title`) VALUES (NULL, '".$id."','New Form');";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function getFeedbackForm($id){
        $sql = "SELECT * from feedback_form where uid = ".$id;
        $result = $this->conn->query($sql);
        return $result;
    }

    public function getFeedbackFormTitle($id){
        $sql = "SELECT * from feedback_form where uid = ".$id;
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                return $row["title"];
            }
        }
    }

    public function checkRangeInFeedbackTable($id){
        $fromrange = NULL;
        $torange = NULL;
        $sql = "SELECT * FROM feedback_form where uid = ".$id;
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $fromrange=$row['fromrange'];
                $torange = $row['torange'];
            }

        }

        if($fromrange==NULL || $torange ==NULL)
            return true;
        else
            return false;
    }


    public function updateFeedbackForm($id, $title, $fromrange, $torange){

        $fid=$id;
        $uid=0;
        $task=0;

        if($this->checkRangeInFeedbackTable($id))
        {
            $stmt = $this->conn->prepare("INSERT INTO assignment (feedback_form_uid, user_uid, status) VALUES (?, ?, ?)");
            $stmt->bind_param("iii", $fid, $uid, $task);
            for($var =  $fromrange; $var<= $torange; $var++){
                $uid=$var;
                $stmt->execute();
            }
            $stmt->close();

            $sql = "UPDATE feedback_form SET title = '".$title."', fromrange = '".$fromrange."', torange ='".$torange."' where uid = ".$id;
            $result = $this->conn->query($sql);

        }
        else{
            $sql = "UPDATE feedback_form SET title = '".$title."' where uid = ".$id;
            $result = $this->conn->query($sql);

        }

        return $result;
    }

    public function deleteFeedbackForm($id){
        $sql = "DELETE FROM feedback_questions where feedback_form = ".$id;
        $result = $this->conn->query($sql);
        $sql = "DELETE FROM assignment where feedback_form_uid = ".$id;
        $result = $this->conn->query($sql);
        $sql = "DELETE FROM feedback_form where uid = ".$id;
        $result = $this->conn->query($sql);
        return $result;
    }

    /**
     * Table : Feedback Question
     */


    public function getFeedbackFormQuestion($id){
        $sql = "SELECT * from feedback_questions where feedback_form = ".$id;
        $result = $this->conn->query($sql);
        return $result;
    }



    public function insertQuestion($uid, $fid, $type, $ques){
        $sql = "INSERT INTO `feedback_questions` (`uid`, `user_uid`, `feedback_form`, `question`, `type`) VALUES (NULL, ".$uid.", ".$fid.", '".$ques."', '".$type."')";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function deleteFormQuestion($id){
        $sql = "DELETE FROM feedback_questions where uid = ".$id;
        $result = $this->conn->query($sql);
        return $result;
    }


    /**
     * Table : Assignment
     */


    public function getStudentForm($id){
        $sql = "SELECT * from assignment where user_uid = ".$id;
        $result = $this->conn->query($sql);
        return $result;
    }


    public function recordFeedback($userid, $formid, $post){

        $quesid=0;
        $answer="";
        $stmt = $this->conn->prepare("INSERT INTO `feedback_record` (`uid`, `feedback_questions_uid`, `feedback_form_uid`, `answer`) VALUES (NULL, ?, ?, ?);");
        $stmt->bind_param("iis", $quesid, $formid, $answer);

        $result=$this->getFeedbackFormQuestion($formid);
        $totalques = $result->num_rows;

        $i=0;

        foreach ($post as $key=>$value ) {
          if($value==NULL||$value=="")
            return false;

            $i++;
        }

        $i-=2;
        if($i<$totalques)
          return false;


        foreach ($post as $key=>$value ) {
            if(is_numeric($key)){
                $quesid=$key;
                $answer=$value;
                $stmt->execute();
            }
        }

        $stmt->close();

        $sql = "UPDATE assignment SET status = 1 where user_uid = ".$userid." and feedback_form_uid = ".$formid;
        $result = $this->conn->query($sql);
        return true;
    }


    public function getFeedbackStatus($userid, $formid){
        $sql = "SELECT * from assignment where user_uid = ".$userid." and feedback_form_uid = ".$formid;
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                return $row["status"];
            }
        }
    }

    /*
     *
     * Stats Function
     *
     * */

    public function getAllFeedback($formid){
        $sql="select feedback_questions.question, feedback_questions.type, feedback_record.answer from feedback_questions INNER JOIN feedback_record ON feedback_record.feedback_questions_uid = feedback_questions.uid where feedback_record.feedback_form_uid = ".$formid;
        $result = $this->conn->query($sql);
        return $result;
    }

    public function studentsLeftForFeedback($formid){
        $sql="SELECT user.name FROM user INNER JOIN assignment ON assignment.user_uid=user.loginid where assignment.status = 0 and assignment.feedback_form_uid=".$formid;
        $result = $this->conn->query($sql);
        return $result;
    }

    public function studentsUidLeftForFeedback($formid){
        $sql="SELECT user_uid FROM assignment where status = 0 and feedback_form_uid=".$formid;
        $result = $this->conn->query($sql);
        return $result;
    }

    public function getStudentNameFormLoginid($id){
        $sql = "SELECT name from user where loginid = ".$id;
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                return $row['name'];
            }
        }else{
            return 0;
        }
    }

    public function getStudentNameFormUid($id){
        $sql = "SELECT name from user where uid = ".$id;
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                return $row['name'];
            }
        }else{
            return 0;
        }
    }


    public function getThreshold(){
        $sql = "SELECT * from preferences where name = 'threshold'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                return $row['value'];
            }
        }else{
            return 0;
        }
    }

    public function setThreshold($val){
        $sql = "UPDATE preferences set value='".$val."' where name ='threshold'";
        $result = $this->conn->query($sql);
        return $result;
    }


}
