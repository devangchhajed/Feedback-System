<?php include 'common_header.php'; ?>
<?php include 'navbar.php'; ?>

<?php
    $res = $db->createFeedbackForm($_SESSION['user_uuid']);
if($res == true)
        echo '<script>window.location="home.php"</script>';

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
">Please Wait, Creating new form...</span>
            </div>

        </div>
    </div>

<?php include 'common_footer.php'; ?>
