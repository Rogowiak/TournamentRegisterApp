<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <header><div class="title">Rejestracja</div></header>
    <main id = "zapisani" >
        <?php 
        $conn = new mysqli('localhost', 'root', '', 'zapisani');   
        /*if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }
        else{
            echo "Connected successfully";
        }
        */
        

        $Name1 = $_POST['name1'];
		$WK1 = $_POST['WK1'];
		$PID1 = $_POST['PID1'];
		$Name2 = $_POST['name2'];
		$WK2 = $_POST['WK2'];
		$PID2 = $_POST['PID2'];


            $query = "SELECT * FROM zapisani WHERE PID1 = ? OR PID2 = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ii", $PID1, $PID2);
            $stmt->execute();
            $res = $stmt->get_result();

            $query2 = "SELECT * FROM zapisani WHERE PID1 = ? OR PID2 = ?";
            $stmt2 = $conn->prepare($query2);
            $stmt2->bind_param("ii", $PID2, $PID1);
            $stmt2->execute();
            $res2 = $stmt2->get_result();

            if ($PID1 != 0 && $PID2 != 0) {
                if($res -> num_rows > 0 || $res2 -> num_rows > 0)
                {echo "<div class='box'><div class='alert'>Co najmniej jeden z zawodników jest już zapisany</div>
                    <div class='alert2'>zweryfikuj wprowadzone dane</div>
                    <div class='links'><a href = 'index.php'> Powrót do zapisów </a>
                    <a href = 'lista.php'>Lista startowa</a></div></div>
                    ";}
                
                else{
                    {
                        $sql = "INSERT INTO zapisani (Name1,PID1, WK1, Name2, PID2, WK2) VALUES ('$Name1','$PID1','$WK1','$Name2','$PID2','$WK2')";
                        mysqli_query($conn, $sql);
                        $query = "SELECT Name1, WK1, Name2, WK2 FROM zapisani"; //You don't need a ; like you do in SQL
                        $result = mysqli_query($conn, $query);
                        echo "<table>"; // start a table tag in the HTML
                        while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
                        echo "<tr><td>" . htmlspecialchars($row['Name1']) . "</td><td>" . htmlspecialchars($row['WK1']) . "</td><td>" . htmlspecialchars($row['Name2']) . "</td><td>" . htmlspecialchars($row['WK2']) . "</td></tr>";  //$row['index'] the index here is a field name
                        }
                    }
                }
            }
            else{
            $sql = "INSERT INTO zapisani (Name1,PID1, WK1, Name2, PID2, WK2) VALUES ('$Name1','$PID1','$WK1','$Name2','$PID2','$WK2')";
            mysqli_query($conn, $sql);
            $query = "SELECT Name1, WK1, Name2, WK2 FROM zapisani"; //You don't need a ; like you do in SQL
            $result = mysqli_query($conn, $query);
            echo "<table>"; // start a table tag in the HTML
            while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
            echo "<tr><td>" . htmlspecialchars($row['Name1']) . "</td><td>" . htmlspecialchars($row['WK1']) . "</td><td>" . htmlspecialchars($row['Name2']) . "</td><td>" . htmlspecialchars($row['WK2']) . "</td></tr>";  //$row['index'] the index here is a field name
            }
        
            echo "</table>"; //Close the table in HTML
            }

        
        
        mysqli_close($conn);
        ?>
    </main> 
</body>
</html>