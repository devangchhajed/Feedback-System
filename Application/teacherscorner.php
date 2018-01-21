<div class="boxbody">
    <h2>Teachers Space</h2>
    <hr>

        <?php

        $result = $db->getActiveForm($_SESSION['user_uuid']);

        if ($result->num_rows > 0) {
            echo"<table class='table table-striped'>     <thead> <tr>
        <th>FID</th>
        <th>Form Name</th>
        <th colspan='2'>Function</th>
        <th>Status</th>
      </tr>
    </thead>";

            while ($row = $result->fetch_assoc()) {
                echo'
                <tr>
                    <td>'.$row['uid'].'</td>
                    <td>'.$row['title'].'</td>
                    <td><form action ="editfeedbackform.php" method = "post">
                        <input type="hidden" name="formuid" value="'.$row['uid'].'">
                        <input class="btn btn-primary" type="submit" value="Edit Form" />
                    </form></td>
                    <td>
                        <form action ="processing.php" method = "post">
                            <input type="hidden" name="formuid" value="'.$row['uid'].'">
                            <input type="hidden" name="task" value="deleteform">
                            <input class="btn btn-primary" type="submit" value="Delete" />
                        </form>
                    </td>
                    <td>
                        <form action ="stats.php" method = "post">
                            <input type="hidden" name="formuid" value="'.$row['uid'].'">
                            <input class="btn btn-success" type="submit" value="View Stats" />
                        </form>
                    </td>
                    </tr>
                  ';
            }
            echo "</table>";
        }

    ?>
    <button class="btn btn-primary" onclick="window.location='addfeedbackform.php'">Add Feedback Form</button>
</div>
