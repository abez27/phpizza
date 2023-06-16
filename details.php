<?php

include('config/db_connect.php');

    if(isset($_GET['id'])){

        $id = mysqli_real_escape_string($conn, $_GET['id']);

        // make SQL connection

        $sql = "SELECT * FROM tbl_pizzas WHERE id = $id";

        // get result

        $result = mysqli_query($conn, $sql);

        // fet result in array format
        $pizza = mysqli_fetch_assoc($result);

        mysqli_free_result($result);
        mysqli_close($conn);

        print_r($pizza);
    }


?>



<?php include('template_part/header.php');?>




<div class="container center">
<?php if($pizza): ?>
<h4><?php echo htmlspecialchars($pizza['title']);?></h4>
<p>Created by: <?php htmlspecialchars($pizza['email']);?></p>
<p><?php echo date($pizza['created_at']);?></p>
<h5>Ingredients</h5>
<p><?php echo htmlspecialchars($pizza['ingredients']);?></p>
<?php else: ?>

<?php endif; ?>

</div>


<?php include('template_part/footer.php');?>