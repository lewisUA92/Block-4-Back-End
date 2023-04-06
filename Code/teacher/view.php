<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="../dropSelect.js"></script>
</head>
<body>
    <a href="../index.html">Home</a><br>
    <select name="tables" id="tables">
        <option value="parent">parent</option>
        <option value="teacher" selected>teacher</option>
        <option value="student">student</option>
        <option value="class">class</option>
        <option value="family">family</option>
    </select>
    <table border="1" cellspacing="4" cellpadding="4" id="table"> 
      <tr> 
          <td> TEACHER_ID </td> 
          <td> CLASS_ID </td> 
          <td> NAME </td> 
          <td> ADDRESS </td> 
          <td> EMAIL </td>
          <td> PHONE_NUMBER </td> 
          <td> SALARY </td> 
          <td> BACKGROUND_CHECK </td> 
          <td> Update/Delete </td> 
      </tr>
</body>
</html>

<?php
    $database = mysqli_connect("localhost", "root", "", "ra");

    $sql = "SELECT * FROM teacher";

    $result= mysqli_query($database, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $updateButton= '<form action="update.php" method="post" style="margin-bottom: 0px;">
                            <input type="hidden" name="TEACHER_ID" value="'.$row["TEACHER_ID"].'">
                            <input type="submit" value="Update/Delete">
                        </form>';
        echo '<tr> 
                  <td>'.$row["TEACHER_ID"].'</td> 
                  <td>'.$row["CLASS_ID"].'</td> 
                  <td>'.$row["NAME"].'</td> 
                  <td>'.$row["ADDRESS"].'</td> 
                  <td>'.$row["EMAIL"].'</td> 
                  <td>'.$row["PHONE_NUMBER"].'</td> 
                  <td>'.$row["SALARY"].'</td> 
                  <td>'.$row["BACKGROUND_CHECK"].'</td> 
                  <td>'.$updateButton.'</td>
                    
              </tr>';
        
    }
    echo "</table>";
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

