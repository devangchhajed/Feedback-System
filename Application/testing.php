<?php include 'common_header.php'; ?>
<?php include 'navbar.php'; ?>


    <div class="container-fluid bg-1 text-center">
			<div class="box center">
				<img src ="./img/bhavans_logo.png" style="">
				<blockquote style="border:0px;"><h1>SPIT Feedback System</h1></blockquote>
				<hr>
                <?php
                    $result = $db->getFormQuestion(3);

                    echo json_encode($result->num_rows);
                ?>
			</div>
		</div>
	
<?php include 'common_footer.php'; ?>