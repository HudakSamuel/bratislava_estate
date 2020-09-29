<?php include_once("../../path.php"); 
      include_once(ROOT_PATH . "/backend/UserController.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="styles_register.css" type="text/css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">     
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>    

        <title>Registrácia</title>
    </head>

    <body>
        <!------------NAVBAR------------>
        <?php include(ROOT_PATH . "/frontend/shared_html/navbar.php"); ?>

        

        <!------------BANNER------------>
        <section class="banner">
            <div class="banner-image">
                <div class="wrapper">
                    <h1>Registrácia</h1>
                </div>
            </div>
        </section>



        <!------------REGISTER------------>
        <section class="register">
            <div class="container login-form-container">
                
                <div class="body">
                    <form class="login-form-container-wrapper" action="<?php UserController::userRegistration(); ?>" method="post">
                        <div class="form-control">
                            <label class="input-label" for="user">Uživatelské meno</label>
                            <input id="username" type="text" name="user" placeholder="PROSÍM NAPÍŠTE UŽIVATELSKÉ MENO" oninput="userNameControl();"><br>
                            
                            <!-- creates server side error messages -->
                            <?php $nameErrors = array(); ?>
                            <?php $nameErrors = array_slice($errors,0,1); ?>
                            <?php $keys = array_keys($nameErrors); ?>
                            <?php if (count($nameErrors) > 0): ?>
                                <?php for($i = 0; $i < count($nameErrors); $i++): ?>
                                    <?php foreach ($nameErrors[$keys[$i]] as $key => $value): ?>
                                        <small class="php-validation-user-error"><?php echo $value; ?></small>
                                    <?php endforeach ?>
                                <?php endfor ?>
                            <?php endif ?>
                        </div>

                        <div class="form-control">
                            <label class="input-label" for="email">E-mail</label>
                            <input id="mail" type="email" name="email" placeholder="PROSÍM NAPÍŠTE E-MAIL" oninput="emailControl();"><br>

                            <!-- creates server side error messages -->
                            <?php $emailErrors = array(); ?>
                            <?php $emailErrors = array_slice($errors,1,1); ?>
                            <?php $keys = array_keys($emailErrors); ?>
                            <?php if (count($emailErrors) > 0): ?>
                                <?php for($i = 0; $i < count($emailErrors); $i++): ?>
                                    <?php foreach ($emailErrors[$keys[$i]] as $key => $value): ?>
                                        <small class="php-validation-email-error"><?php echo $value; ?></small>
                                    <?php endforeach ?>
                                <?php endfor ?>
                            <?php endif ?>
                        </div>
                        
                        <div class="form-control">
                            <label class="input-label" for="pass">Heslo</label>
                            <input id="password" type="password" name="pass" placeholder="PROSÍM NAPÍŠTE VAŠE HESLO" oninput="passwordControl();"><br>

                            <!-- creates server side error messages -->
                            <?php $passwordErrors = array(); ?>
                            <?php $passwordErrors = array_slice($errors,2,1); ?>
                            <?php $keys = array_keys($passwordErrors); ?>
                            <?php if (count($passwordErrors) > 0): ?>
                                <?php for($i = 0; $i < count($passwordErrors); $i++): ?>
                                    <?php foreach ($passwordErrors[$keys[$i]] as $key => $value): ?>
                                        <small class="php-validation-password-error"><?php echo $value; ?></small>
                                    <?php endforeach ?>
                                <?php endfor ?>
                            <?php endif ?>
                        </div>
                        
                        <div class="form-control">
                            <label class="input-label" for="passConf">Potvrdenie hesla</label>
                            <input id="passwordConf" type="password" name="passConf" placeholder="PROSÍM ZOPAKUJTE HESLO" oninput="passwordConfControl();"><br>

                            <!-- creates server side error messages -->
                            <?php $passwordConfErrors = array(); ?>
                            <?php $passwordConfErrors = array_slice($errors,3,1); ?>
                            <?php $keys = array_keys($passwordConfErrors); ?>
                            <?php if (count($passwordConfErrors) > 0): ?>
                                <?php for($i = 0; $i < count($passwordConfErrors); $i++): ?>
                                    <?php foreach ($passwordConfErrors[$keys[$i]] as $key => $value): ?>
                                        <small class="php-validation-passwordConf-error"><?php echo $value; ?></small>
                                    <?php endforeach ?>
                                <?php endfor ?>
                            <?php endif ?>
                        </div>
                        
                        <input class="submit-button" type="submit"  name="create" value="Registrovať">
                    </form>
                </div>
            </div>
        </section>

        <!------------FOOTER------------>
        <?php include(ROOT_PATH . "/frontend/shared_html/footer.php"); ?>

        <script src="../shared_js/open_menu.js"></script> 
        <script src="input_control.js"></script> 
    </body>
</html>