<?php include("connection.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Crud Operations</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <form action="" method="POST">
            <div class="title">
                Registration Form
            </div>
            <div class="form">

                <div class="input_field">
                    <label>First Name</label>
                    <input type="text" class="input" placeholder="Enter your first name" name="fname" required>
                </div>
                <div class="input_field">
                    <label>Last Name</label>
                    <input type="text" class="input" placeholder="Enter your last name" name="lname" required>
                </div>
                <div class="input_field">
                    <label>Password</label>
                    <input type="password" class="input" placeholder="Enter your password" name="password" required>
                </div>
                <div class="input_field">
                    <label>Confirm Password</label>
                    <input type="password" class="input" placeholder="confirm password" name="conpassword" required>
                </div>
                <div class="input_field">
                    <label>Gender</label>
                    <div class="custom_select">
                        <select class="selectbox" name="gender" required>
                            <option>Select</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="others">Others</option>
                        </select>

                    </div>
                </div>
                <div class="input_field">
                    <label>Email Address</label>
                    <input type="text" class="input" placeholder="Enter your Email Address" name="email" required>

                </div>
                <div class="input_field">
                    <label>Phone Number </label>
                    <input type="text" class="input" placeholder="Enter your phone number" name="phone" required>
                </div>
                <div class="input_field">
                    <label>Address </label>
                    <textarea class="textarea" placeholder="Enter your full address" name="address" required></textarea>
                </div>
                <div class="input_field terms">
                    <label class="check">
                        <input type="checkbox" required>
                        <span class="checkmark"></span>
                    </label>
                    <p>Agree to Terms and conditions</p>
                </div>
                <div class="input_field">
                    <input type="submit" value="Register" class="btn" name="register">
                </div>


            </div>
        </form>
    </div>
</body>

</html>

<?php
// if (isset($_POST['register'])) {
//     $fname   = $_POST['fname'];
//     $lname   = $_POST['lname'];
//     $pwd     = $_POST['password'];
//     $cpwd    = $_POST['conpassword'];
//     $gender  = $_POST['gender'];
//     $email   = $_POST['email'];
//     $phone   = $_POST['phone'];
//     $address = $_POST['address'];

//     if ($pwd === $cpwd)
//     {     
//     $query = "INSERT INTO form(fname,lname,password,cpassword,gender,email,phone,address) values('$fname', '$lname', '$pwd', '$cpwd', '$gender', '$email', '$phone','$address')";
//     $data = mysqli_query($conn, $query);

//     if ($data) {
//         echo "Data inserted into databse";
//     } else {
//         echo "Failed";
//     }
//     } else {
//         echo "<script>alert('Password and Confirm Password do not match!');</script>";
//     }

// }

if (isset($_POST['register'])) {
    $fname   = $_POST['fname'];
    $lname   = $_POST['lname'];
    $pwd     = $_POST['password'];
    $cpwd    = $_POST['conpassword'];
    $gender  = $_POST['gender'];
    $email   = $_POST['email'];
    $phone   = $_POST['phone'];
    $address = $_POST['address'];

    if ($pwd === $cpwd) {
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO form(fname,lname,password,cpassword,gender,email,phone,address) 
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $fname, $lname, $hashedPwd, $hashedPwd, $gender, $email, $phone, $address);

        if ($stmt->execute()) {
            echo "<script>alert('Data inserted successfully');</script>";
        } else {
            echo "<script>alert('Failed to insert data');</script>";
        }
        $stmt->close();
    } else {
        echo "<script>alert('Password and Confirm Password do not match!');</script>";
    }
}


?>