<!DOCTYPE html>
<?php
require 'validator.php';
require_once 'conn.php';
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
        <div>
            <div class="alert alert-info" style="margin-top:100px;"><b>Student File List</b></div>
            <div class="panel panel-default">
                <div class="panel-body alert-success">

                    <table id="table" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Filename</th>
                                <th>File Type</th>
                                <th>Date Uploaded</th>
                                <th>Stud No:</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query1 = mysqli_query($conn, "SELECT * FROM `storage`") or die(mysqli_error());
                            while ($fetch1 = mysqli_fetch_array($query1)) {
                            ?>
                                <tr class="del_file<?php echo $fetch1['store_id'] ?>">
                                    <td><?php echo substr($fetch1['filename'], 0, 30) . "..." ?></td>
                                    <td><?php echo $fetch1['file_type'] ?></td>
                                    <td><?php echo $fetch1['date_uploaded'] ?></td>
                                    <td><?php echo $fetch1['stud_no'] ?></td>
                                    <td><a href="../download.php?store_id=<?php echo $fetch1['store_id'] ?>" class="btn btn-success"><span class="glyphicon glyphicon-download"></span> Download</a> | <button class="btn btn-danger btn_remove" type="button" id="<?php echo $fetch1['store_id'] ?>"><span class="glyphicon glyphicon-trash"></span> Remove</button></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    </tbody>
    </table>

    <div class="modal fade" id="modal_confirm" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">System</h3>
                </div>
                <div class="modal-body">
                    <center>
                        <h4 class="text-danger">Are you sure you want to logout?</h4>
                    </center>
                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-success" data-dismiss="modal">Cancel</a>
                    <a href="logout.php" class="btn btn-danger">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_remove" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">System</h3>
                </div>
                <div class="modal-body">
                    <center>
                        <h4 class="text-danger">Are you sure you want to remove this file?</h4>
                    </center>
                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-success" data-dismiss="modal">No</a>
                    <button  class="btn btn-danger" id="btn_yes">Yes</button>
                </div>
            </div>
        </div>
    </div>
    </div>



    <?php include 'script.php' ?>
    <script type="text/javascript">
        $('.btn_remove').on('click', function() {
            var store_id = $(this).attr('id');
            $("#modal_remove").modal('show');
            $("#btn_yes").attr('name', store_id);
        });

        $('#btn_yes').on('click', function() {
            var id = $(this).attr('name');
            $.ajax({
                type: "POST",
                url: "remove_file.php",
                data: {
                    store_id: id
                },
                success: function(data) {
                    $("#modal_remove").modal('hide');
                    $(".del_file" + id).empty();
                    $(".del_file" + id).html("<td colspan='4'><center class='text-danger'>Deleting...</center></td>");
                    setTimeout(function() {
                        $(".del_file" + id).fadeOut('slow');
                    }, 1000);

                }
            });
        });
    </script>
</body>

</html>