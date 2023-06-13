<?php 

// Connect to database

$conn = mysqli_connect('localhost', 'abez27', 'password', 'ninja_pizza');

// Check connection

if(!$conn){
    echo 'Connection error: ' . mysqli_connect_error();
}

?> 

<?php include('template_part/header.php'); ?>




<?php include('template_part/footer.php'); ?>





