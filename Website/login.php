<html>

<head>
    <title>Login In</title>
    <link rel="stylesheet" href="./css/fonts.css">
    <link rel="shortcut icon" href="./images/mainnlogoo.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/all.css" />
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" href="./css/style.css" />
</head>

<?php 
include 'connections.php';
$email_error="";
$pass_error="";
$msg_error="";
if (isset($_POST['submit']))
{
$email=stripcslashes($_POST['email']);
$password=stripcslashes($_POST['password']);

$email=htmlentities(mysqli_real_escape_string($conn,$_POST['email']));
$password=htmlentities(mysqli_real_escape_string($conn,$_POST['password']));

if(empty($email)){
    $email_error = 'Email is required';
}

if(empty($password)){
    $pass_error = 'Password is required';
}
 $sql="SELECT * FROM users where email='$email' AND password='$password' ";
 $result=mysqli_query($conn, $sql);
 $numrows=mysqli_num_rows($result);

 if ($numrows == 1 )
 {
  $row=mysqli_fetch_array($result, MYSQLI_ASSOC);
  $id=$row['id'];
  header ("Location: result.php?id=$id");
 }
 elseif(empty($email)&&empty($password)){
   $msg_error ="";
   $email_error='Email is required';
   $pass_error= 'Password is required';
 }elseif(empty($email)){
   $msg_error ="";
   $pass_error="";
   $email_error='Email is required';
 }elseif(empty($password)){
    $msg_error ="";
   $pass_error="Password is required";
   $email_error='';
 }else{
    $msg_error ="Email or Password are incorrect";
    $pass_error='';
    $email_error='';
 }

}


?>






<body class="body-form">

    <div class="d-flex">


        <div class="form-content ms-md-1 ps-md-5 w-50 ">
            <a href="./index.php" class="fa-fade"> <img src="./images/mainnlogoo.png" class="p-1" alt="facilio logo" /> </a>
                    <h2 class="mt-md-3">Get the most with a user friendly platform</h2>
                    <p class="mt-md-3">Schedule your demo of the Prenova platform and achieve:</p>
                    <ul class="d-flex flex-wrap ">
                        <li class="w-100 mb-md-3">
                            Reduce maintenance cost</li>
                        <li class="w-100 mb-md-3">
                            Improve Asset Lifecycle</li>
                        <li class="w-100 mb-md-3">
                            Increase operational efficiency & visibility</li>
                            <li class="w-100 mb-md-3">
                                Easy-to-Use and User Friendly System</li>
                                <li class="w-100 mb-md-3">
                                    Mobile/Tablet apps resposive</li>
                    </ul>
        
                        
                   
                 
                   
             
        
                </div>

        <div class="custom-form align-self-md-center w-50 text-center ms-md-5 bg-white">
            <form method="POST">
                <h4>See Prenova in Action</h4>
                <div class="row g-4">
                    <div class="col-md-10 offset-md-1">
                        <input type="email" name="email" class="form-control m-auto " placeholder="Email" >
                        <span class="text-danger"><?php echo $email_error?></span>
                    </div>
                    <div class="col-md-10 offset-md-1">
                        <input type="password" name="password"  class="form-control m-auto mb-md-2" placeholder="Password" >
                        <span class="text-danger"><?php echo $pass_error?></span>
                    </div>

                    <button class="w-75 py-3 colorr px-4 border m-auto" name="submit" >Sign In</button>

                    <span class="text-danger"><?php echo $msg_error?></span>

                  
                 
                  


                    <p>Don't have an account?<a href="./register.php">Sign Up</a></p>

                </div>
            </form>
        </div>
    </div>

  
</body>

</html>