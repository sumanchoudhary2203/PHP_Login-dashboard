<?php include("connection.php");



if (isset($_GET['ID'])) {
    $id = $_GET['ID'];


    $query = "SELECT * FROM form WHERE ID = '$id'";
    $data = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($data);

    $language = $result['language'];
    $language1 = explode(",", $language);
}
// else {
//     echo "User ID not found in URL!";
//     exit();
// }

// $id = $_GET['ID'];
// $query = "SELECT * from form where ID = '$id'";
// $data = mysqli_query($conn, $query);

// $result = mysqli_fetch_assoc($data);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Operations</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <form action="" method="POST">
            <div class="title">
                Update Form
            </div>
            <div class="form">

                <div class="input_field">
                    <label>First Name</label>
                    <input type="text" value="<?php echo $result['fname'];  ?>" class="input" placeholder="Enter your first name" name="fname" required>
                </div>
                <div class="input_field">
                    <label>Last Name</label>
                    <input type="text" value="<?php echo $result['lname'];  ?>" class="input" placeholder="Enter your last name" name="lname" required>
                </div>
                <div class="input_field">
                    <label>Password</label>
                    <input type="password" value="<?php echo $result['password'];  ?>" class="input" placeholder="Enter your password" name="password" required>
                </div>
                <div class="input_field">
                    <label>Confirm Password</label>
                    <input type="password" value="<?php echo $result['cpassword'];  ?>" class="input" placeholder="confirm password" name="conpassword" required>
                </div>
                <div class="input_field">
                    <label>Gender</label>
                    <div class="custom_select">
                        <select class="selectbox" name="gender" required>
                            <option>Select</option>

                            <option value="male"
                                <?php
                                if ($result['gender'] == 'male') {
                                    echo "selected";
                                }

                                ?>>Male</option>

                            <option value="female"
                                <?php
                                if ($result['gender'] == 'female') {
                                    echo "selected";
                                }

                                ?>>Female</option>
                            <option value="others"
                                <?php
                                if ($result['gender'] == 'others') {
                                    echo "selected";
                                }

                                ?>>Others</option>
                        </select>

                    </div>
                </div>
                <div class="input_field">
                    <label>Email Address</label>
                    <input type="text" value="<?php echo $result['email'];  ?>" class="input" placeholder="Enter your Email Address" name="email" required>

                </div>
                <div class="input_field">
                    <label>Phone Number </label>
                    <input type="text" value="<?php echo $result['phone'];  ?>" class="input" placeholder="Enter your phone number" name="phone" required>
                </div>
                <div class="input_field">
                    <label style="margin-right:100px">Caste </label>
                    <input type="radio" name="r1" value="General" required
                        <?php
                        if ($result['caste'] == "General") {
                            echo "checked";
                        }

                        ?>><label style="margin-left:12px">General</label>
                    <input type="radio" name="r1" value="OBC" required
                        <?php
                        if ($result['caste'] == "OBC") {
                            echo "checked";
                        }

                        ?>><label style="margin-left:12px">OBC</label>
                    <input type="radio" name="r1" value="SC" required
                        <?php
                        if ($result['caste'] == "SC") {
                            echo "checked";
                        }

                        ?>><label style="margin-left:12px">SC</label>
                    <input type="radio" name="r1" value="ST" required
                        <?php
                        if ($result['caste'] == "ST") {
                            echo "checked";
                        }

                        ?>><label style="margin-left:12px">ST</label>
                </div>

                <div class="input_field">
                    <label style="margin-right:70px">Languauge</label>
                    <input type="checkbox" name="Languauge[]" value="English"
                        <?php
                        if (in_array('English', $language1)) {
                            echo "checked";
                        }
                        ?>><label style="margin-left:10px">English</label>
                    <input type="checkbox" name="Languauge[]" value="Hindi"
                        <?php
                        if (in_array('Hindi', $language1)) {
                            echo "checked";
                        }
                        ?>><label style="margin-left:10px">Hindi</label>
                    <input type="checkbox" name="Languauge[]" value="Both"
                        <?php
                        if (in_array('Both', $language1)) {
                            echo "checked";
                        }
                        ?>><label style="margin-left:10px">Both</label>

                </div>


                <div class="input_field">
                    <label>Address </label>
                    <textarea class="textarea" placeholder="Enter your full address" name="address" required><?php echo $result['address']; ?>
                    </textarea>
                </div>
                <div class="input_field terms">
                    <label class="check">
                        <input type="checkbox" required>
                        <span class="checkmark"></span>
                    </label>
                    <p>Agree to Terms and conditions</p>
                </div>
                <div class="input_field">
                    <input type="submit" value="Update Details" class="btn" name="update">
                </div>


            </div>
        </form>
    </div>
</body>

</html>

<?php
if (isset($_POST['update'])) {
    $fname   = $_POST['fname'];
    $lname   = $_POST['lname'];
    $pwd     = $_POST['password'];
    $cpwd    = $_POST['conpassword'];
    $gender  = $_POST['gender'];
    $email   = $_POST['email'];
    $phone   = $_POST['phone'];
    $address = $_POST['address'];



    $query = "UPDATE form set fname = '$fname', lname = '$lname', password = '$pwd', cpassword ='$cpwd', gender = '$gender' ,email = '$email', phone = '$phone', address = '$address' WHERE ID = '$id'";
    $data = mysqli_query($conn, $query);

    if ($data) {
        echo "<script>alert('Data successfully updated');</script>";
?>
        <meta http-equiv="refresh" content="0; url = http://localhost/LOGIN_USER/display.php" />

<?php
    } else {
        echo "Failed to update";
    }

    // }
    // else{
    //     echo "<script> alert('please entry all fields');</script>";
    // }

}

?>