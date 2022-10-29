<?php
// Ceck if User Coming From A Request
if($_SERVER['REQUEST_METHOD']=='POST'){
       // Assign Variables
       $user = filter_var($_POST['username'],FILTER_SANITIZE_STRING);
       $mail = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
       $cell = filter_var($_POST['cellphone'],FILTER_SANITIZE_NUMBER_INT);  
       $msg  = filter_var($_POST['message'],FILTER_SANITIZE_STRING);
      // $userError ='';
      // $msgError='';
  
/*
       if (strlen($user)<=3){
              $userError='Username Must Be larger Than 3 Characters';
       }

       if (strlen($msg)<20){
              $msgError='Message Can\'t be less Than 10 Charaters ';
       }
*/


       // Creating Array of Errors
       $formErrors= array();
       if(strlen($user)<=3){
              $formErrors[]='Username Must Be larger Than <strong>3</strong> Characters';
       }

       if(strlen($msg)<=15){
              $formErrors[]='Message Can\'t be less Than 10 Charaters ';
       }

       // IF no Errors Send The Email [ mail( To , Subject , message , Header , parametres)]

       $header ='Form: '. $mail . '\r\n';

       if(empty($formErrors)){
              mail('abdullah.s.obad@gmail.com', 'Contact Form', $msg , $header);

              $user='';
              $mail='';
              $cell='';
              $msg ='';

              $success = '<div class="alert alert-success">We Have Recieved Your message</div>';
       }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Contact-form</title>
       <!-- CSS only bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<!-- font awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></body>   
<!-- link css -->
<link rel="stylesheet" href="css/main.css">
<!-- Google fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lilita+One&family=Roboto:wght@300;400&display=swap" rel="stylesheet"><link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lilita+One&family=Roboto:wght@300;400&display=swap" rel="stylesheet">
</head>
<body>

<div class="container">
       <h1 class="text-centre"> Contact Me</h1>
       <form  calss="contact-form" action="<?php echo $_SERVER['PHP_SELF']?>" method='POST'>
       

       <?php if (! empty($formErrors)) { ?>
        <div class="alert alert-danger alert-dismissible" role="start">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            <?php
                                   foreach($formErrors as $error){
                                          echo $error.'<br>';
                                   }  
                            ?>
       </div>  
                             <?php      }
       ?>
       <?php
       if (isset($success)){
              echo $success;
       }
       ?>
              
          
              <div class="form-group">
                     <input class="username form-control" type="text" name="username" placeholder='Type Your Username' value="<?php if(isset($user)){echo $user; } ?>" />
                            <i class="fa fa-user"></i>
                            <span class="asterisx">*</span>
                            <div class="alert alert-danger custom-alert">
                     Username Must Be larger Than <strong>3</strong> Characters;
                     </div>
              </div>
              <div class="form-group">
                     <input class="email form-control" type="email" name="email" placeholder='Please Type a Valide Email' value="<?php if(isset($mail)){echo $mail; } ?>">
                     <i class="fa fa-envelope"></i>
                     <span class="asterisx">*</span>
                     <div class="alert alert-danger custom-alert">
                     Email Can't Be <strong>Empty</strong>
                     </div>
              </div>
              <input class="form-control" type="text" name="cellphone" placeholder="Type your cellphone" value="<?php if(isset($cell)){echo $cell; } ?>">
              <i class="fa fa-phone" aria-hidden="true"></i>

              <div class="form-group">
              <textarea  class="message form-control" name="message" placeholder="Type your message">
                     <?php if(isset($msg)){echo $msg; } ?>
              </textarea>
              <span class="asterisx">*</span>
              <div class="alert alert-danger custom-alert">
                     Message Can't be less Than 10 Charaters
                     </div>
              </div>
              <input class='btn btn-success' type="submit" value="Send Message" style=" width: 155px;">
              <i class='fa fa-send' aria-hidden="true"></i>
            

       </form>
</div>




<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<script src="js/custom.js"></script>
</html> 