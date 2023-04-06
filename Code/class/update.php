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
        <td> CLASS_ID </td> 
        <td> CAPACITY </td> 
        <td> Update </td> 
        <td> Delete </td>  
    </tr>
    
</body>
</html>

<?php
    $database = mysqli_connect("localhost", "root", "", "ra");

    if (isset($_POST["submit-delete"])){
        $classId= $_POST["CLASS_ID"];
        $sql = "DELETE FROM class WHERE CLASS_ID = $classId";

        $result= mysqli_query($database, $sql); 
        if ($result) {
            header("Location: view.php");
            
        } else {
            echo "failed";
        }
    }
    else if (isset($_POST["submit-update"])) {        
        $classId= $_POST["CLASS_ID"];
        $capacity= $_POST["CAPACITY"];

        $sql = "UPDATE class SET CAPACITY = $capacity WHERE CLASS_ID = $classId";
        $result= mysqli_query($database, $sql);

        if ($result) {
            header("Location: view.php");
            
        } else {
            echo "failed";
        }
        
    } else{
        $sql = "SELECT * FROM class WHERE CLASS_ID = ".$_POST["CLASS_ID"];

        $result= mysqli_query($database, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            
            echo '<tr> 
                <form action="update.php" method="post">
                <td> <input size=2 type="text" name="CLASS_ID" value="'.$row["CLASS_ID"].'" readonly> </td>    
                    <td> <input size=2 type="text" name="CAPACITY" value="'.$row["CAPACITY"].'" required></td> 
                <td> <input type="submit" name="submit-update" value="Update"></td>
                <td> <input type="submit" name="submit-delete" value="Delete"></td>
                </form>
            </tr>';
            
        }
    }
    mysqli_close($database);
?>