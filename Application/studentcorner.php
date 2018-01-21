<?php

$result = $db->getStudentForm($_SESSION['login_user']);

if ($result->num_rows > 0) {
    echo"<table class='table table-striped'>     <thead> <tr>
        <th>FID</th>
        <th>Form Name</th>
        <th></th>
      </tr>
    </thead>";
$i=1;
    while ($row = $result->fetch_assoc()) {
        echo'<tr>
                    <td>'.$i.'</td>
                    <td>'.$db->getFeedbackFormTitle($row['feedback_form_uid']).'</td>
                    ';

        if($db->getFeedbackStatus($_SESSION['login_user'], $row['feedback_form_uid']))
            echo '<td><button class="btn btn-primary disabled">Feedback recorded</button></td>';
        else
              echo '                    <td><form action ="givefeedback.php" method = "post">
                        <input type="hidden" name="formuid" value="'.$row['feedback_form_uid'].'">
                        <input class="btn btn-primary" type="submit" value="Give Feedback" style="width:100%;"/>
                    </form></td>';

echo'                    

                    </tr>';
    }
    echo "</table>";
}

?>
