<?php include 'common_header.php'; ?>
<?php include 'navbar.php'; ?>


<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form

    $password = $_POST['password'];

    $result = $db->changePassword($_SESSION['user_uuid'],$password);

    // If result matched $myusername and $mypassword, table row must be 1 row

    if ($result) {
			echo "<script>alert('Password Changed');</script>";
        }else {
        echo "<script>alert('Error Occured.');</script>";
    }
}
?>



		<div class="container center">
			<div class="box center">
				<img src ="./img/bhavans_logo.png" style="">

				<blockquote style="border:0px;"><h1>SPIT Feedback System</h1></blockquote>
				<hr>
                <form action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post">
                    <div class="input-group">
                        <span class="input-group-addon signupbox"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="password" type="password" class="form-control input-sm" name="password" placeholder="New Password">
                    </div>
                    </br>
                    <div class="input-group">
                        <span class="input-group-addon signupbox"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="password2" type="password" class="form-control input-sm" name="password2" placeholder="Retype Password">
                    </div>
                    <br>
                    <input class="btn btn-primary" type="submit" value="Change Password" />
                </form>
			</div>
		</div>

<?php include 'common_footer.php'; ?>
