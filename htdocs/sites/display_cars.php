<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

<?php
 
 // Initializing curl
 $curl = curl_init();
    
 // Sending GET request to reqres.in
 // server to get JSON data
 curl_setopt($curl, CURLOPT_URL,
     "http://localhost:8080/api/read_single_car.php?id=1");
    
 // Telling curl to store JSON
 // data in a variable instead
 // of dumping on screen
 curl_setopt($curl,
     CURLOPT_RETURNTRANSFER, true);
    
 // Executing curl
 $response = curl_exec($curl);
  
 // Checking if any error occurs
 // during request or not
 if($e = curl_error($curl)) {
     echo $e;
 } else {
      
     // Decoding JSON data
     $decodedData =
         json_decode($response, true);
          
     // Outputting JSON data in
     // Decoded form
     var_dump($decodedData);
 }
  
 // Closing curl
 curl_close($curl);
 ?>

</body>

</html>