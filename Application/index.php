<?php
if( !file_exists("./include/config.php"))
{
    echo "<script>window.location='setup.php'</script>";
}

include 'common_header.php'; ?>
<?php include 'navbar.php'; ?>

		<div class="container center">
			<div class="box center">
				<img src ="./img/bhavans_logo.png" style="">

				<blockquote style="border:0px;"><h1>SPIT Feedback System</h1></blockquote>
				<hr>
				Welcome to the SPIT Feedback Portal. All the feedback recorded are anonymous.</br>
				So students no need to worry about your identity getting revealed in any way.
				</br></br>
				<button class="btn btn-primary" onclick="location.href='login.php'">Let's get Started</button>
			</div>
		</div>

<?php include 'common_footer.php'; ?>