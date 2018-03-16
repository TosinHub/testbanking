 <?php 
    include 'include/db.php';
    session_start();
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>OMEGA BANK</title>
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">

       <!-- jQuery first, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    
</head>
<body style="background-color: grey">

    <nav class="navbar navbar-light bg-faded navbar-fixed-top">
        <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#startupNavbar">
        &#9776;
        </button>
        <a class="navbar-brand" href="admin.php"><img src="img/logo.png" alt="Omega Bank" height="26"></a>

           <div class="collapse navbar-toggleable-xs" id="startupNavbar">


            <?php 
            if(isset($_SESSION['login']) && $_SESSION['login'] == 1 ){
                    ?>
                         <ul class="nav navbar-nav pull-sm-right">
                            <li class="nav-item active red">
                <a class="nav-link" href="">Welcome <?php echo $_SESSION['admin_name'] ?> </a></li>
        
            <li class="nav-item active red">
                <a class="nav-link" href="viewcustomer.php">View Customer <span class="sr-only"></span></a>
            </li>

            <li class="nav-item active red">
                <a class="nav-link" href="addcustomer.php">Add Customer <span class="sr-only"></span></a>
            </li>


              <li class="nav-item">
                    <a class="nav-link" href="logout.php">LOGOUT</a>
                </li>
            </ul>

                    <?php



            }else{

            ?>

        
             <ul class="nav navbar-nav pull-sm-right">
                <li class="nav-item active">
                    <a class="nav-link" href="login.php">LOGIN </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="signup.php">SIGN UP</a>
                </li>

                
            </ul>
      
   <?php } ?>

     </div>
    </nav>