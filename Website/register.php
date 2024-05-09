<html>

<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="./css/fonts.css">
    <link rel="shortcut icon" href="./images/mainnlogoo.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/all.css" />
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" href="./css/style.css" />
</head>

<?php 
include 'connections.php';
$fname_error="";
$lname_error="";
$email_error="";
$pass_error="";

if (isset($_POST['submit'])) 
{
    
$firstname=stripcslashes($_POST['firstname']);
$lastname=stripcslashes($_POST['lastname']);
$email=stripcslashes($_POST['email']);
$phonenumber=stripcslashes($_POST['phonenumber']);
$password=stripcslashes($_POST['password']);
$company=stripcslashes($_POST['company']);
// protect from sql injection
$firstname=htmlentities(mysqli_real_escape_string($conn,$_POST['firstname']));
$lastname=htmlentities(mysqli_real_escape_string($conn,$_POST['lastname']));
$email=htmlentities(mysqli_real_escape_string($conn,$_POST['email']));
$phonenumber=htmlentities(mysqli_real_escape_string($conn,$_POST['phonenumber']));
$password=htmlentities(mysqli_real_escape_string($conn,$_POST['password']));
$company=htmlentities(mysqli_real_escape_string($conn,$_POST['company']));
 
if(empty($firstname)){
    $fname_error = 'First Name is required';
}else if(!preg_match("/^[a-zA-Z]{3,10}$/",$lastname)){
    $fname_error = 'First Name must contain only characters between 3 to 10';
}

if(empty($lastname)){
    $lname_error = 'Last Name is required';
}else if(!preg_match("/^[a-zA-Z]{3,10}$/",$lastname)){
    $lname_error = 'Last Name must contain only characters between 3 to 10';
}

if(empty($email)){
    $email_error = 'Email is required';
}


if(empty($password)){
    $pass_error = 'Password is required';
}else if(!preg_match("/^[a-zA-Z@0-9]{8,}$/",$password)){
    $pass_error = 'Password must contain at least 8 characters or numbers or specail chr @';
}

else{
    $sql="INSERT INTO  users (firstname,lastname,email,phonenumber,password,company) VALUES 
    ('$firstname','$lastname','$email','$phonenumber','$password','$company')";
	
if ($conn->query($sql) === TRUE) {
  header ("Location: login.php"); //redirect browser
}
}
$conn->close();
}
?>


<body class="body-form">

    <div class="d-flex align-items-md-stretch">


        <div class="form-content ms-md-1 py-md-4 ps-md-5 w-50 ">
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

        <div class="custom-form w-50 text-center ms-md-5 bg-white">

            <form method="POST">
                <h4>See Prenova in Action</h4>
            <div class="row g-4">
                <div class="col-md-5 offset-md-1">
                   
                    <input id="firstname" name="firstname" type="text" class="form-control" placeholder="First name">
                    <span class="text-danger"><?php echo $fname_error?></span>

                </div>
                <div class="col-md-5 ">
                
                    <input id="lastname" name="lastname" type="text" class="form-control" placeholder="Last name">
                    <span class="text-danger"><?php echo $lname_error?></span>
                        
                </div>
                <div class="col-md-10 offset-md-1">
               
                    <input id="email" name="email" type="email" class="form-control m-auto " placeholder="Email"  >
                    <span class="text-danger"><?php echo $email_error?></span>
                </div>
                <div class="col-md-10 offset-md-1">
                    <input id="phonenumber" name="phonenumber" type="text" class="form-control m-auto " placeholder="Phone Number"
                         >
                </div>
                <div class="col-md-10 offset-md-1">
              
                    <input id="password" name="password"  type="password" class="form-control m-auto " placeholder="Password"  >
                    <span class="text-danger"><?php echo $pass_error?></span>
                </div>
                <div class="col-md-10 offset-md-1">
                    <input id="company" name="company" type="text" class="form-control m-auto mb-md-2 " placeholder="Company"  >
                </div>
                     
                  <button class="w-75 py-3  px-4 border m-auto" name="submit" >Sign Up</button>
                 <!-- <input class="w-75 py-3 colorr px-4 border m-auto"  type="submit" name="submit" value="Sign Up"> -->
                <p id="errormsg" class="d-none text-danger">All input required</p>
                  
 
                    <p>Do you have an account? <a href="./login.php">Sign In</a></p>
            </div>
            </form>
        </div>
    </div>

</body>

</html>