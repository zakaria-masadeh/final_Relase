<!DOCTYPE html>
<?php session_start();
$con = new mysqli("localhost", "root", "", "gproject");
?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>

        <style>
            * {
                box-sizing: border-box;
            }

            .row {
                margin-left:-5px;
                margin-right:-5px;
            }

            .column {
                float: left;
                width: 50%;
                padding: 5px;
            }

            /* Clearfix (clear floats) */
            .row::after {
                content: "";
                clear: both;
                display: table;
            }

            table {
                border-collapse: collapse;
                border-spacing: 0;
                width: 100%;
                border: 1px solid #ddd;
            }

            th, td {
                text-align: left;
                padding: 16px;
            }

            tr:nth-child(even) {
                background-color: #f2f2f2;
            }



            #myInput {

                background-position: 10px 10px;
                background-repeat: no-repeat;
                width: 75%;
                font-size: 16px;
                padding: 12px 20px 12px 40px;
                border: 1px solid #ddd;
                margin-bottom: 12px;
            }
              #myInputBook {

                background-position: 10px 10px;
                background-repeat: no-repeat;
                width: 75%;
                font-size: 16px;
                padding: 12px 20px 12px 40px;
                border: 1px solid #ddd;
                margin-bottom: 12px;
            }

        </style>




    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <a class="navbar-brand" href="index.php">E-Library System Dashboard</a>

            <!-- Navbar Search-->

            <!-- Navbar-->
            <a class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0 btn btn-danger" href="login.php">Logout</a>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading"></div>
                            <a class="nav-link" href="">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading" style="color: aquamarine">Manage System</div>

                            <a class="nav-link" href="view_profile.php">View My profile</a>






                            <div class="sb-sidenav-menu-heading " style="color: aquamarine" >Manage Users</div>
                            <a class="nav-link" href="addUser.php">Add Users</a>
                            <a class="nav-link" href="viewUser.php">View All Users</a>








                            <div class="sb-sidenav-menu-heading " style="color: aquamarine" >Manage Periodicals</div>
                            <a class="nav-link" href="addperiadical.php">Add Periodicals</a>
                            <a class="nav-link" href="viewPeriodical.php">View All Issued Periodicals</a>




                            <div class="sb-sidenav-menu-heading " style="color: aquamarine">Manage Books</div>
                            <a class="nav-link" href="addBook.php">Add Books</a>
                            <a class="nav-link" href="viewbook.php">View All Issued Books</a>


                                   
                             <div class="sb-sidenav-menu-heading " style="color: aquamarine">Messenger</div>
                             <a class="nav-link" href="group_message.php">Create a group message</a>
                            <a class="nav-link" href="view_message.php">View all Messages</a>
                            
                            













                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as : Admin</div>

                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">

                                <?php
                                $st = $con->prepare("select id from user order by id");
                                $st->execute();
                                $rs = $st->get_result();
                                $usernumber = $rs->num_rows;
                                ?>

                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Number Of Users :  <?php echo $usernumber; ?> </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="viewUser.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">

<?php
$st = $con->prepare("select bookID from  book order by bookID");
$st->execute();
$rs = $st->get_result();
$booknumber = $rs->num_rows;
?>

                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Number Of Books : <?php echo $booknumber; ?> </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="viewbook.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">

<?php
$st = $con->prepare("select periodicalID from  periadical order by periodicalID");
$st->execute();
$rs = $st->get_result();
$periodicalnumber = $rs->num_rows;
?>


                                <div class="card bg-info text-white mb-4">
                                    <div class="card-body">Number Of Periodicals : <?php echo $periodicalnumber; ?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="viewPeriodical.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">

<?php
$st = $con->prepare("select borrowID from  bookborrow order by borrowID");
$st->execute();
$rs = $st->get_result();
$bookBorrrowNumber = $rs->num_rows;
?>



                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Number Of Borrowed Books :  <?php echo $bookBorrrowNumber; ?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#"></a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">

<?php
$st = $con->prepare("select borrowID from  periodicalborrow order by borrowID");
$st->execute();
$rs = $st->get_result();
$periodicalBorrrowNumber = $rs->num_rows;
?>



                                <div class="card bg-secondary text-white mb-4">
                                    <div class="card-body">Number Of Borrowed Periodicals :  <?php echo $periodicalBorrrowNumber; ?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#"></a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Insert Borrowing Procedure For The Periodical</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="insertPeriodical">Insert</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Insert Borrowing Procedure For The Book</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="insertBook">Insert</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Borrowing Items
                            </div>
                            <div class="row">
                                <div class="column">
                                    <div>
                                        <center> <input type="text" id="myInputBook" onkeyup="myFunction2()" placeholder="Search by Borrowing Number .." ><center/> 
                                    </div>
                                    <table id="myTableBook">

                                        <tr>
                                            <th>Borrowing Number</th>
                                            <th>User ID</th>
                                            <th>Book ID</th>
                                            <th>Borrowing Time</th>
                                            <th>Details</th>
                                        </tr>

<?php
$st = $con->prepare("select * from bookborrow");
$st->execute();
$rs = $st->get_result();



while ($row = $rs->fetch_assoc()) {



    echo ' <tr>';
    echo '<td>' . $row["borrowID"] . ' </td>';
    echo '<td>' . $row["id"] . ' </td>';
    echo '<td>' . $row["bookID"] . ' </td>';
    echo '<td>' . $row["time"] . ' </td>';

    echo '<td><a href="borrow_book?id=' . $row["borrowID"] . '" class="btn btn-success">Info</a></td>';
    echo '</tr>';
}
?>


                                        <tr>
                                            <th>Borrowing Number</th>
                                            <th>User ID</th>
                                            <th>Book ID</th>
                                            <th>Borrowing Time</th>
                                            <th>Details</th>
                                        </tr>
                                    </table>
                                    <script>
                                        function myFunction2() {
                                            var input, filter, table, tr, td, i, txtValue;
                                            input = document.getElementById("myInputBook");
                                            filter = input.value.toUpperCase();
                                            table = document.getElementById("myTableBook");
                                            tr = table.getElementsByTagName("tr");
                                            for (i = 0; i < tr.length; i++) {
                                                td = tr[i].getElementsByTagName("td")[0];
                                                if (td) {
                                                    txtValue = td.textContent || td.innerText;
                                                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                        tr[i].style.display = "";
                                                    } else {
                                                        tr[i].style.display = "none";
                                                    }
                                                }
                                            }
                                        }
                                    </script>
                                </div>






                                <div class="column">
                                    <div>
                                        <center> <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search by Borrowing Number .." title="Type in a name"><center/> 
                                    </div>
                                    <table id="myTablePeriodical">
                                        <tr>
                                            <th>Borrowing Number</th>
                                            <th>User ID</th>
                                            <th>Periodical ID</th>
                                            <th>Borrowing Time</th>
                                        </tr>
<?php
$st = $con->prepare("select * from periodicalborrow");
$st->execute();
$rs = $st->get_result();

while ($row = $rs->fetch_assoc()) {

    echo ' <tr>';
    echo '<td>' . $row["borrowID"] . ' </td>';
    echo '<td>' . $row["id"] . ' </td>';
    echo '<td>' . $row["periodicalBorrow"] . ' </td>';
    echo '<td>' . $row["time"] . ' </td>';
    echo '<td><a href="borrow_periodical?id=' . $row["borrowID"] . '" class="btn btn-success ">Info</a></td>';
    echo '</tr>';
}
?>
                                        <tr>
                                            <th>Borrowing Number</th>
                                            <th>User ID</th>
                                            <th>Periodical ID</th>
                                            <th>Borrowing Time</th>
                                        </tr>
                                    </table>
                                    <script>
                                        function myFunction() {
                                            var input, filter, table, tr, td, i, txtValue;
                                            input = document.getElementById("myInput");
                                            filter = input.value.toUpperCase();
                                            table = document.getElementById("myTablePeriodical");
                                            tr = table.getElementsByTagName("tr");
                                            for (i = 0; i < tr.length; i++) {
                                                td = tr[i].getElementsByTagName("td")[0];
                                                if (td) {
                                                    txtValue = td.textContent || td.innerText;
                                                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                        tr[i].style.display = "";
                                                    } else {
                                                        tr[i].style.display = "none";
                                                    }
                                                }
                                            }
                                        }
                                    </script>
                                </div>
                            </div>
                        </div>








                    </div>
                </main>

            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
