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
        .link {
            color: grey;
            text-decoration: none;
        }
        </style>
</head>
<body>
    <center>
        <h1> Search Customer's Driving Records</h1>
        <ol>
            <a class="link" href="index.php">Driving Records</a>
            <br>
		    <a class="link" href="policy_type.php">Policy Type</a>
            <br>
		    <a class="link" href="bill_summary.php">Bill Summary</a>
        </ol>

        <center><p>Test ID's: P137024, P458357, P875147, P987654</p></center>
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
					$conn = mysqli_connect("mariadb", "cs332s25", "MwRMm07y", "cs332s25");
					if(isset($_POST['search']))
					{
						$CustomerID = $_POST['id'];
						$sql = "SELECT Name, Violation_Type, Number_of_Points FROM DRIVING_ACTIVITY, POLICYHOLDER WHERE DRIVING_ACTIVITY.CustomerID = '$CustomerID' AND POLICYHOLDER.CustomerID LIKE '%$CustomerID' ";
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
