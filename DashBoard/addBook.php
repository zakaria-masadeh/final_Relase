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
                        <div class="small">Logged in as : Admin</div>
                        
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Add New Book</li>
                        </ol>
                       
                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Add Books</h3></div>
                                    <div class="card-body">
                                        <form action="addBook.php" method="post">
                                            <div class="form-row">
                                                
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputbt">Book Title</label>
                                                        <input class="form-control py-4" id="inputbt" type="text" placeholder="Enter Book Title" name="bt" required/>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputpr">Production Release</label>
                                                        <input class="form-control py-4" id="inputpr" type="text" placeholder="Enter Production Release" name="pr" required/>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputpn">Pages Number</label>
                                                        <input class="form-control py-4" id="inputpn" type="text" placeholder="Pages Number" name="pn" required/>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputpublisher">Book Publisher</label>
                                                        <input class="form-control py-4" id="inputpublisher" type="text" placeholder=" Enter Book's Publisher" name="publisher" required/>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-row">
                                                
                                                <div class="col-md-6">
                                                        <label class="small mb-1" for="author">Book Author</label>
                                                        <input class="form-control py-4" id="author" type="text" placeholder="Enter Book's Author " name="author" required/>
                                                    </div>
                                                
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="serial">Serial Number</label>
                                                <input class="form-control py-4" id="serial" type="text"  placeholder="Enter Serial Number" name="serial" required />
                                            </div>
                                                
                                                <div class="col-md-6">
                                                <label class="small mb-1" for="isbn">Isbn</label>
                                                <input class="form-control py-4" id="isbn" type="text"  placeholder="Enter Isbn" name="isbn" required />
                                            </div>
                                           </div><br/>
                                            
                                            <center>
                                              
                                                    <p style="color: crimson">Select Faculty Section</p><select name="sc" >
                                                    <option>Information Technology</option>
                                                    <option>Shariah and Law</option>
                                                    <option>Educational Sciences</option>
                                                    <option>Graduate Studies</option>
                                                    <option>Fiqh Hanafi</option>
                                                    <option>Arts and Architecture</option>
                                                    <option>Business and Finance</option>
                                                   
                                                    
                                                </select>
                                                 
                                            
                                                
                                                
                                            <div class="form-group mt-4 mb-0"><input type="submit" value="Add Book" name="add" class="btn btn-success"  ></div>
                                            </center>
                                        </form>
                                        <?php
                                        if(isset($_POST["add"])){
                                            $con=new mysqli("localhost","root","","gproject");
                                            
                                            $st_serial=$con->prepare("select serial from book where serial=? ");
                                            $st_serial->bind_param('i', $_POST["serial"]);
                                            $st_serial->execute();
                                            $rs_serial=$st_serial->get_result();
                                            
                                            
                                             $st_isbn=$con->prepare("select isbn from book where isbn=? ");
                                            $st_isbn->bind_param('s', $_POST["isbn"]);
                                            $st_isbn->execute();
                                            $rs_isbn=$st_isbn->get_result();
                                            
                                            if($rs_serial->num_rows==1 || $rs_isbn->num_rows==1){
                                                echo '<script>alert("Serial Number Or ISBN Alrady Exist");</script>';
                                                
                                            }else{
                                            
                                            
                                            
                                            
                                            
                                          
                                                
                                                $st=$con->prepare("INSERT INTO `book` (`bookID`, `title`, `year`, `pages`, `section`, `publisherName`, `authorName`,serial,isbn) VALUES (null,?,?,?,?,?,?,?,?)");
                                                $st->bind_param("siisssis", $_POST["bt"],$_POST["pr"],$_POST["pn"],$_POST["sc"],$_POST["publisher"],$_POST["author"],$_POST["serial"],$_POST["isbn"]);
                                                $st->execute();
                                             
                                                 echo '<script>alert("Book Added");</script>';
                                            }
                                            
                                                
                                        
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
