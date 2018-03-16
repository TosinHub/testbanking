<?php 
	include 'include/header.php';
     include 'include/db.php';

     if(array_key_exists('submit', $_POST)){

           
            if(empty($_POST['fname'])){
              $fnameerror = 'Please enter first name';
            }
             if(empty($_POST['lname'])){
              $error['lname'] = 'Please enter last name';
            }
             if(empty($_POST['email'])){
              $error[] = 'Please enter email';
            }
            if(empty($_POST['password'])){
              $error[] = 'Please enter password';
            }
            if($_POST['password'] !== $_POST['password1']){
              $confirm = 'Please enter same password';
            }

          if(empty($error)){     

           
            #INSERT INTO THE DATABASE
            $name = $_POST['fname'] . " ". $_POST['lname'];
            $email = $_POST['email'];
            $hash_password = md5($_POST['password']);
           




      $dbconnect  =  $conn->prepare("INSERT INTO admin(name,email,password) VALUES (:n, :e, :p) ");

        //bind paramenters
        $data = [
          ':n' => $name,
          ':e' => $email,
          ':p' => $hash_password



        ]; 
          if($dbconnect->execute($data)){
            header("location:login.php");
          }else{
            $error[] = "Sorry account cannot be created";
          }


        }else{
          foreach ($error as $error) {
            echo "<p>". $error."</p>";
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
 					
 					
 					 <form action="" method="POST">
                        <div class="form-group">
                          <?php if(isset($fnameerror)){
  echo "<p style='color: red'>". $fnameerror . "</p>";
} ?>
                            <label style="font-size: 40px">First Name</label>
                            <input type="text" class="form-control form-control-lg"  name="fname">
                        </div><br>
                        <div class="form-group">
                            <label style="font-size: 40px">Last name</label>
                            <input type="text" name="lname" class="form-control form-control-lg" >
                        </div><br>
                       <div class="form-group">
                       		<label style="font-size: 40px">E-mail</label>
                       		<input type="text" class="form-control form-control-lg" name="email" placeholder="janedoe@example.com">
                       </div><br>
                        <div class="form-group">
                       		<label style="font-size: 40px">Password</label>
                       		<input type="password" class="form-control form-control-lg" name="password" placeholder="anything">
                       </div><br>

                        <div class="form-group">
                          <label style="font-size: 40px">Confirm Password</label>
<?php if(isset($confirm)){
  echo "<p style='color: red'>". $confirm . "</p>";
} ?>

                          <input type="password" class="form-control form-control-lg" name="password1" placeholder="anything">
                       </div><br>
                        <button type="submit" name="submit" class="btn btn-success btn-lg">SUBMIT</button>
                    </form>
                    
 				</div>
 				
 			</div>
 			
 		</div>
 		
 	</section>






 </center>