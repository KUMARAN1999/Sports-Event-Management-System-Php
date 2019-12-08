<?php
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="sportevent";
    $registration=$_POST['reg'];
    
    $conn=new mysqli($servername,$username,$password,$dbname);
    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
    $sql="DELETE from register where registration='{$registration}'";
    if ($conn->query($sql) == TRUE) {
    echo "<script>alert('deleted successfully');</script>";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>