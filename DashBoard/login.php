<!DOCTYPE html>
<?php session_start(); 
 ?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Page Title - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body style="background-color: #b9bbbe" background="src/img/library.jpg">
       
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Admin Login</h3></div>

                                    <div class="card-body">
                                        <form action="login.php" method="post">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputID">Admin ID</label>
                                                <input class="form-control py-4" id="inputID" type="text" placeholder="Enter ID" name="id" required/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Admin Password</label>
                                                <input class="form-control py-4" id="inputPassword" type="password" placeholder="Enter password" name="password" required />
                                            </div>
                                            
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                             

                                      <input type="submit" value="Login" name="login"  class="btn btn-primary">
                                            </div>
                                            
                                        </form>
                                           
                                    </div>

                                    <?php
                                    
                                    
                                    
                                    if (isset($_POST["login"])) {
                                        $con = new mysqli("localhost", "root", "", "gproject");
                                        $st = $con->prepare("select * from user where id=? and password=? ");
                                        $st->bind_param("is", $_POST["id"], $_POST["password"]);
                                        $st->execute();
                                        $rs = $st->get_result();

                                        $row = $rs->fetch_assoc();
                                        $r = $row["role"];

                                        if ($rs->num_rows == 0)
                                            echo '<script>alert("Wrong ID or password");</script>';
                                        else
                                        if ($r != "Admin")
                                            echo '<script>alert("Not Authorized Access ");</script>';
                                        else {
                                            $_SESSION["id"] = $row["id"];
                                            echo '<script>window.location="index.php";</script>';
                                        }
                                    }
                                    ?>





                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
