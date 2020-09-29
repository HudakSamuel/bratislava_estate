<?php include_once("../../path.php"); 
      include_once(ROOT_PATH . "/backend/UserController.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="styles_login.css" type="text/css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">     
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>    
        
        <title>Login</title>
    </head>

    <body>
        <!------------NAVBAR------------>
        <?php include(ROOT_PATH . "/frontend/shared_html/navbar.php"); ?>

        

        <!------------BANNER------------>
        <section class="banner">
            <div class="banner-image">
                <div class="wrapper">
                    <h1>Login</h1>
                </div>
            </div>
        </section>



        <!------------LOGIN------------>
        <section class="login">

            <div class="container login-form-container">

                <form action="<?php UserController::userLogin(); ?>" method="post">

                    <?php if(count($errors,1) > 4): ?>
                        <div class="invalid-login">
                            <p>Nesprávne meno alebo heslo</p>
                        </div>
                    <?php endif; ?>
                    
                    <div class="header">
                        <h2>Vitajte späť</h2>
                        <a href="../register/register.php">Nemáte účet?</a>
                    </div>

                    <div class="body login-form-container-wrapper">
                        <label class="input-label" for="user">Uživatelské meno</label>
                        <input type="text" name="user" placeholder="PROSÍM NAPÍŠTE UŽIVATELSKÉ MENO"><br>

                        <label class="input-label" for="pass">Heslo</label>
                        <input  type="password" name="pass" placeholder="PROSÍM NAPÍŠTE VAŠE HESLO"><br>

                        <input class="submit-button"  type="submit" name="login-btn" value="Prihásiť sa">
                    </div>
                

                    <div class="footer login-form-container-wrapper">
                        <button><a href="#">Prihásiť sa ako hosť</a></button>
                    </div>
                </form>
            </div>
        </section>

        <!------------FOOTER------------>
        <?php include(ROOT_PATH . "/frontend/shared_html/footer.php"); ?>

        <script src="../shared_js/open_menu.js"></script> 
    </body>
</html>