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
        <td> PARENT_ID </td> 
        <td> FAMILY_ID </td> 
        <td> NAME </td> 
        <td> ADDRESS </td> 
        <td> Create </td> 
    </tr>
    
</body>
</html>

<?php

    if (isset($_POST["submit"])) {
        $database = mysqli_connect("localhost", "root", "", "ra");
        $familyId= $_POST["FAMILY_ID"];
        $name= $_POST["NAME"];
        $address= $_POST["ADDRESS"];
        $sql= "INSERT INTO parent (FAMILY_ID,NAME, ADDRESS) VALUES ($familyId, '$name', '$address')";

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
                <td> <input size=2 type="text" name="PARENT_ID" value="" readonly></td> 
                <td> <input size=2 type="text" name="FAMILY_ID" value="" required></td> 
                <td> <input type="text" name="NAME" value="" required> </td> 
                <td> <input type="text" name="ADDRESS" value="" required></td> 
                <td> <input type="submit" name="submit" value="Create"></td>
            </form>
        </tr>';
    }
?>