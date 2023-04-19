<!DOCTYPE html>
<html lang="en">

<head>
    <title>Student Login</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="admin/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="admin/css/style.css" />
</head>

<body style="background-image: url('img/earist.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center; ">
    <nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
        <div class="container-fluid">
            <label class="navbar-brand">Student Document File System</label>
        </div>
    </nav>
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <div class="panel panel-default" id="panel-margin">
            <div class="panel-heading">
                <center>
                    <h1 class="panel-title"><b>Login</b></h1>
                </center>
            </div>
            <div class="panel-body">
                <div class="col-lg-6">
                    <div>
                        <center>
                            <h4><b>Admin</b></h4>
                            <button class="btn btn-online-primary"  onclick="toAdminForm()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="currentColor" class="bi bi-person-workspace" viewBox="0 0 16 16">
                                    <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H4Zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                                    <path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2H2Z" />
                                </svg>
                            </button>
                        </center>
                    </div>
                </div>
                <div class="col-lg-6">
                    <center>
                        <h4><b>Student</b></h4>
                        <button class="btn btn-online-primary" onclick="toStudentForm()">
                            <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z" />
                            </svg>
                        </button>
                    </center>
                </div>
            </div>
        </div>
    </div>
    
</body>

<script>

    function toStudentForm(){
        window.location.href = "./index.php"
    }
    function toAdminForm(){
        window.location.href = "admin/index.php"
    }

</script>

</html>