

    <?php

/*    /* Attempt MySQL server connection. Assuming you are running MySQL

    server with default setting (user 'root' with no password) */

    $link = mysqli_connect("localhost", "root", "");

     

    // Check connection

    if($link === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }

     

    // Attempt create database query execution

    $sql = "CREATE DATABASE project CHARACTER SET utf8 COLLATE utf8_unicode_ci;";

    if(mysqli_query($link, $sql)){

        echo "Database created successfully";

    } else{

        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

    }

    // mysqli_close($link);  

     //ENTER THE RELEVANT INFO BELOW*/
// Name of the file
$filename = 'install_setup.sql';
// MySQL host

// Connect to MySQL server
$conn = mysqli_connect("localhost","root","","project") or die("Connection failed: " . mysqli_connect_error()); //host , user,pass,database
if (!$conn) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

// Temporary variable, used to store current query
$fp = file('install_setup.sql', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$query = '';
foreach ($fp as $line) {
    if ($line != '' && strpos($line, '--') === false) {
        $query .= $line;
        if (substr($query, -1) == ';') {
            
             mysqli_query($conn,$query);
            $query = '';
        }
    }
}
 echo "Tables imported successfully";
?>

   
