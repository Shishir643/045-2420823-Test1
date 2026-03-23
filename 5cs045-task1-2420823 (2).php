<?php
$servername = "localhost";
$username = "2420823";
$password = "Trimag@2024#";
$dbname = "db2420823";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM books";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book List</title>
</head>
<body>

<h2>Book List</h2>

<table border="1">
    <tr>
        <th>Book Name</th>
        <th>Genre</th>
        <th>Price</th>
        <th>Date of Release</th>
    </tr>

<?php
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Book_name"] . "</td>";
        echo "<td>" . $row["Genre"] . "</td>";
        echo "<td>£" . number_format($row["Price"], 2) . "</td>";
        echo "<td>" . date("d/m/Y", strtotime($row["Date_of_release"])) . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>No results</td></tr>";
}
$conn->close();
?>

</table>

</body>
</html>