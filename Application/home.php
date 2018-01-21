<?php include 'common_header.php'; ?>
<?php include 'navbar.php'; ?>

		<div class="container center">
			<div class="box center">
				<img src ="./img/bhavans_logo.png" style="">

				<blockquote style="border:0px;"><h1>SPIT Feedback System</h1></blockquote>
				<hr>
				<?php
                if($_SESSION['user_type']=="hod")
                    include 'hodspace.php';
                if($_SESSION['user_type']=="faculty")
                    include 'teacherscorner.php';
                if($_SESSION['user_type']=="student")
                    include 'studentcorner.php';
                ?>
			</div>
		</div>

<?php include 'common_footer.php'; ?>
