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
    $form_title="";
    $fromrange="";
    $torange="";
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $form_title=$row['title'];
            $fromrange=$row['fromrange'];
            $torange=$row['torange'];
        }
    }

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
                <form action ="<?php echo test_input($_SERVER["PHP_SELF"]);?>" method = "post" onsubmit="return rollValidate()">
                    <input type="text" class="form-control" name ="title"value="<?php echo $form_title;?>">
                    <label for="usr">Range:</label>
                    <input type="hidden" name="dtype" value="fform"/>
                    <input type="hidden" name="formuid" value="<?php echo $formid; ?>"/>
                        <input type="text" class="" id="fromrange" placeholder="2017450001" name="fromrange" value="<?php echo $fromrange;?>"> -
                        <input type="text" class="" id="torange" placeholder="2017450060"  name="torange" value="<?php echo $torange;?>">
                        <input type="submit" class="btn btn-success" value="Save">
                </form>

                <?php
                $result = $db->getFeedbackFormQuestion($formid);

                if ($result->num_rows > 0) {
                    echo"<table class='table table-striped'><thead>
      <tr>
        <th>QID</th>
        <th>Type</th>
        <th>Question</th>
      </tr>
    </thead>";
                    while ($row = $result->fetch_assoc()) {
                        echo'<tr>
                    <td>'.$row['uid'].'</td>
                    <td>'.$row['type'].'</td>
                    <td>'.$row['question'].'</td>
                    <td>
                        <form action ="processing.php" method = "post">
                            <input type="hidden" name="quesuid" value="'.$row['uid'].'">
                            <input type="hidden" name="task" value="deletequestion">
                            <input class="btn btn-primary" type="submit" value="Delete" />
                        </form>

                    </td>
                    </tr>';
                    }
                    echo "</table>";
                }



                ?>

<script>
  function rollValidate(){
  var from = document.getElementById("fromrange").value;
  var to = document.getElementById("torange").value;

  if(from.length != 10){
      alert("Please enter correct roll number");
      return false;
  }
  if(to.length != 10){
      alert("Please enter correct roll number");
      return false;
  }
  return true;
}
</script>


                <!-- Trigger the modal with a button -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add Question</button>
            </div>
		</div>

    <!-- Ques Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Question</h4>
                </div>
                <div class="modal-body">
                    <form action ="<?php echo test_input($_SERVER["PHP_SELF"]);?>" method = "post" onsubmit="return quesValidate()">
                        <input type="hidden" name="dtype" value="qform"/>
                        <input type="hidden" name="formuid" value="<?php echo $formid; ?>"/>

                        <select class="form-control" id="qtype" name="qtype">
                            <option value="rating">Rating</option>
                            <option value="review">Review</option>
                        </select></br>
                        <textarea class="form-control" rows="5" id="ques" name="ques" placeholder="Write your question here.."></textarea>
                        <input type="submit" value="Save">
                    </form>
                </div>
            </div>

        </div>
    </div>

    <script>
      function quesValidate(){
      var questionV = document.getElementById("ques").value;
      if(questionV.length > 1000 || questionV.length == ""){
          alert("Please enter a valid question.");
          return false;
      }
      return true;
    }
    </script>

<?php include 'common_footer.php'; ?>
