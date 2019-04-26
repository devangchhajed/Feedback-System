<?php include 'common_header.php'; ?>
<?php include 'navbar.php'; ?>


<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form
    $formid = test_input($_POST['formuid']);

    if(isset($_POST['dtype'])){
        if($_POST['dtype']=="fform") {
            $result = $db->updateFeedbackForm($formid,test_input($_POST['title']),test_input($_POST['fromrange']),test_input($_POST['torange']));
        }
        if($_POST['dtype']=="qform") {
            $result = $db->insertQuestion($_SESSION['user_uuid'],$formid,test_input($_POST['qtype']),test_input($_POST['ques']));
        }
    }


    $result = $db->getFeedbackForm($formid);

    // If result matched $myusername and $mypassword, table row must be 1 row
    $formcreator="";
    $form_title="";
    $form_year="";
    $form_class="";
    $form_coursecode="";
    $form_semester="";
    $form_extrainfo="";
    $fromrange="";
    $torange="";
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $formcreator = $row['createdby'];
            $form_title=$row['title'];
            $fromrange=$row['fromrange'];
            $torange=$row['torange'];
            $form_year=$row['year'];
            $form_class=$row['class'];
            $form_coursecode=$row['coursecode'];
            $form_semester=$row['semester'];
            $form_extrainfo=$row['extrainfo'];
        }
    }

    $msg = "Hello, Your feedback will be completely anonymous. Current Threshold is "+$db->getThreshold().".";
    echo "<script>alert('".$msg."')</script>";


}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

		<div class="container center">
			<div class="box center">
				<img src ="./img/bhavans_logo.png" style="">

				<blockquote style="border:0px;"><h1>SPIT Feedback System</h1></blockquote>
				<hr>
                <h2><?php echo $form_title;?></h2>
                <div style="text-align: left">
                    <form name="feedbackform" action="processing.php" method="post">
                        <input type="hidden" name="task" value="recordfeedback">
                        <input type="hidden" name="formid" value="<?php echo $formid;?>">
                        <blockquote style="border:0px;"><center>
                            <?php echo $form_coursecode."<br>".$form_year." - ".$form_class." - Semester ".$form_semester."<br>".$db->getStudentNameFormUid($formcreator)."<br>".$form_extrainfo; ?>
                            </center>
                        </blockquote>

                        <?php
                    $result = $db->getFeedbackFormQuestion($formid);
                    if ($result->num_rows > 0) {
                        $i=1;
                        while ($row = $result->fetch_assoc()) {
                            echo $i.". ".$row['question'].'</br>';
                            if($row['type']=="rating"){
                                echo '<input type="radio" name="'.$row['uid'].'" value="Very Poor" id="'.$row['uid'].'">Very Poor</input></br>';
                                echo '<input type="radio" name="'.$row['uid'].'" value="Poor" id="'.$row['uid'].'">Poor</input></br>';
                                echo '<input type="radio" name="'.$row['uid'].'" value="Average" id="'.$row['uid'].'">Average</input></br>';
                                echo '<input type="radio" name="'.$row['uid'].'" value="Good" id="'.$row['uid'].'">Good</input></br>';
                                echo '<input type="radio" name="'.$row['uid'].'" value="Very Good" id="'.$row['uid'].'">Very Good</input></br>';
                            }else{
                                echo '<textarea class="form-control" rows="5" id="ques" name="'.$row['uid'].'" placeholder="Write your review here.."></textarea>';

                            }
                            $i++;
                            echo '</br>';
                        }
                    }
                    ?>
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </form>
                    </br>

                </div>
            </div>
		</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="./js/feedbackrecord.js"/>
<?php include 'common_footer.php'; ?>
