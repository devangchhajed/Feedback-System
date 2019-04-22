<?php include 'common_header.php'; ?>
<?php include 'navbar.php'; ?>
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
<?php


if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form

    $formid = test_input($_POST['formuid']);

    $result = $db->getAllFeedback($formid);
    $result2 = $db->getFeedbackFormQuestion($formid);
    if (($result->num_rows / $result2->num_rows )<= $db->getThreshold()) {
        echo "<script>alert('Under ThreshHold Limit'); window.location='home.php';</script>";
    }


    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>


    <div class="container-fluid bg-1 text-center">
        <div class="box center">
            <img src ="./img/bhavans_logo.png" style="">
            <blockquote style="border:0px;"><h1>SPIT Feedback System</h1></blockquote>
            <hr>

            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#record">View Records</a></li>
                <li><a data-toggle="tab" href="#dataanalysis">Analysis</a></li>
                <li><a data-toggle="tab" href="#sturev">Students Not Reviewed</a></li>
            </ul>
            <div class="tab-content">
                <div id="record" class="tab-pane fade in active">
                    <?php
                    if ($result->num_rows > 0) {
                    ?>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Question</th>
                            <th>Type</th>
                            <th>Answer</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i=1;
                        while ($row = $result->fetch_assoc()) {
                            echo'<tr>
                                        <td>'.$i.'</td>
                                        <td>'.$row['question'].'</td>
                                        <td>'.$row['type'].'</td>
                                        <td>'.$row['answer'].'</td>
                                    </tr>';
                            $i++;

                        }

                        }

                        ?>
                        </tbody>
                    </table>
                </div>
                <div id="dataanalysis" class="tab-pane fade text-center">
                    <table class="table table-striped">
                        <?php

                        $result = $db->getFeedbackFormQuestion($formid);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()){
                                if($row['type']=="rating")
                                {
                                    echo '<tr><td>';
                                    echo '<b><h2>'.$row['question'].'</h2></b>';
                                    echo ' <div id="plotly'.$row['uid'].'"></div>';
                                    ?>
                                    <script>
                                        var data = [{
                                            values: <?php echo $db->getQuestionStats($row['uid']); ?>,
                                            title:'<?php echo $row['question']; ?>',
                                            labels: ['Very Poor', 'Poor', 'Average', 'Good', 'Very Good'],
                                            type: 'pie'
                                        }];

                                        Plotly.newPlot('<?php echo 'plotly'.$row['uid']; ?>', data, {}, {showSendToCloud:true});
                                    </script>
                                    <?php

                                    echo '</td></tr>';

                                }else{
                                    echo '<tr><td>';
                                    echo '<b><h2>'.$row['question'].'</h2></b>';

                                    ?>

                                    <table class="table table-striped">


                                <?php
                                    $res = $db->getQuesFeedback($row['uid']);
                                    while ($frow = $res->fetch_assoc()) {
                                        echo'<tr>
                                        <td>'.$frow['answer'].'</td>
                                    </tr>';

                                    }

                                    echo '</table>';
                                echo '</td></tr>';

                                }
                            }
                        }
                        ?>
                    </table>
                </div>
                <div id="sturev" class="tab-pane fade text-center">
                    <table class="table table-striped">
                        <?php

                        $result = $db->studentsUidLeftForFeedback($formid);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()){
                                echo '<tr><td>';
                                $result1 = $db->getStudentNameFormLoginid($row['user_uid']);
                                if ($result1)
                                    echo $result1;
                                else
                                    echo $row['user_uid'];




                                echo '</td></tr>';
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php include 'common_footer.php'; ?>
