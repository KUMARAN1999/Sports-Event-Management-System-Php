<?php
          $conn=mysqli_connect("localhost","root","") or die (mysql_error());
          mysqli_select_db($conn,"sportevent") or die(mysql_error());
        
          if(isset($_POST['submit']))
          {
              $registration=$_POST['reg'];
              $name=$_POST['name'];
              $dept=$_POST['dept'];
              $year=$_POST['year'];
              $sport=$_POST['sport'];
              
              $query="insert into result (registration, name, dept, year, sport) values ('$registration', '$name', '$dept', '$year', '$sport')";
            
              if(mysqli_query($conn,$query))
              {
                  echo "<script> alert('update Successful') </script>";
              }
              else
              {
                  echo "<script> alert('update Failure') </script>";
              }
          }
        ?>
