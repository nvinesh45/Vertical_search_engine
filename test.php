<?php
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '**********';
   
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   
   $sql = 'SELECT recipe_id, title, url FROM recipes';
   mysql_select_db('PROJECT_DB');
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   
   while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
      echo "recipe ID :{$row['recipe_id']}  <br> ".
         "title : {$row['title']} <br> ".
         "url : {$row['url']} <br> ".
         "--------------------------------<br>";
   }
   
   echo "Fetched data successfully\n";
   
   mysql_close($conn);
?>