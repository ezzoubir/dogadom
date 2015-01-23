<?php
  session_start();
  
  if(isset($_GET['logoff']))
      unset($_SESSION['admin']);
      
  include '../includes/config.php';

  
    if(isset($_POST['LOGIN_FORM_ENVOYER']))
    {
        if(($_POST['FORM_LOGIN']==LOGIN_ADMIN && md5($_POST['FORM_PASSWORD'])==PASSWORD_ADMIN)||($_POST['FORM_LOGIN']==LOGIN_SUPER_ADMIN && md5($_POST['FORM_PASSWORD'])==PASSWORD_SUPER_ADMIN))
        {
            $_SESSION['admin']=true;
            header('LOCATION:index.php');
        }
        else
        {
            $erreur='Erreur sur l\'identifiant et/ou le mot de passe';
            unset($_SESSION['admin']);
        }
        
    
    }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Administration</title>
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="login/css/style.css" />
    <script src="login/js/modernizr.custom.63321.js"></script>
    <!--[if lte IE 7]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
    <style>
      @import url(http://fonts.googleapis.com/css?family=Ubuntu:400,700);
      body {
        background: #563c55 url(login/images/blurred.jpg) no-repeat center top;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        background-size: cover;
      }
      .container > header h1,
      .container > header h2 {
        color: #fff;
        text-shadow: 0 1px 1px rgba(0,0,0,0.7);
      }
    </style>
</head>
<body>
<div class="container">
       <header>     
        <h1>Administration / Site internet</h1>
      </header>
      
      <section class="main">
        <?php
          if(isset($erreur))
          {
            ?>
              <div style="color:red;margin-bottom:15px;"><?php echo $erreur; ?></div>
            <?php
          }
        ?>
        <form class="form-3">
            <p class="clearfix">
                <label for="login">Username</label>
                <input type="text" name="FORM_LOGIN" id="login" placeholder="Username">
            </p>
            <p class="clearfix">
                <label for="password">Password</label>
                <input type="password" name="FORM_PASSWORD" id="password" placeholder="Password"> 
            </p>
            <p class="clearfix">
                <label for="remember"></label>
            </p>
            <p class="clearfix">
                <input type="submit" name="LOGIN_FORM_ENVOYER" value="Sign in">
            </p>       
        </form>​
      </section>
      
        </div>
</body>
</html>
