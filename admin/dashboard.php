<!DOCTYPE html>
<?php
require 'validator.php';
require_once 'conn.php';
$connect = mysqli_connect("localhost", "root", "", "db_sfms");
$sql = "SELECT * FROM student";
$result = mysqli_query($connect, $sql);
?>
<html lang="en">

<head>
    <title>Admin Dashboard</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />

</head>

<body>
    <nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
        <div class="container-fluid">
            <label class="navbar-brand">Student Document File System</label>
            <?php
            $query = mysqli_query($conn, "SELECT * FROM `user` WHERE `user_id` = '$_SESSION[user]'") or die(mysqli_error());
            $fetch = mysqli_fetch_array($query);
            ?>
            <input type="text" hidden id="userName" value=" <?php
                                                            echo $fetch['firstname'] . " " . $fetch['lastname'];
                                                            ?>">
            <ul class="nav navbar-right">
                <li class="dropdown">
                    <a class="user dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="glyphicon glyphicon-user"></span>
                        <?php
                        echo $fetch['firstname'] . " " . $fetch['lastname'];
                        ?>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <?php include 'sidebar.php' ?>
    <div id="content">
        <br /><br /><br />
        <?php
        $query_getNoActiveStudent = "SELECT COUNT(status) as total
            FROM `student`
            WHERE status = 'Active'";
        $result = mysqli_query($conn,  $query_getNoActiveStudent);
        $activeData = mysqli_fetch_assoc($result);
        $_SESSION['activeData'] =  $activeData['total'];

        ?>

        <?php
        $query_getNoInActiveStudent = "SELECT COUNT(status) as total
            FROM `student`
            WHERE status = 'Inactive'";
        $result = mysqli_query($conn,  $query_getNoInActiveStudent);
        $inActiveData = mysqli_fetch_assoc($result);
        $_SESSION['inActiveData'] =  $inActiveData['total'];
        ?>

        <?php
        $query_getNoGradauateStudent = "SELECT COUNT(status) as total
            FROM `student`
            WHERE status = 'Graduate'";
        $result = mysqli_query($conn,  $query_getNoGradauateStudent);
        $graduateData = mysqli_fetch_assoc($result);
        $_SESSION['graduateData'] =  $graduateData['total'];
        ?>
        <div class="alert alert-info">
            <h3>Dashboard</h3>
        </div>
        <div>
            <table class="table table-bordered">
                <tr>
                    <th>
                        <center>Number of Active Student's</center>
                    </th>
                    <th>
                        <center>Number of Inactive Student's</center>
                    </th>
                    <th>
                        <center>Number of Graduate Student's </center>
                    </th>
                </tr>
                <tr>

                    <td>
                        <center><?php echo $_SESSION['activeData'] ?></center>
                    </td>
                    <td>
                        <center><?php echo $_SESSION['inActiveData'] ?></center>
                    </td>
                    <td>
                        <center><?php echo $_SESSION['graduateData'] ?></center>
                    </td>
                </tr>
                <tr>
                </tr>
            </table>
        </div>
        <div>

            <div>
                <label for="studstatus">Status of Student</label>
                <select id="studstatus">
                    <option value="" selected>Select Status</option>
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                    <option value="Graduate">Graduate</option>
                </select>
                <button class="btn btn-primary" id="checker">Check Student Status</button>
            </div>
            <br>
            <div>
                <label for="studcabinet">Cabinet of Student</label>
                <select id="studcabinet">
                    <option value="" selected>Select Cabinet</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <button class="btn btn-primary" id="checkerCab">Check Student Cabinet</button>
            </div>




            <br /><br />
            <form action="generate_excel.php" method="post" id="export-form">
                <input type="hidden" value="" id="hidden-type" name="ExportType" />
            </form>

            <table id="studtable" border="1" cellpadding="3" class="table table-bordered">
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
                <?php
                while ($row = mysqli_fetch_array($result)) {
                    echo '  
                    <tr>  
                        <td>' . $row["stud_no"] . '</td>  
                        <td>' . $row["firstname"] . '</td>  
                        <td>' . $row["lastname"] . '</td>  
                        <td>' . $row["gender"] . '</td>  
                        <td>' . $row["department"] . '</td>
                        <td>' . $row["course"] . '</td>
                        <td>' . $row["major"] . '</td>
                        <td>' . $row["year"] . '</td>
                        <td>' . $row["status"] . '</td>
                        <td>' . $row["cabinet"] . '</td>
                    </tr>  
                        ';
                }
                ?>
            </table>
            <br />
            <div class="form-group">
                <form method="post" action="export.php">
                    <input type="submit" name="export" class="btn btn-success" value="Export" />
                </form>
            </div>
            <div class="form-group">
                <input type="submit" name="print" id="print" class="btn btn-primary btn-md" value="Print" />
            </div>
        </div>
    </div>



    <?php include 'script.php' ?>
    <script type="text/javascript">
        $(document).ready(function() {

            $('.btn-delete').on('click', function() {
                var stud_id = $(this).attr('id');
                $("#modal_confirm").modal('show');
                $('#btn_yes').attr('name', stud_id);
            });
            $('#btn_yes').on('click', function() {
                var id = $(this).attr('name');
                $.ajax({
                    type: "POST",
                    url: "delete_student.php",
                    data: {
                        stud_id: id
                    },
                    success: function() {
                        $("#modal_confirm").modal('hide');
                        $(".del_student" + id).empty();
                        $(".del_student" + id).html("<td colspan='6'><center class='text-danger'>Deleting...</center></td>");
                        setTimeout(function() {
                            $(".del_student" + id).fadeOut('slow');
                        }, 1000);
                    }
                });
            });

            $("#checker").on('click', function() {
                var studstatus = $('#studstatus').val();
                console.log(studstatus)
                $.ajax({
                    type: "POST",
                    url: "../admin/statusofstudent.php",
                    data: {
                        studstatus: studstatus
                    },
                    success: function(response) {
                        if (response) {
                            document.getElementById("studtable").innerHTML = response;
                        }
                    }
                });
            })



            $("#checkerCab").on('click', function() {
                var studcab = $('#studcabinet').val();
                var studstatus = $('#studstatus').val();

                if (studcab != "" && studstatus == "") {
                    $.ajax({
                        type: "POST",
                        url: "../admin/getstudcabinet.php",
                        data: {
                            studcab: studcab,
                            studstatus: studstatus
                        },
                        success: function(response) {
                            if (response) {
                                document.getElementById("studtable").innerHTML = response;
                            } else(
                                alert(response)
                            )
                        }
                    });
                } else if (studcab != "" && studstatus != "") {
                    $.ajax({
                        type: "POST",
                        url: "../admin/getcabbystatus.php",
                        data: {
                            studcab: studcab,
                            studstatus: studstatus
                        },
                        success: function(response) {
                            if (response) {
                                document.getElementById("studtable").innerHTML = response;
                            } else(
                                alert(response)
                            )
                        }
                    });
                }


            })

            function printData(userName) {
                var divToPrint = document.getElementById("studtable");

                var currentdate = new Date();
                var datetime = "Date: " + currentdate.getDate() + "/" +
                    (currentdate.getMonth() + 1) + "/" +
                    currentdate.getFullYear() + " Time:  " +
                    currentdate.getHours() + ":" +
                    currentdate.getMinutes() + ":" +
                    currentdate.getSeconds();

                newWin = window.open("Print Student Information");
                newWin.document.write("<h5>" + datetime + " </h5>" + "<br>" + "<h6>Printed By:" + userName + "</h6>" + "<center> <h1> Student Information </h1> </center>" + "<center>" + divToPrint.outerHTML + "</center>");
                newWin.print();
                newWin.close();
            }

            $('#print').on('click', function() {
                var userName = $("#userName").val();
                printData(userName);
            })
        });
    </script>
</body>

</html>