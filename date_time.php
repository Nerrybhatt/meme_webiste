
<?php

//  $file = fopen("filee.txt", "a");

 
// //  $readData = fread($file);
// // $readfile()
// // $file = readfile("top.html");
// // fwrite($file, "\n this is the php code!");
// // fwrite($file, "hello how are you");
// // fclose($file);
// fwrite($file, "\n hello  file append success");

// fclose($file);
// echo "fill successfully!";

 $fileName= fopen("filee.txt","r");

// echo fgets($fileName);
// echo fgets($fileName);

//  echo fgetc($fileName);
 while($a = fgetc($fileName)){
    echo $a;
    if( $a == "." )
    { 
        
    break;

    }

 }




?>


