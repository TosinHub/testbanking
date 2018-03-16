 <?php 
	include 'include/header.php';
    


     if(array_key_exists('submit', $_POST)){

           
          
             if(empty($_POST['email'])){
              $error['email'] = 'Please enter email';
            }
            if(empty($_POST['password'])){
              $error['password'] = 'Please enter password';
            }

          if(empty($error)){     

           
            #CHECK IF RECORD IS IN DATABASE
            
            $email = $_POST['email'];
            $hash_password = md5($_POST['password']);
           

      $dbconnect  =  $conn->prepare("SELECT * FROM admin  WHERE email = :e AND password = :p ");

        //bind paramenters
        $data = [
          
          ':e' => $email,
          ':p' => $hash_password
        ]; 

        $dbconnect->execute($data);
        $count = $dbconnect->rowCount();
        $row = $dbconnect->fetch(PDO::FETCH_ASSOC);



        if($count == 1 ){
            $_SESSION['login'] = 1;
            $_SESSION['admin_name'] = $row['name'];
            header("location:admin.php");
        

          }else{
            $message = "Invalid login details, try again!";
            header("location:login.php?message=$message");
          }

        }
      }

 ?>
 <center>
  <section id="cover">
        <div id="cover-caption">
            <div class="container">
                <div class="col-sm-10 col-sm-offset-1">
                    <h1 class="display-3">Welcome to Omega Bank</h1>
                    <p>Welcome to the Bank of the future, The bank that looks into the future to know whats best for you. Omega Bank.</p>
                    <p><?php   
                        if(isset($_GET['message'])){
                            echo $_GET['message'];
                        }


                    ?> </p>
                    <form action="login.php" class="form-inline" method="POST">
                        <div class="form-group">
                            <label class="sr-only">E-Mail</label>
                            <input type="email" class="form-control form-control-lg" name="email">
                        </div>
                        <div class="form-group">
                            <label class="sr-only">Enter Password</label>
                            <input type="password" class="form-control form-control-lg" placeholder="Enter Password" name="password">
                        </div>
                        <button type="submit" name="submit" class="btn btn-success btn-lg">Log In</button>
                    </form>
                    
                    <br>
                    
<!--                     <a href="#nav-main" class="btn btn-secondary-outline btn-sm" role="button">&darr;</a> -->
                </div>
            </div>
        </div>
    </section>
    </center>
</body>
</html>