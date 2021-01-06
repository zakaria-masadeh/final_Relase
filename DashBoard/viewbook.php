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
         <style>
            #myInput {
  
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
                            <li class="breadcrumb-item active">Books Info</li>
                        </ol>
                       
                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Books Information</h3></div>
                        
                        <div class="card-body">
                            <div>
                                  <center><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search by Book ID .." title="Type in a name"> </center>
                            </div> <br/>
                                <div class="table-responsive">
                                    
                                    <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Book ID</th>
                                                <th>Title</th>
                                                <th>Year</th>
                                                <th>pages</th>
                                                <th>section</th>
                                                <th>Publisher Name</th>
                                                <th>Author Name</th>
                                                <th>Serial</th>
                                                <th>Isbn</th>
                                                <th>Modify</th>
                                                <th>Delete</th>
                                               
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Book ID</th>
                                                <th>Title</th>
                                                <th>Year</th>
                                                <th>pages</th>
                                                <th>section</th>
                                                <th>Publisher Name</th>
                                                <th>Author Name</th>
                                                <th>Serial</th>
                                                <th>Isbn</th>
                                                <th>Modify</th>
                                                <th>Delete</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            
                                           <?php
                                           $con=new mysqli("localhost","root","","gproject");
                                           $st=$con->prepare("select * from book");
                                           $st->execute();
                                           $rs=$st->get_result();
                                           
                                           while ($row=$rs->fetch_assoc()){
                                               
                                              
                                             
                                                echo '<tr>';
                                               echo '<td>'.$row["bookID"].'</td>';
                                               echo '<td>'.$row["title"].'</td>';
                                               echo '<td>'.$row["year"].'</td>';
                                               echo '<td>'.$row["pages"].'</td>';
                                               echo '<td>'.$row["section"].'</td>';
                                               echo '<td>'.$row["publisherName"].'</td>';
                                               echo '<td>'.$row["authorName"].'</td>';
                                               echo '<td>'.$row["serial"].'</td>';
                                               echo '<td>'.$row["isbn"].'</td>';
                                               echo '<td><a href="modify_book?id='.$row["bookID"].'" class="btn btn-danger">Modify</a></td>';
                                               echo '<td><a href="removebook?id='.$row["bookID"].'" class="btn btn-warning">Remove</a></td>';
                                               
                                            echo'</tr>';   
                                           }
                                           
                                           
                                           ?>
                                            
                                       
                                        
                                            
                                        </tbody>
                                    </table>
                                     <script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
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
