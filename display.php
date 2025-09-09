<html>

<head>
    <title>
        Display records
    </title>
    <style>
        body {
            background-color: mediumvioletred;
            background-image: url('photo1.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            color: white;
            margin-left: 50px;
            margin-right: 50px;
        }

        table {
            background-color: aliceblue;
            background-image: url('photo1.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            table-layout: fixed;
            width: 100%;
        }

        .update,
        .delete {
            background-color: #4CAF50;
            outline: none;
            color: white;
            border: 0;
            border-radius: 5px;
            height: 20px;
            width: 80px;
            font-weight: bolder;
            cursor: pointer;
            margin-right: 15px;
            margin-left: 15px;
        }

        .update:hover {
            background-color: #81C784;
            color: black;
        }

        .delete {
            background-color: #E53935;
        }

        .delete:hover {
            background-color: #FF6F61;
            color: black;

        }
    </style>
</head>

</html>


<?php
include("connection.php");

$result = mysqli_query($conn, "SELECT * FROM form ORDER BY id ASC");
$total = mysqli_num_rows($result);

if ($total != 0) {
?>
    <h2 align="center"> <mark>Displaying All Records</mark></h2>
    <center>
        <table border="1" cellspacing="7" width="100%">
            <tr>
                <th width = 5%>Sr No</th>
                <th width = 10%>First Name</th>
                <th width = 7%>Last Name</th>
                <th width = 8%>Gender</th>
                <th width = 15%>Email</th>
                <th width = 10%>Phone Number</th>
                <th width = 15%>Address</th>
                <th width = 20%>Operations</th>
            </tr>

            <?php
            $count = 1; // gapless serial number
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $count++ . "</td>"; // Serial number
                echo "<td>" . $row['fname'] . "</td>";
                echo "<td>" . $row['lname'] . "</td>";
                echo "<td>" . $row['gender'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
                echo "<td>" . $row['address'] . "</td>";
                echo "<td>
                        <a href='update_design.php?ID=" . $row['ID'] . "'>
                            <input type='submit' value='Update' class='update'>
                        </a>
                        <a href='delete_design.php?ID=" . $row['ID'] . "' onclick='return checkdelete()'>
                            <input type='submit' value='Delete' class='delete'>
                        </a>
                      </td>";
                echo "</tr>";
            }
            ?>
        </table>
    </center>
<?php
} else {
    echo "<h3 align='center'>No records found</h3>";
}
?>

<script>
    function checkdelete() {
        return confirm('Are you sure you want to delete this data?');
    }
</script>