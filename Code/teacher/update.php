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
        <td> TEACHER_ID </td> 
        <td> CLASS_ID </td> 
        <td> NAME </td> 
        <td> ADDRESS </td> 
        <td> EMAIL </td> 
        <td> PHONE_NUMBER </td> 
        <td> SALARY </td> 
        <td> BACKGROUND_CHECK </td>
        <td> Update </td> 
        <td> Delete </td>  
    </tr>
    
</body>
</html>

<?php
    $database = mysqli_connect("localhost", "root", "", "ra");

    if (isset($_POST["submit-delete"])){
        $teacherId= $_POST["TEACHER_ID"];
        $sql = "DELETE FROM teacher WHERE TEACHER_ID = $teacherId";

        $result= mysqli_query($database, $sql); 
        if ($result) {
            header("Location: view.php");
            
        } else {
            echo "failed";
        }
    }
    else if (isset($_POST["submit-update"])) {        
        $teacherId= $_POST["TEACHER_ID"];
        $classId= $_POST["CLASS_ID"];
        $name= $_POST["NAME"];
        $address= $_POST["ADDRESS"];
        $email= $_POST["EMAIL"];
        $phoneNumber= $_POST["PHONE_NUMBER"];
        $salary= $_POST["SALARY"];
        $backgroundCheck= $_POST["BACKGROUND_CHECK"];

        if ($backgroundCheck == "on") {
            $backgroundCheck = 1;
        } else {
            $backgroundCheck = 0;
        }

        $sql = "UPDATE teacher SET CLASS_ID = $classId, NAME = '$name', ADDRESS = '$address', EMAIL = '$email', PHONE_NUMBER = '$phoneNumber', SALARY = $salary, BACKGROUND_CHECK = $backgroundCheck WHERE TEACHER_ID = $teacherId";
        $result= mysqli_query($database, $sql);

        if ($result) {
            header("Location: view.php");
            
        } else {
            echo "failed";
        }
        
    } else{
        $sql = "SELECT * FROM teacher WHERE TEACHER_ID = ".$_POST["TEACHER_ID"];

        $result= mysqli_query($database, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            
            echo '<tr> 
                <form action="update.php" method="post">
                    <td> <input size=2 type="text" name="TEACHER_ID" value="'.$row["TEACHER_ID"].'" readonly></td> 
                    <td> <input size=2 type="text" name="CLASS_ID" value="'.$row["CLASS_ID"].'" required> </td> 
                    <td> <input type="text" name="NAME" value="'.$row["NAME"].'" required> </td> 
                    <td> <input type="text" name="ADDRESS" value="'.$row["ADDRESS"].'" required></td> 
                    <td> <input type="email" name="EMAIL" value="'.$row["EMAIL"].'" required></td> 
                    <td> <input type="tel" name="PHONE_NUMBER" value="'.$row["PHONE_NUMBER"].'"></td> 
                    <td> <input size=5 type="text" name="SALARY" value="'.$row["SALARY"].'"></td>';
                    if ($row["BACKGROUND_CHECK"]){
                       echo '<td> <input type="checkbox" name="BACKGROUND_CHECK" checked=checked></td>';
                    } else {
                       echo '<td> <input type="checkbox" name="BACKGROUND_CHECK"></td>';
                        
                    }
            echo '<td> <input type="submit" name="submit-update" value="Update"></td>
                <td> <input type="submit" name="submit-delete" value="Delete"></td>
                </form>
            </tr>';
            
        }
    }
    mysqli_close($database);
?>