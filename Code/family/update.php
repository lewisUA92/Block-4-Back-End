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
        <td> Update </td> 
        <td> Delete </td>  
    </tr>
    
</body>
</html>

<?php
    $database = mysqli_connect("localhost", "root", "", "ra");

    if (isset($_POST["submit-delete"])){
        $familyId= $_POST["FAMILY_ID"];
        $sql = "DELETE FROM family WHERE FAMILY_ID = $familyId";

        $result= mysqli_query($database, $sql); 
        if ($result) {
            header("Location: view.php");
            
        } else {
            echo "failed";
        }
    }
    else if (isset($_POST["submit-update"])) {        
        $familyId= $_POST["FAMILY_ID"];
        $email= $_POST["EMAIL"];
        $phoneNumber= $_POST["PHONE_NUMBER"];

        $sql = "UPDATE family SET EMAIL = '$email', PHONE_NUMBER = '$phoneNumber' WHERE FAMILY_ID = $familyId";
        $result= mysqli_query($database, $sql);

        if ($result) {
            header("Location: view.php");
            
        } else {
            echo "failed";
        }
        
    } else{
        $sql = "SELECT * FROM family WHERE FAMILY_ID = ".$_POST["FAMILY_ID"];

        $result= mysqli_query($database, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            
            echo '<tr> 
                <form action="update.php" method="post">
                    <td> <input size=2 type="text" name="FAMILY_ID" value="'.$row["FAMILY_ID"].'" readonly> </td> 
                    <td> <input type="email" name="EMAIL" value="'.$row["EMAIL"].'" required></td> 
                    <td> <input type="tel" name="PHONE_NUMBER" value="'.$row["PHONE_NUMBER"].'"></td> 
                    <td> <input type="submit" name="submit-update" value="Update"></td>
                    <td> <input type="submit" name="submit-delete" value="Delete"></td>
                </form>
            </tr>';
            
        }
    }
    mysqli_close($database);
?>