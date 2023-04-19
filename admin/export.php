<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "", "db_sfms");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM student";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table table-bordered" bordered="1">  
        <tr>
            <th>stud_no</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Gender</th>
            <th>College Department</th>
            <th>Course</th>
            <th>Major</th>
            <th>Yr&Sec</th>
            <th>Status</th>
            <th>Cabinet</th>
        </tr>   
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
        <tr>  
            <td>'.$row["stud_no"].'</td>  
            <td>'.$row["firstname"].'</td>  
            <td>'.$row["lastname"].'</td>  
            <td>'.$row["gender"].'</td>  
            <td>'.$row["department"].'</td>
            <td>'.$row["course"].'</td>
            <td>'.$row["major"].'</td>
            <td>'.$row["year"].'</td>
            <td>'.$row["status"].'</td>
            <td>'.$row["cabinet"].'</td>
        </tr>  
   ';  

  }
  
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=student-list.xls');
  echo $output;
 }
}
?>
