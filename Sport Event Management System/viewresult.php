<!doctype html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <title>database connections</title>
    </head>
    <body>
      <?php
      $username = "root";
      $password = "";
      $host = "localhost";

      $connector = mysqli_connect($host,$username,"") or die("Unable to connect");
        echo "<script> alert('successfully fetched results'); </script>";
      $selected = mysqli_select_db($connector,"sportevent")
        or die("Unable to connect");

      //execute the SQL query and return records
      $result = mysqli_query($connector,"SELECT * FROM result ");
      ?>
      <table border="2" style= "background-color: #FFFFFF; color: #761a9b; margin: 0 auto;" >
      <thead>
        <tr>
          <th>REGISTRATION NUMBER</th>
          <th>NAME OF THE STUDENT</th>
          <th>DEPARTMENT</th>
          <th>YEAR OF STUDY</th>
          <th>SPORT</th>
          
        </tr>
      </thead>
      <tbody>
        <?php
          while( $row = mysqli_fetch_assoc( $result ) ){
            echo
            "<tr><td>{$row['registration']}</td><td>{$row['name']}</td><td>{$row['dept']}</td><td>{$row['year']}</td><td>{$row['sport']}</td></tr>\n";
          }
        ?>
      </tbody>
    </table>
     
    </body>
    </html>