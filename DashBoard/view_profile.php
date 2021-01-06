<!DOCTYPE html>
<?php session_start(); ?>
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
                            <a class="nav-link" href="index.php">
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
                        <div class="small">Logged in as : Admin

                            
                        </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">My Account</li>
                        </ol>

                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Account Information</h3>
                            <center> <p class="w3-center"><img src="depositphotos_90265702-stock-illustration-profile-icon-male-avatar-man.jpg"  style="  border-radius: 50%; width: 100px"  alt="Avatar"></p>  </center> </div>

                        <br><br>
                        
                        <?php
                       
                        
                        
                        $con=new mysqli("localhost","root","","gproject");
                        $st=$con->prepare("select * from user where id=?");
                        $st->bind_param('i', $_SESSION["id"]);
                        $st->execute();
                        $rs=$st->get_result();
                        $row=$rs->fetch_assoc();
                        $row["id"];
                        $row["FirstName"];
                        $row["LastName"];
                        $row["password"];
                        $row["mobile"];
                        $row["email"];
                        
                        
                        
                        ?>
                        

                        <div class="container">

                            <form action="" method="post">
                                <input type="hidden" value="<?php echo $row["id"];?> " name="userid">
                                <div class="form-group">
                                    <label for="FN">First Name:</label>
                                    <input type="text" class="form-control" id="FN" value="<?php echo $row["FirstName"];?>" name="FN">
                                </div>
                                <div class="form-group">
                                    <label for="LN">Last Name:</label>
                                    <input type="text" class="form-control" id="LN" value="<?php echo $row["LastName"];?>" name="LN">
                                </div>
                                <div class="form-group">
                                    <label for="Pass">Password:</label>
                                    <input type="password" class="form-control" id="Pass" value="<?php echo $row["password"];?>" name="pass">
                                </div>
                                <div class="form-group">
                                    <label for="mobile">Mobile:</label>
                                    <input type="text" class="form-control" id="mobile" value="<?php echo $row["mobile"];?>" name="mobile">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="text" class="form-control" id="email" value="<?php echo $row["email"];?>" name="email">
                                </div>
                                
                                   
                                 
                               <div class="form-group mt-4 mb-0">
                                   <center>
                                                <input type="submit" value="Update" name="update" class="btn btn-danger"  ></center>
                                            </div>
                            
                             <br/><br/>
                            </form>
                        </div>
   
                           <?php
                           if(isset($_POST["update"])){
                               $userID=$_POST["userid"];
                               $first=$_POST["FN"];
                               $last=$_POST["LN"];
                               $pass=$_POST["pass"];
                               $mob=$_POST["mobile"];
                               $E=$_POST["email"];
                               $con=new mysqli("localhost","root","","gproject");
                               
                                 $stupdate = $con->prepare("UPDATE user SET FirstName='$first',lastName='$last',password='$pass',mobile='$mob',email='$E' WHERE id=?");
    $stupdate->bind_param('i', $userID);
    $stupdate->execute();

    echo '<script>alert("Data Updated");</script>';
    echo ("<script>location.href='index.php'</script>");
                           }
                           
                           
                           ?>

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

