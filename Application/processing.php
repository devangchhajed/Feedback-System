<?php include 'common_header.php'; ?>
<?php include 'navbar.php'; ?>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form

    $task = test_input($_POST['task']);
    if($task == "deleteform"){
        $result = $db->deleteFeedbackForm(test_input($_POST['formuid']));
        echo '<script>window.location="home.php"</script>';
    }
    if($task == "deletequestion"){
        $result = $db->deleteFormQuestion(test_input($_POST['quesuid']));
        echo '<script>window.location="home.php"</script>';
    }

    if($task == "recordfeedback"){
        $result = $db->recordFeedback($_SESSION['login_user'], $_POST['formid'], $_POST);
        if(!$result)
          echo '<script>alert("Please Answer all the Question.")</script>';
        echo '<script>window.location="home.php"</script>';
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
            <div style="height:75px; width:auto;text-align: center;text-transform: capitalize;display: flex;  /* justify-content: center; */ /* align horizontal */  /* align-items: center; */font-family: monospace;font-size: 20px;width: 523px;margin: auto;">
                <img src="./img/loader.gif" style="height: 75px; width: 100px;">
                <span style="
    position: relative;
    left: -21px;
    top: 24px;
">Please Wait, Processing...</span>
            </div>

        </div>
    </div>

<?php include 'common_footer.php'; ?>
