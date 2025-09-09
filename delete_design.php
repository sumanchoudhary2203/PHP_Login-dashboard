<?php
include("connection.php");

$id = $_GET['ID'];
$query = "DELETE FROM form where ID = '$id'";
$data = mysqli_query($conn, $query);

if ($data) {
    echo "<script>alert('Record Deleted'); </script>";
?>
    <meta http-equiv="refresh" content="0; url = http://localhost/LOGIN_USER/display.php" />

<?php
} else {
    echo "<script>alert('Failed to Deleted'); </script>";
}
?>