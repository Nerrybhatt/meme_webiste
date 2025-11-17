<?php
session_start();


if(isset($_SESSION['uname'])){
    
echo "Welcome"." ".$_SESSION['uname'];
echo "Your address is "." ".$_SESSION['Address'];

}
else{
    echo "Please login first";
}

?>