<?php
include_once 'include.php';
include_once 'checkUserExists.php';

$username = 'cdscds';
$result = getUser($conn,$username);

$result = mysqli_fetch_array($result);

echo "<table>";
echo "<tr>";
echo "<th>CustomerID</th>";
echo "<td>" . $result[0] . "</td>";
echo "</tr>";

echo "<tr>";
echo "<th>CompanyName</th>";
echo "<td>" . $result[1] . "</td>";
echo "</tr>";

echo "<tr>";
echo "<th>ContactName</th>";
echo "<td>" . $result[3] . "</td>";
echo "</tr>";
echo "</table>";
?>