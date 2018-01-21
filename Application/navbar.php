	<body>
    <?php
        include("./include/DB_Functions.php");
        session_start();
        $db = new DB_Functions();

    ?>
	<nav class="navbar navbar-default navbar-fixed-bottom" style="background-color: rgba(255,255,255,0.8);">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>                        
				</button>
				<a class="navbar-brand" href="#">SPIT</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
					<li><a href="<?php
                            if(isset($_SESSION['loggedin']))
                                echo 'home.php';
                            else
                                echo "index.php";
                        ?>">Home</a></li>
<!--					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">Page 1-1</a></li>
							<li><a href="#">Page 1-2</a></li>
							<li><a href="#">Page 1-3</a></li>
						</ul>
					</li>
-->
					<li><a href="./about.php">About</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
                    <?php
                        if(isset($_SESSION['loggedin'])){
                            echo'<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;'.$_SESSION['user_name'].' ('.$_SESSION['user_type'].')'.'<span class="caret"></span></a>
						            <ul class="dropdown-menu">
                                        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp;LogOut</a></li>
            				            <li><a href="changepassword.php"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;Change Password</a></li>
            						</ul>
				            	</li>';
                            

                        }else{
                            echo '<li><a href="signup.php"><span class="glyphicon glyphicon-user"></span>Sign Up</a></li>
					                <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span>&nbsp;Login</a></li>';
                        }
                    ?>
				</ul>
			</div>
		</div>
	</nav>
