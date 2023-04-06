<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <a href="view.php">Back</a><br>
    <table border="1" cellspacing="4" cellpadding="4"> 
    <tr> 
        <td> STUDENT_ID </td> 
        <td> CLASS_ID </td> 
        <td> FAMILY_ID </td> 
        <td> NAME </td> 
        <td> ADDRESS </td> 
        <td> MEDICAL_INFO </td>
        <td> Create </td> 
    </tr>
    
</body>
</html>

<?php

    if (isset($_POST["submit"])) {
        $database = mysqli_connect("localhost", "root", "", "ra");
        // $StudentId= $_GET["Student_ID"];
        $classId= $_POST["CLASS_ID"];
        $familyId= $_POST["FAMILY_ID"];
        $name= $_POST["NAME"];
        $address= $_POST["ADDRESS"];
        $medicalInfo= $_POST["MEDICAL_INFO"];


        $sql= "INSERT INTO student (CLASS_ID,FAMILY_ID, NAME, ADDRESS, MEDICAL_INFO) VALUES ($classId, $familyId, '$name', '$address', '$medicalInfo')";

        $result= mysqli_query($database, $sql);

        mysqli_close($database);
        if ($result) {
            header("Location: view.php");
            
        } else {
            echo "failed";
        }

    }
    else {
        echo '<tr> 
            <form action="new.php" method="post">
                <td> <input size=2 type="text" name="STUDENT_ID" value="" readonly></td> 
                <td> <input size=2 type="text" name="CLASS_ID" value="" required> </td> 
                <td> <input size=2 type="text" name="FAMILY_ID" value="" required> </td> 
                <td> <input type="text" name="NAME" value="" required> </td> 
                <td> <input type="text" name="ADDRESS" value="" required></td> 
                <td> <input type="text" name="MEDICAL_INFO" value=""></td> 
                <td> <input type="submit" name="submit" value="Create"></td>
            </form>
        </tr>';
    }
?>