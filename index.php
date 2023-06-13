<?php 

// Connect to database

$conn = mysqli_connect('localhost', 'abez27', 'password', 'ninja_pizza');

// Check connection

if(!$conn){
    echo 'Connection error: ' . mysqli_connect_error();
}

// Get all data for pizza

$sql = 'SELECT title, ingredients, id FROM tbl_pizzas ORDER BY created_at';

// make query and get result

$result = mysqli_query($conn, $sql);

//Fetch the resulting rows

$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

//free result from memory
mysqli_free_result($result);

// close connection

mysqli_close($conn);

// print_r($pizzas);


// print_r(explode(',', $pizzas[0]['ingredients']));


?> 

<?php include('template_part/header.php'); ?>

<h4 class="center grey-text">Pizzas</h4>

<div class="container">
   <div class="row">
    <?php foreach($pizzas as $pizza){ ?>
        <div class="col s6 md3">
            <div class="card z-depth-0">
                <div class="card-content center">
                    <h6><?php echo htmlspecialchars($pizza['title']);?></h6>
                    <ul>
                        <?php foreach(explode(',', $pizza['ingredients'])as $ing){?>
                            <li><?php echo htmlspecialchars($ing) ;?></li>
                        <?php }?>
                    </ul>
                </div>
                <div class="card-action right-align">
                    <a href="" class="brand-text">More Info</a>
                </div>
            </div>
        </div>
    <?php }?>
   </div> 
</div>


<?php include('template_part/footer.php'); ?>





