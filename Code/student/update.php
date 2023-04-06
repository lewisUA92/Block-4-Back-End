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
        <td> Update </td> 
        <td> Delete </td>  
    </tr>
    
</body>
</html>

<?php
    $database = mysqli_connect("localhost", "root", "", "ra");

    if (isset($_POST["submit-delete"])){
        $studentId= $_POST["STUDENT_ID"];
        $sql = "DELETE FROM student WHERE STUDENT_ID = $studentId";

        $result= mysqli_query($database, $sql); 
        if ($result) {
            header("Location: view.php");
            
        } else {
            echo "failed";
        }
    }
    else if (isset($_POST["submit-update"])) {        
        $studentId= $_POST["STUDENT_ID"];
        $classId= $_POST["CLASS_ID"];
        $familyId= $_POST["FAMILY_ID"];
        $name= $_POST["NAME"];
        $address= $_POST["ADDRESS"];
        $medicalInfo= $_POST["MEDICAL_INFO"];

        $sql = "UPDATE student SET CLASS_ID = $classId, FAMILY_ID = $familyId, NAME = '$name', ADDRESS = '$address', MEDICAL_INFO = '$medicalInfo' WHERE STUDENT_ID = $studentId";
        $result= mysqli_query($database, $sql);

        if ($result) {
            header("Location: view.php");
            
        } else {
            echo "failed";
        }
        
    } else{
        $sql = "SELECT * FROM student WHERE STUDENT_ID = ".$_POST["STUDENT_ID"];

        $result= mysqli_query($database, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            
            echo '<tr> 
                <form action="update.php" method="post">
                    <td> <input size=2 type="text" name="STUDENT_ID" value="'.$row["STUDENT_ID"].'" readonly></td> 
                    <td> <input size=2 type="text" name="CLASS_ID" value="'.$row["CLASS_ID"].'" required> </td> 
                    <td> <input size=2 type="text" name="FAMILY_ID" value="'.$row["FAMILY_ID"].'" required> </td> 
                    <td> <input type="text" name="NAME" value="'.$row["NAME"].'" required> </td> 
                    <td> <input type="text" name="ADDRESS" value="'.$row["ADDRESS"].'" required></td> 
                    <td> <input type="text" name="MEDICAL_INFO" value="'.$row["MEDICAL_INFO"].'"></td>
                    <td> <input type="submit" name="submit-update" value="Update"></td>
                    <td> <input type="submit" name="submit-delete" value="Delete"></td>
                </form>
            </tr>';
            
        }
    }
    mysqli_close($database);
?>