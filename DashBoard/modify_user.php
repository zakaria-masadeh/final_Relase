<!DOCTYPE html>
<?php session_start();?>
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
                            <li class="breadcrumb-item active">Modify</li>
                        </ol>
                        <?php
                        $con=new mysqli("localhost","root","","gproject");
                        $st=$con->prepare("select * from user where id=?");
                        $st->bind_param('i', $_GET["id"]);
                        $st->execute();
                        $rs=$st->get_result();
                        
                        $row=$rs->fetch_assoc();
                        $row["id"];
                        $row["FirstName"];
                        $row["LastName"];
                        $row["password"];
                        $row["mobile"];
                        $row["email"];
                        $row["role"];
                        $row["status"];
                        
                        if($row["status"]==1){
                            $row["status"]="Active";
                        }else{
                            $row["status"]="Inactive";
                        }?>
                       
                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Modify User Account (User ID Number : <?php echo $_GET["id"]?> )</h3></div>
                                    <div class="card-body">
                                        
                                        <form action="" method="post">
                                            <input type="hidden" name="id" value="<?php echo $row["id"];?>"/>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputFirstName">First Name</label>
                                                        <input class="form-control py-4" id="inputFirstName" value="<?php echo  $row["FirstName"];?>" type="text"  name="FN" required/>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputLastName">Last Name</label>
                                                        <input class="form-control py-4" id="inputLastName" type="text" value="<?php echo  $row["LastName"];?>" name="LN" required/>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputPassword">Password</label>
                                                        <input class="form-control py-4" id="inputPassword" type="password" value="<?php echo  $row["password"];?>" name="password" required/>
                                                    </div>
                                                </div>
                                                 <div class="col-md-6">
                                                        <label class="small mb-1" for="Mobile">Mobile</label>
                                                        <input class="form-control py-4" id="Mobile" type="text" value="<?php echo  $row["mobile"];?>" name="mobile" required/>
                                                    </div>
                                              </div>
                                            <div class="form-row">
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control py-4" id="inputEmailAddress" type="email"  aria-describedby="emailHelp" value="<?php echo  $row["email"];?>" name="email"  required />
                                            </div>
                                           </div><br/>
                                            <center>
                                                <select name="status">
                                                    <option><?php echo $row["status"]?></option>
                                                            <option>Active</option>
                                                            <option>Inactive</option>
                                                        </select>
                                                <p style="color: crimson">Select User status</p>
                                                <br>
                                                  <select name="role">
                                                    <option> <?php echo $row["role"]?></option>
                                                    <option>Student</option>
                                                    <option>Instructor</option>
                                                    <option>Admin</option>
                                                    <option>Employee</option>
                                                    </select>
                                                   <p style="color: crimson">Select User Role</p>
                                            <div class="form-group mt-4 mb-0">
                                                <input type="submit" value="Update" name="update" class="btn btn-danger"  >
                                            </div>
                                            </center>
                                        </form>
                                       
                                        <?php
                                        
                                      
                                        if(isset($_POST["update"])){
                                          
                                      $id=$_POST["id"];
                                      $fn=$_POST["FN"];
                                      $ln=$_POST["LN"];
                                      $pass=$_POST["password"];
                                      $mobile=$_POST["mobile"];
                                      $email=$_POST["email"];
                                      $role=$_POST["role"];
                                      $status=$_POST["status"];
                                      
                                      if($status=="Active"){
                            $status=1;
                        }else{
                           $status=0;
                        }    
                                            $stupdate=$con->prepare("UPDATE user SET FirstName='$fn',LastName='$ln',password='$pass',mobile='$mobile',email='$email',role='$role',status='$status' WHERE id =?");
                                            $stupdate->bind_param('i',$id );
                                            $stupdate->execute();
                                            
                                            echo '<script>alert("Data Updated");</script>';
                                           echo ("<script>location.href='viewUser.php'</script>");
                                          
                                       
                                        }
                              
                                       
                                        ?>
                                        
                                     
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


