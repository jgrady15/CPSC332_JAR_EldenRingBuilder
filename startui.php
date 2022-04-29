<!DOCTYPE html>
<head>
    <title> Search Customer's Driving Records</title>
    <style>
        body{
            background-color: white;
        }
        table,th,td{
            border: 2px solid black;
            width: 1100px;
            background-color: white;
        }
        .btn{
            width: 10%;
            height: 5%;
            font-size: 22px;
            padding: 0px;
        }
        </style>
</head>
<body>
    <center>
        <h1> Search Customer's Driving Records</h1>

    <div class="containers">
        <form action="" method="POST">
            <input type="text" name="id" class="btn" placeholder="Enter Customer ID" />
            <input type="submit" name="search" class="btn" value="SEARCH">
        </form>
        <table>
                 <tr>
                    <th> Name </th>
                    <th> Violation Type </th>
                    <th> Number of Points </th>
                </tr> <br>

                <?php
                $conn = mysqli_connect("mariadb", "cs332s27", "enter your password", "cs332s27");

                if(isset($_POST['search']))
                {
                    $CustomerID = $_POST['id'];
                    $sql = "SELECT Name, Violation_Type, Number_of_Points FROM DRIVING_ACTIVITY, POLICYHOLDER WHERE DRIVING_ACTIVITY.CustomerID = '$CustomerID' and POLICYHOLDER.CustomerID = '$CustomerID' ";
                    $result = $conn->query($sql);

                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["Name"]. "</td><td>" . $row["Violation_Type"] . "</td><td>". $row["Number_of_Points"]. "</td></tr>";
                    }


                }
                mysqli_close($conn);
                ?>

        </table>
    </div>
    </center>

</body>
</html>
