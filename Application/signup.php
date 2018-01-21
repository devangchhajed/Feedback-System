<?php include 'common_header.php'; ?>
<?php include 'navbar.php'; ?>


<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form

    $usertype = test_input($_POST['utype']);
    $loginid = test_input($_POST['uid']);
    $password = test_input($_POST['password']);
    $name = test_input($_POST['name']);
    $dob = test_input($_POST['dob']);
    $email = test_input($_POST['email']);
    $phone = test_input($_POST['number']);


    $result = $db->storeUser($usertype, $loginid, $password, $name, $dob, $email, $phone);

    // If result matched $myusername and $mypassword, table row must be 1 row
    if ($result) {

      echo "<script>alert('User Created Now you Can Login');</script>";

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
				<form action ="<?php echo test_input($_SERVER["PHP_SELF"]);?>" method = "post">
					<div class="signupformelements">
						<div class="input-group">
							<span class="input-group-addon signupbox" style="border:0px; border-radius:0 px;">Name</span>
							<input id="text" type="text" class="form-control" name="name" placeholder="Name" style="border:0px; border-radius:0px;">
						</div>
						<div class="input-group">
							<span class="input-group-addon signupbox" style="border:0px; border-radius:0 px;">Password</span>
							<input id="password" type="password" class="form-control" name="password"  style="border:0px; border-radius:0px;" placeholder="Password">
						</div>
            <div class="input-group">
							<span class="input-group-addon signupbox" style="border:0px; border-radius:0 px;">UID</span>
							<input id="text" type="text" class="form-control" name="uid" placeholder="2017450020" style="border:0px; border-radius:0px;">
						</div>
						<div class="input-group">
							<span class="input-group-addon signupbox" style="border:0px; border-radius:0 px;">D.O.B.</span>
							<input id="dob" type="date" class="form-control" name="dob"  style="border:0px; border-radius:0px;" placeholder="1996-01-10">
						</div>
						<div class="input-group">
							<span class="input-group-addon signupbox" style="border:0px; border-radius:0 px;">Email</span>
							<input id="email" type="text" class="form-control" name="email" placeholder="abc@xyz.com" style="border:0px; border-radius:0px;">
						</div>
						<div class="input-group">
							<span class="input-group-addon signupbox" style="border:0px; border-radius:0 px;">Phone</span>
							<input id="number" type="text" class="form-control" name="number" placeholder="9876543210" style="border:0px; border-radius:0px;">
						</div>
						<div class="input-group">
							<span class="input-group-addon signupbox" style="border:0px; border-radius:0 px;">User Type</span>
							<select id="utype" class="form-control" name="utype" style="border:0px; border-radius:0px;">
								<option value="student">Student</option>
								<option value="faculty">Faculty</option>
							</select>
						</div>

					</div>
					<br>
					<input class="btn btn-primary" type="submit" value="SignUp" />
				</form>
			</div>
		</div>

<?php include 'common_footer.php'; ?>
