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
        <td> FAMILY_ID </td> 
        <td> EMAIL </td> 
        <td> PHONE_NUMBER </td> 
        <td> Create </td> 
    </tr>
    
</body>
</html>

<?php

    if (isset($_POST["submit"])) {
        $database = mysqli_connect("localhost", "root", "", "ra");
        $email= $_POST["EMAIL"];
        $phoneNumber= $_POST["PHONE_NUMBER"];

        $sql= "INSERT INTO FAMILY (EMAIL, PHONE_NUMBER) VALUES ('$email', '$phoneNumber')";

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
                <td> <input size=2 type="text" name="FAMILY_ID" value="" readonly></td> 
                <td> <input type="email" name="EMAIL" value="" required></td> 
                <td> <input type="tel" name="PHONE_NUMBER" value="" required></td> 
                <td> <input type="submit" name="submit" value="Create"></td>
            </form>
        </tr>';
    }
?>