<html>
<head>
    <title>Display regisdetails</title>
</head>

<body>

<?php
if (isset($_GET["Regis_ID"])) {
    $strRegis_ID = $_GET["Regis_ID"];
}

require "connect.php";

$sql = "SELECT regis.Year, 
               regis.Term, 
               course.C_Name, 
               course.Credit, 
               regiterdetails.Grade
        FROM regisdetails
        LEFT JOIN regis 
            ON regisdetails.Regis_ID = regis.Regis_ID
        LEFT JOIN course 
            ON regisdetails.C_ID = course.C_ID
        WHERE regisdetails.Regis_ID = ?";

$params = array($strRegis_ID);

$stmt = $conn->prepare($sql);
$stmt->execute($params);
?>

<h2>รายละเอียดการลงทะเบียน</h2>

<table width="500" border="1">
<tr>
    <th>Year</th>
    <th>Term</th>
    <th>Course Name</th>
    <th>Credit</th>
    <th>Grade</th>
</tr>

<?php
while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>
<tr>
    <td><?php echo $result["Year"]; ?></td>
    <td><?php echo $result["Term"]; ?></td>
    <td><?php echo $result["C_Name"]; ?></td>
    <td><?php echo $result["Credit"]; ?></td>
    <td><?php echo $result["Grade"]; ?></td>
</tr>
<?php
}
?>

</table>

<?php
$conn = null;
?>

</body>
</html>