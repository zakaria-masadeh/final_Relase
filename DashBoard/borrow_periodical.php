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
            <ul class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                       
                        
                        <a class="dropdown-item" href="login.php">Logout</a>
                    </div>
                </li>
            </ul>
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
                                
                           
                           
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                         <?php echo $_SESSION["id"];?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Borrowing Details</li>
                        </ol>
                       
                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Borrowing Information</h3></div>
                        
                        <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Borrowing Number</th>
                                                <th>User ID</th>
                                                <th>User First Name</th>
                                                <th>User Last Name</th>
                                                <th>User Mobile Number</th>
                                                <th>User Email</th>
                                                <th>User Role</th>
                                                <th>Periodical ID</th>
                                                <th>Periodical Title</th>
                                                <th>Periodical Section</th>
                                                <th>Periodical Serial</th>
                                                <th>Book ISBN</th>
                                                <th>Borrowing Time</th>
                                                <th>Delete</th>
                                                <th>Message</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                              <th>Borrowing Number</th>
                                                <th>User ID</th>
                                                <th>User First Name</th>
                                                <th>User Last Name</th>
                                                <th>User Mobile Number</th>
                                                <th>User Email</th>
                                                <th>User Role</th>
                                                <th>Periodical ID</th>
                                                <th>Periodical Title</th>
                                                <th>Periodical Section</th>
                                                <th>Periodical Serial</th>
                                                <th>Periodical ISBN</th>
                                                <th>Borrowing Time</th>
                                                    <th>Delete</th>
                                                <th>Message</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            
                                           <?php
                                           $con=new mysqli("localhost","root","","gproject");
                                           $st=$con->prepare("select user.id, user.FirstName, user.LastName, user.mobile, user.email, user.role,
                                                  periadical.periodicalID, periadical.title, periadical.section, periadical.serial, periadical.isbn,
                                                  periodicalborrow.borrowID, periodicalborrow.time from
                                                  ((user INNER JOIN periodicalborrow ON user.id = periodicalborrow.id) INNER JOIN periadical ON periodicalborrow.periodicalBorrow = periadical.periodicalID) where periodicalBorrow.borrowID=? ");
                                           $st->bind_param('i', $_GET['id']);
                                           $st->execute();
                                           $rs=$st->get_result();
                                           
                                           while ($row=$rs->fetch_assoc()){
                                               
                                              
                                             
                                                echo '<tr>';
                                               echo '<td>'.$row["borrowID"].'</td>';
                                               echo '<td>'.$row["id"].'</td>';
                                               echo '<td>'.$row["FirstName"].'</td>';
                                               echo '<td>'.$row["LastName"].'</td>';
                                               echo '<td>'.$row["mobile"].'</td>';
                                               echo '<td>'.$row["email"].'</td>';
                                               echo '<td>'.$row["role"].'</td>';
                                               echo '<td>'.$row["periodicalID"].'</td>';
                                               echo '<td>'.$row["title"].'</td>';
                                               echo '<td>'.$row["section"].'</td>';
                                               echo '<td>'.$row["serial"].'</td>';
                                               echo '<td>'.$row["isbn"].'</td>';
                                               echo '<td>'.$row["time"].'</td>';
                                                 echo '<td><a  href="remove_periodical_Borrow?borrowID='.$row["borrowID"].'" class="btn btn-warning" >Remove</a></td>';
                                               echo '<td><a href="send_message?id='.$row["id"].'" class="btn btn-info">Send a message</a></td>';
                                             
                                               
                                            echo'</tr>';   
                                           }
                                           
                                           
                                           ?>
                                            
                                       
                                        
                                            
                                        </tbody>
                                    </table>
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
