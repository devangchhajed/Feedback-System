
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>


<?php include 'common_header.php'; ?>
<?php include 'navbar.php'; ?>


<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form

    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);

    $result = $db->loginUser($username,$password);

    // If result matched $myusername and $mypassword, table row must be 1 row

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $_SESSION['loggedin'] = true;
            $_SESSION['login_user'] = $username;
            $_SESSION['user_type'] = $row['usertype'];
            $_SESSION['user_name'] = $row['name'];
            $_SESSION['user_uuid'] = $row['uid'];
        }
        echo "<script>window.location='home.php';</script>";

        }else {
        echo "<script>alert('Invalid Username and password.');</script>";
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>



<div class="container-fluid bg-1 text-center">
    <div class="box center">
        <img src ="./img/bhavans_logo.png" style="">
        <blockquote style="border:0px;"><h1>SPIT Feedback System</h1></blockquote>
        <hr>
        <form action ="<?php echo test_input($_SERVER["PHP_SELF"]);?>" method = "post" onsubmit="return validation()">
            <div class="input-group">
                <span class="input-group-addon signupbox"><i class="glyphicon glyphicon-user"></i></span>
                <input id="email" type="text" class="form-control input-sm" name="username" placeholder="Email" required>
            </div>
            </br>
            <div class="input-group">
                <span class="input-group-addon signupbox"><i class="glyphicon glyphicon-lock"></i></span>
                <input id="password" type="password" class="form-control input-sm" name="password" placeholder="Password">
            </div>
            <br>
            <input class="btn btn-primary" type="submit" value="Login"/>
        </form>
    </div>
</div>


<script>
    function validation(){
        var uid = document.getElementById("email").value;
        if (uid.length > 10){
            alert("Provide full UID");
            return false;
        }
        return true;
    }
</script>
<?php include 'common_footer.php'; ?>
