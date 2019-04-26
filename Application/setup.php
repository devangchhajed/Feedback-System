<?php include 'common_header.php';

if( file_exists("./include/config.php"))
{
    echo "<script>window.location='index.php'</script>";
}


if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form

    $dhost = $_POST['dhost'];
    $dname = $_POST['dname'];
    $duser = $_POST['duname'];
    $dpass = $_POST['dpass'];
    $hodid = $_POST['hodid'];
    $hodpass = $_POST['hodpass'];
    $hodname = $_POST['hodname'];


    $config_content = "<?php " . '$servername' . " = '" . $dhost . "';    " . '$username' . " = '" . $duser . "';    " . '$password' . " = '" . $dpass . "';    " . '$dbname' . " = '" . $dname . "'; ?>";
    $file = fopen("./include/config.php", "w") or die("Error Occured.");
    fwrite($file, $config_content);
    fclose($file);


// Create connection
    $conn = new mysqli($dhost, $duser, $dpass);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $query="DROP DATABASE IF EXIST ".$dname;
    $conn->query($query);

    $query="CREATE DATABASE ".$dname;
    $conn->query($query);


    $query = "USE ".$dname;
    $conn->query($query);

    $conn->close();

    $conn = new mysqli($dhost, $duser, $dpass, $dname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

$query = array();

    $query[0]="CREATE TABLE user(
  uid INT(10) NOT NULL AUTO_INCREMENT, 
  usertype VARCHAR(10) NOT NULL DEFAULT \"student\",
  loginid VARCHAR(45) NOT NULL,
  password VARCHAR(45) NOT NULL DEFAULT \"0\",
  name VARCHAR(30) NOT NULL,
  dob DATE NOT NULL,
  email VARCHAR(50) NULL DEFAULT NULL,
  phone VARCHAR(15) NULL DEFAULT NULL,
  create_time TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  usercol VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (uid))";


    $query[1]="CREATE TABLE IF NOT EXISTS feedback_form (
  uid INT(10) NOT NULL AUTO_INCREMENT,
  createdby INT(10) NOT NULL,
  title TEXT NULL DEFAULT NULL,
  year TEXT NULL DEFAULT NULL,
  coursecode TEXT NULL DEFAULT NULL,
  semester TEXT NULL DEFAULT NULL,
  class TEXT NULL DEFAULT NULL,  
  extrainfo TEXT NULL DEFAULT NULL,  
  fromrange VARCHAR(45) NULL DEFAULT NULL,
  torange VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (uid))";

        $query[2]="
CREATE TABLE IF NOT EXISTS assignment (
  uid INT(11) NOT NULL AUTO_INCREMENT,
  user_uid INT(10) NOT NULL,
  feedback_form_uid INT(10) NOT NULL,
  status TINYINT(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (uid))";

        $query[3]="CREATE TABLE IF NOT EXISTS feedback_questions (
  uid INT(10) NOT NULL AUTO_INCREMENT,
  user_uid INT(10) NOT NULL,
  feedback_form INT(10) NOT NULL,
  question TEXT NULL DEFAULT NULL,
  type VARCHAR(10) NULL DEFAULT NULL,
  PRIMARY KEY (uid))";

        $query[4]="CREATE TABLE IF NOT EXISTS feedback_record (
  uid INT(10) NOT NULL AUTO_INCREMENT,
  feedback_questions_uid INT(10) NOT NULL,
  feedback_form_uid INT(10) NOT NULL,
  answer TEXT NULL DEFAULT NULL,
  PRIMARY KEY (uid))";


        $query[5]="CREATE TABLE IF NOT EXISTS preferences ( name TEXT NOT NULL, value TEXT NOT NULL)";


        $query[6]="INSERT INTO user (uid, usertype, loginid, password, name, dob, email, phone, create_time, usercol) VALUES 
(NULL, 'hod', '".$hodid."', '".$hodpass."', '".$hodname."', '1996-01-01', 'hod@spit.ac.in', '0123456789', CURRENT_TIMESTAMP, NULL)";

    $query[7]="INSERT INTO preferences (name, value) VALUES ('threshold', '5');";

        foreach ($query as $q){
            $conn->query($q);
        }

        echo "<script>alert('Installation Complete'); window.location='index.php';</script>";
}

?>



		<div class="container center">
			<div class="box center">
				<img src ="./img/bhavans_logo.png" style="">

				<blockquote style="border:0px;"><h1>SPIT Feedback System</h1></blockquote>
				<hr>
                <form action ="<?php echo $_SERVER["PHP_SELF"];?>" method = "post">
                    <div class="signupformelements">
                        <div class="input-group">
                            <span class="input-group-addon signupbox" style="border:0px; border-radius:0 px;">Database Host</span>
                            <input id="text" type="text" class="form-control" name="dhost" placeholder="localhost" style="border:0px; border-radius:0px;">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon signupbox" style="border:0px; border-radius:0 px;">Database Name</span>
                            <input id="text" type="text" class="form-control" name="dname" placeholder="feedbacksystem" style="border:0px; border-radius:0px;">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon signupbox" style="border:0px; border-radius:0 px;">Database Username</span>
                            <input id="text" type="text" class="form-control" name="duname" placeholder="root" style="border:0px; border-radius:0px;">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon signupbox" style="border:0px; border-radius:0 px;">Database Password</span>
                            <input id="text" type="text" class="form-control" name="dpass" placeholder="password" style="border:0px; border-radius:0px;">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon signupbox" style="border:0px; border-radius:0 px;">HOD UID</span>
                            <input id="text" type="text" class="form-control" name="hodid" placeholder="123" style="border:0px; border-radius:0px;">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon signupbox" style="border:0px; border-radius:0 px;">HOD Password</span>
                            <input id="text" type="text" class="form-control" name="hodpass" placeholder="password" style="border:0px; border-radius:0px;">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon signupbox" style="border:0px; border-radius:0 px;">HOD NAME</span>
                            <input id="text" type="text" class="form-control" name="hodname" placeholder="123" style="border:0px; border-radius:0px;">
                        </div>

                    </div>
                    <br>
                    <input class="btn btn-primary" type="submit" value="Install" />
                </form>
			</div>
		</div>

<?php include 'common_footer.php'; ?>