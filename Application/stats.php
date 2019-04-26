<?php include 'common_header.php'; ?>
<?php include 'navbar.php'; ?>

<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
<?php

if(!isset($_SESSION['user_type']) or $_SESSION['user_type']=='student')
    echo '<script>window.location="index.php"</script>';


if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form

    $formid = test_input($_POST['formuid']);



    $result = $db->getFeedbackForm($formid);

    // If result matched $myusername and $mypassword, table row must be 1 row
    $formcreator="";
    $form_title="";
    $form_year="";
    $form_class="";
    $form_coursecode="";
    $form_semester="";
    $form_extrainfo="";
    $fromrange="";
    $torange="";
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $formcreator = $row['createdby'];
            $form_title=$row['title'];
            $fromrange=$row['fromrange'];
            $torange=$row['torange'];
            $form_year=$row['year'];
            $form_class=$row['class'];
            $form_coursecode=$row['coursecode'];
            $form_semester=$row['semester'];
            $form_extrainfo=$row['extrainfo'];
        }
    }



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
            <blockquote style="border:0px;"><h1><?php echo $form_title;?></h1>
                <?php echo $form_coursecode."<br>".$form_year." - ".$form_class." - Semester ".$form_semester."<br>".$db->getStudentNameFormUid($formcreator)."<br>".$form_extrainfo; ?>
            </blockquote>
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
                    <button class="btn btn-primary" id="printButton" onclick="printB()">Print</button>
                    <div id="printDiv">
                        <table class="table table-striped" border="1px solid black">
                            <?php

                            $result = $db->getFeedbackFormQuestion($formid);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()){
                                    if($row['type']=="rating")
                                    {
                                        echo '<tr><td>';
                                        echo '<b><h2>'.$row['question'].'</h2></b>';
                                        echo ' <div id="plotly'.$row['uid'].'" style="overflow: hidden;"></div>';
                                        ?>
                                        <script>
                                            var data = [{
                                                values: <?php echo $db->getQuestionStats($row['uid']); ?>,
                                                labels: ['Very Poor', 'Poor', 'Average', 'Good', 'Very Good'],
                                                type: 'pie',
                                                textinfo:'label+text+value+percent'

                                            }];

                                            var layout={
                                                textinfo:'none',
                                                displayModeBar: 'False'
                                            }

                                            Plotly.newPlot('<?php echo 'plotly'.$row['uid']; ?>', data, layout, {showSendToCloud:true});
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

    <script>
            function printB() {

                var content = document.getElementById("printDiv").innerHTML;
                var mywindow = window.open('', '', 'height=600,width=800');

                var head = '            <table><tr><td><img src ="./img/bhavans_logo.png" style=""></td><td><h3>BhartiyaVidya Bhavans</h3><h1>Sardar Patel Institute of technology</h1></td></table>\n' +
                    '                    <hr><h2>Feedback Report</h2><h1><?php echo $form_title;?></h1>\n' +
                    '                    <?php echo $form_coursecode . "<br>" . $form_year . " - " . $form_class . " - Semester " . $form_semester ."<br>Faculty : ".$db->getStudentNameFormUid($formcreator)."<br>". $form_extrainfo; ?>\n' +
                    '                    <p>\n';

                mywindow.document.write('<html><head><title><?php echo $form_coursecode . " - " . $form_year . " - " . $form_class . " - Semester " . $form_semester ." - Faculty : ".$db->getStudentNameFormUid($formcreator)." - ". $form_extrainfo; ?></title>');
                mywindow.document.write('</head><body><center><h1>'+head+'</h1></center>');
                mywindow.document.write(content);
                mywindow.document.write('</body></html>');

                mywindow.document.close();
                mywindow.focus();
                mywindow.print();
                //mywindow.close();




            }

    </script>

<?php include 'common_footer.php'; ?>
