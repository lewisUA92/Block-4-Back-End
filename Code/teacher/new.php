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
        <td> Create </td> 
    </tr>
    
</body>
</html>

<?php

    if (isset($_POST["submit"])) {
        $database = mysqli_connect("localhost", "root", "", "ra");
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
        };

        $sql= "INSERT INTO teacher (CLASS_ID, NAME, ADDRESS, EMAIL, PHONE_NUMBER, SALARY, BACKGROUND_CHECK) VALUES ($classId, '$name', '$address', '$email', '$phoneNumber', $salary, $backgroundCheck)";

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
                <td> <input size=2 type="text" name="TEACHER_ID" value="" readonly></td> 
                <td> <input size=2 type="text" name="CLASS_ID" value="" required> </td> 
                <td> <input type="text" name="NAME" value="" required> </td> 
                <td> <input type="text" name="ADDRESS" value="" required></td> 
                <td> <input type="email" name="EMAIL" value="" required></td> 
                <td> <input type="tel" name="PHONE_NUMBER" value="" required></td> 
                <td> <input size=5 type="text" name="SALARY" value="" required></td>
                <td> <input type="checkbox" name="BACKGROUND_CHECK" checked=checked></td>
                <td> <input type="submit" name="submit" value="Create"></td>
            </form>
        </tr>';
    }
?>