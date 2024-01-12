<?php

$conn = new mysqli("Localhost", "root", "", "photofolio");

if($conn){
    echo 'hello';
}else{
    die(mysqli_error($conn));
}
if(isset($_POST['btn'])){
    $insert = $_POST['insert'];

    $sqq = "INSERT INTO `about`(`about_column`)
    VALUE('$insert')";

    $result = mysqli_query($conn, $sqq);
    if($result){
        echo"<script>
                alert('categories added succesfully...');
                window.location = 'insert_about.php';
                </script>";
    }
    else{
        die(mysqli_error($conn));
    }
}





if(isset($_POST['result'])){
    $search = $_POST['result'];


    // $sql = "SELECT * FROM  about LIKE '%$search'";
    $sql = "SELECT * FROM  about  WHERE `about_column` LIKE '%$search";

    $res = $conn->query($sql);
    
    if($res->num_rows > 0){
        while($row = $res->fetch_assoc()){
            echo '<p>'.$row['about_column'].'</p>';
        }
    }else{
        echo 'mmessage';
    }

}
$conn->close();

?>