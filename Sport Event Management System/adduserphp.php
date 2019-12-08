<?php
          $conn=mysqli_connect("localhost","root","") or die (mysql_error());
          mysqli_select_db($conn,"sportevent") or die(mysql_error());
        
          if(isset($_POST['submit']))
          {
              $registration=$_POST['reg'];
              $name=$_POST['name'];
              $dept=$_POST['dept'];
              $year=$_POST['year'];
              $pass=$_POST['pass'];
              $phone=$_POST['phone'];
              $mail=$_POST['mail'];
              
              $query="insert into addusertable (registration, name, dept, year, pass, phone, mail) values ('$registration', '$name', '$dept', '$year', '$pass', '$phone', '$mail')";
            
              if(mysqli_query($conn,$query))
              {
                  echo "<script> alert('registration Successful') </script>";
              }
              else
              {
                  echo "<script> alert('registration Failure') </script>";
              }
          }
        ?>
