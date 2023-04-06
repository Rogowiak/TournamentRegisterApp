<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>Lista startowa</header>
    <main>
        <?php 
        $conn = new mysqli('localhost', 'root', '', 'zapisani'); //The Blank string is the password        
        /* Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }
        else{
            echo "Connected successfully";
        }
        */

        $query = "SELECT Name1, WK1, Name2, WK2 FROM zapisani"; //You don't need a ; like you do in SQL
        $result = mysqli_query($conn, $query);
        echo "<table>"; // start a table tag in the HTML
        
        while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
        echo "<tr><td>" . htmlspecialchars($row['Name1']) . "</td><td>" . htmlspecialchars($row['WK1']) . "</td><td>" . htmlspecialchars($row['Name2']) . "</td><td>" . htmlspecialchars($row['WK2']) . "</td></tr>";  //$row['index'] the index here is a field name
        }
        
        echo "</table>"; //Close the table in HTML
        
        mysqli_close($conn);
        ?>
    </main> 
</body>
</html>