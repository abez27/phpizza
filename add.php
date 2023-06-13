<?php 

$email = $title = $ingredients = '';
$errors = array('email' => '', 'title' => '', 'ingredients' => '');


    if(isset($_POST['submit'])){
        // echo htmlspecialchars($_POST['email']);
        // echo htmlspecialchars($_POST['title']);
        // echo htmlspecialchars($_POST['ingredients']);

        // Validate Email
        if(empty($_POST['email'])){
            $errors['email'] = 'An email is required <br />';
        }else{
            $email = $_POST['email'];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
               $errors['email'] = 'Email must be a valid email address <br />'; 
            }
        }

        // Validate Title
        if(empty($_POST['title'])){
            $errors['title'] = 'An Title is required' . '<br />';
        }else{
            $title = $_POST['title'];
            if(!preg_match('/^[A-Za-z\s]+$/',$title)){
                $errors['title'] = 'Characters must be letters and spaces only. <br />';
            }
        }

        // Validate Ingredients
        if(empty($_POST['ingredients'])){
            $errors['ingredients'] = 'An Ingredients is required <br />';
        }else{
            $ingredients = $_POST['ingredients'];
            if(!preg_match('/^[A-Za-z\s]+(,[A-Za-z\s]+)*$/',$ingredients)){
                $errors['ingredients'] = 'Ingredients must be a commas separated list. <br />';
            }
        }        
    
    if(array_filter($errors)){
        echo 'errors in the form';
    }else{
        header('Location: index.php');
    }    


    }

?>
<?php include('template_part/header.php'); ?>
<section class="container grey-text">
 <h4 class="center">Add a Pizza</h4>

 <form action="" class="white" action="add.php" method="POST">
    <label for="email">Your Email:</label>
    <div class="red-text"><?php echo $errors['email'];?></div>
    <input type="text" name="email" value="<?php echo $email; ?>">
    <label for="title">Pizza Title:</label>
    <div class="red-text"><?php echo $errors['title'];?></div>    
    <input type="text" name="title" value="<?php echo $title; ?>">
    <label for="ingredients">Ingredients (Separated by comma) </label>
    <div class="red-text"><?php echo $errors['ingredients'];?></div>    
    <input type="text" name="ingredients" value="<?php echo $ingredients; ?>">
    <div class="center">
        <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
    </div>
 </form>
</section>
<?php include('template_part/footer.php'); ?>