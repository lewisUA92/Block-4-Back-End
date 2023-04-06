<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
    <script src="../dropSelect.js"></script>
</head>
<body>
    <a href="../index.html">Home</a><br>
    <select name="tables" id="tables">
        <option value="parent">parent</option>
        <option value="teacher">teacher</option>
        <option value="student">student</option>
        <option value="class" selected>class</option>
        <option value="family">family</option>

    </select>
    <table border="1" cellspacing="4" cellpadding="4" id="table"> 
      <tr> 
          <td> CLASS_ID </td>  
          <td> CAPACITY </td> 
          <td> Update/Delete </td> 
      </tr>
</body>
</html>

<?php
    $database = mysqli_connect("localhost", "root", "", "ra");

    $sql = "SELECT * FROM class";

    $result= mysqli_query($database, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        // $updateButton= '<a href="update.php?TEACHER_ID='.$row["TEACHER_ID"].'">Update/Delete</a>';
        $updateButton= '<form action="update.php" method="post" style="margin-bottom: 0px;">
                            <input type="hidden" name="CLASS_ID" value="'.$row["CLASS_ID"].'">
                            <input type="submit" value="Update/Delete">
                        </form>';
        echo '<tr> 
                <td>'.$row["CLASS_ID"].'</td> 
                <td>'.$row["CAPACITY"].'</td> 
                <td>'.$updateButton.'</td>
              </tr>';
    }
    echo "</table>";
    // $newButon= '<a href="new.php">New</a>';
    // echo $newButon;
    
        mysqli_close($database);
?>
<html>
    <body>
        <form action="new.php" method="post">
            <input type="submit" value="New">
        </form>
    </body>
</html>


<!-- <td><a href="update.php?TEACHER_ID='.$row["TEACHER_ID"].'">Update</a></td> -->

