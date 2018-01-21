<?php include 'common_header.php'; ?>
<?php include 'navbar.php'; ?>

<div class="container center">
    <div class="box center">
        <img src ="./img/bhavans_logo.png" style="">

        <?php

    if($_SESSION['user_type']!='hod')
    {
        echo '<script>window.location="home.php"</script>';
    }

?>

<div class="boxbody">
    <h2>HOD SPACE</h2>
    <hr>

    <?php

    $result = $db->getAllForm($_SESSION['user_uuid']);

    if ($result->num_rows > 0) {
        echo"<table class='table table-striped'>     <thead> <tr>
        <th>FID</th>
        <th>Form Name</th>
        <th>Creator</th>
        <th colspan='2'>Function</th>
        <th>Status</th>
      </tr>
    </thead>";

        while ($row = $result->fetch_assoc()) {
            echo'<tr>
                    <td>'.$row['uid'].'</td>
                    <td>'.$row['title'].'</td>
                    <td>'.$db->getStudentNameFormUid($row['createdby']).'</td>'
            ;
            if($_SESSION['user_uuid']==$row['createdby']){
                echo '                    <td><form action ="editfeedbackform.php" method = "post">
                        <input type="hidden" name="formuid" value="'.$row['uid'].'">
                        <input class="btn btn-primary" type="submit" value="Edit Form" />
                    </form></td>
                    <td>
                        <form action ="processing.php" method = "post">
                            <input type="hidden" name="formuid" value="'.$row['uid'].'">
                            <input type="hidden" name="task" value="deleteform">
                            <input class="btn btn-primary" type="submit" value="Delete" />
                        </form>
                    </td>';}
            else
            {
                echo '                    <td><form>
                        <input class="btn btn-primary disabled" type="submit" value="Edit Form" />
                    </form></td>
                    <td>
                        <form>
                            <input class="btn btn-primary disabled" type="submit" value="Delete" />
                        </form>
                    </td>';
            }

            echo'                   <td>
                        <form action ="stats.php" method = "post">
                            <input type="hidden" name="formuid" value="'.$row['uid'].'">
                            <input class="btn btn-success" type="submit" value="View Stats" />
                        </form>                    
                    </td>
                    </tr>';
        }
        echo "</table>";
    }

    ?>
    <button class="btn btn-primary" onclick="window.location='addfeedbackform.php'">Add Feedback Form</button>
</div>
