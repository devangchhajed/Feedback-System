<?php include 'common_header.php'; ?>
<?php include 'navbar.php'; ?>


<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form

    if(isset($_POST['threshold']))
    {
        $val = $_POST['threshold'];

        $result = $db->setThreshold($val);

        if ($result)
            echo "<script>alert('Value Updated.')</script>";

    }
}
?>



    <div class="container center">
			<div class="box center">
				<img src ="./img/bhavans_logo.png" style="">

				<blockquote style="border:0px;"><h1>SPIT Feedback System</h1></blockquote>
				<hr>

                <?php

                    $result = $db->getThreshold();

                ?>
                <form action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post">
                    This is the minimun thresh hold limit definition.
                    <input id="thresholdbox" type="text" class="form-control input-sm" name="threshold" placeholder="Threshold Limit" value="<?php echo $result; ?>">
                    <br>
                    <input class="btn btn-primary" type="submit" value="Update" />
                </form>
			</div>
		</div>

<?php include 'common_footer.php'; ?>