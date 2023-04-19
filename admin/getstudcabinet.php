<?php
require_once 'conn.php';
if (isset($_POST['studcab'])) {
    $stud_cab = $_POST['studcab'];
    $query = "SELECT * FROM `student` WHERE cabinet = '$stud_cab'";
    $result = mysqli_query($conn,  $query);

    if (mysqli_num_rows($result) > 0) {
        echo '<table id="table" class="table table-bordered">';
        echo  '<thead>';
        echo   '<tr>';
        echo   '<th>Stud_id</th>';
        echo         '<th>Stud No.</th>';
        echo        ' <th>Firstname</th>';
        echo         '<th>Lastname</th>';
        echo         '<th>Gender</th>';
        echo         '<th>College Department</th>';
        echo         '<th>Course</th>';
        echo         '<th>Major</th>';
        echo      '   <th>Year & Section</th>';
        echo        '<th>Status</th>';
        echo      '  <th>Cabinet</th>';
        echo '       </tr>';
        echo   '</thead>';
        echo   '<tbody>';
        while ($row = mysqli_fetch_assoc($result)) {

            echo "<td>" . $row["stud_id"] . "</td>";
            echo "<td>" . $row['stud_no'] . "</td>";
            echo "<td>" .  $row['firstname'] . "</td>";
            echo "<td>" .  $row['lastname'] . "</td>";
            echo "<td>" . $row['gender'] . "</td>";
            echo "<td>" . $row['department'] . "</td>";
            echo "<td>" . $row['course'] . "</td>";
            echo "<td>" . $row['major'] . "</td>";
            echo "<td>" . $row['year'] . "</td>";
            echo "<td>" .   $row['status'] . "</td>";
            echo "<td>" .   $row['cabinet'] . "</td>";
            echo '</table>';
        }
        mysqli_free_result($result);
    } else {
        echo " <h1> Select Student Status </h1>";
    }
}
