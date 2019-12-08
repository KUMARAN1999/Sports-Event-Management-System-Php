
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
              $phone=$_POST['phone'];
              $mail=$_POST['mail'];
              
              $query="insert into register (registration, name, dept, year, sport, phone, mail) values ('$registration', '$name', '$dept', '$year', '$sport', '$phone', '$mail')";
            
              if(mysqli_query($conn,$query))
              {
                  echo "<script> alert('registration Successful') </script>";
                  header("location:home_page.html");
                  	$dom = new DOMDocument('1.0','UTF-8');
  $dom->formatOutput = true;

  $root = $dom->createElement('register');
  $dom->appendChild($root);

  $result = $dom->createElement('users');
  $root->appendChild($result);

  $result->setAttribute('id', 1);
  $result->appendChild( $dom->createElement('registration', $registration) );
  $result->appendChild( $dom->createElement('name', $name) );
  $result->appendChild( $dom->createElement('dept', $dept) );
  $result->appendChild( $dom->createElement('year', $year) );
  $result->appendChild( $dom->createElement('sport', $sport) );
                  $result->appendChild( $dom->createElement('phone', $phone) );
                  $result->appendChild( $dom->createElement('mail', $mail) );

  echo '<xmp>'. $dom->saveXML() .'</xmp>';
  $dom->save('C:\Users\user\Desktop\registerkums.xml') or die('XML Create Error');
              }
              else
              {
                  echo "<script> alert('registration Failure') </script>";
              }
          }
        ?>
    