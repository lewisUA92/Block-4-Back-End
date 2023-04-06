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
        <td> Create </td> 
    </tr>
    
</body>
</html>

<?php

    if (isset($_POST["submit"])) {
        $database = mysqli_connect("localhost", "root", "", "ra");
        // $teacherId= $_GET["TEACHER_ID"];
        $classId= $_POST["CLASS_ID"];
        $capacity= $_POST["CAPACITY"];

        $sql= "INSERT INTO class (CAPACITY) VALUES ($capacity)";

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
                <td> <input size=2 type="text" name="CLASS_ID" value="" readonly></td> 
                <td> <input size=2 type="text" name="CAPACITY" value="" required> </td> 
                <td> <input type="submit" name="submit" value="Create"></td>
            </form>
        </tr>';
    }
?>