<html>

<head>
    <title> Select to See Fetail 651 </title>
</head>

<body>
    <?php
    require "connect.php";
    $sql = "SELECT * FROM student";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    ?>

    <table width="800" border="1">
        <tr>
            <th width="90">
                <div align="center">รหัสนักศึกษา</div>
            </th>
            <th width="140">
                <div align="center">ชื่อจริง</div>
            </th>
            <th width="120">
                <div align="center">นามสกุล</div>
            </th>
        </tr>
        <?php
        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <tr>
                <td><?php echo $result["S_ID"]; ?></td>
                <td><?php echo $result["S_Fname"]; ?></td>
                <td><?php echo $result["S_Lname"]; ?></td>
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