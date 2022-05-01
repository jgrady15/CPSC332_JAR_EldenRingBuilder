<!DOCTYPE html>
<head>
    <title> Search Customer's Billing History</title>
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
        <h1> Search Customer's Billing</h1>
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
                    <th> Policy Type </th>
                    <th> Current Balance </th>
                    <th> Last Payment Date </th>
                </tr> <br>

                <?php
                $conn = mysqli_connect("mariadb", "cs332s27", "i2roLQjc", "cs332s27");

                if(isset($_POST['search']))
                {
                    $CustomerID = $_POST['id'];
                    $sql = "SELECT POLICIES.CustomerID, Policy_Type, Name, Current_Balance_Remaining, Last_Payment_Date
                    FROM BALANCES, POLICIES, POLICYHOLDER
                    WHERE BALANCES.Policy_Number = POLICIES.Policy_Number and POLICIES.CustomerID = '$CustomerID' and POLICYHOLDER.CustomerID = '$CustomerID'";
                    
                    $result = $conn->query($sql);
                    
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["Name"] . "</td><td>" . $row["Policy_Type"] . "</td><td>". $row["Current_Balance_Remaining"] . "</td><td>" . $row["Last_Payment_Date"] . "</td></tr>";
                    }


                }
                mysqli_close($conn);
                ?>

        </table>
    </div>
    </center>

</body>
</html>
