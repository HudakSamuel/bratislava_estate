<?php 
ob_start();

include_once("../../../path.php"); 
include_once(ROOT_PATH . "/backend/UserController.php");
include_once(ROOT_PATH . "/backend/PropertyController.php");
include_once(ROOT_PATH . "/backend/PropertyView.php");
include_once(ROOT_PATH . "/backend/Utility.php");

$utility = new Utility();
$propertyView = new PropertyView();
$images = $propertyView->getPropertyImages(['property_id' => $savedID]);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="../add/styles_add_property.css?version=51" type="text/css"/>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet"/> 
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet"/>       
        <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet"/> 

        <title>Zmeniť nehnutelnosť</title>
    </head>

    <body>
        
        <!------------NAVBAR_DASHBOARD------------>
        <?php include(ROOT_PATH . "/frontend/shared_html/navbar_dashboard.php"); ?>

        <section class="admin-panel">
            <div class="left-side">
                <h3>Vitaj</h3>
                <h3><?php echo $utility->limitedString($_SESSION['username'],14);  ?></h3>
                <img src="<?php echo BASE_URL . '/images/Profile-Icon.jpg' ?>" />
            </div>
        
            <div class="right-side">
                <div class="return">
                    <a href="<?php echo BASE_URL . "/frontend/dashboard/dashboard.php" ?>"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                    <a href="<?php echo BASE_URL . "/frontend/dashboard/dashboard.php" ?>">Späť</a>
                </div>
                    

                <div class="property-input-container">
                    <form class="property-input-form" action="<?php PropertyController::createPost(); ?>" method="post"enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $savedID ?>"/><br>
                            <div class="form-control">
                                
                            <label class="input-label" for="title">Nadpis</label>
                            <input id="title" type="text" name="title" value="<?php echo $savedTitle ?>"/><br>

                            <!-- creates server side error messages -->
                            <?php $headerErrors = array(); ?>
                            <?php $headerErrors = array_slice($errors,0,1); ?>
                            <?php $keys = array_keys($headerErrors); ?>
                            <?php if (count($headerErrors) > 0): ?>
                                <?php for($i = 0; $i < count($headerErrors); $i++): ?>
                                    <?php foreach ($headerErrors[$keys[$i]] as $key => $value): ?>
                                        <small class="php-validation-user-error"><?php echo $value; ?></small>
                                    <?php endforeach ?>
                                <?php endfor ?>
                            <?php endif ?>
                        </div>
                        

                        <div class="form-control">
                            <label class="input-label" for="body">Popis nehnutelnosti</label>
                            <textarea name="body" id="body"><?php echo $savedBody ?></textarea><br>

                            <!-- creates server side error messages -->
                            <?php $bodyErrors = array(); ?>
                            <?php $bodyErrors = array_slice($errors,1,1); ?>
                            <?php $keys = array_keys($bodyErrors); ?>
                            <?php if (count($bodyErrors) > 0): ?>
                                <?php for($i = 0; $i < count($bodyErrors); $i++): ?>
                                    <?php foreach ($bodyErrors[$keys[$i]] as $key => $value): ?>
                                        <small class="php-validation-user-error"><?php echo $value; ?></small>
                                    <?php endforeach ?>
                                <?php endfor ?>
                            <?php endif ?>
                        </div>
                        
                        <label class="input-label" for="type">Typ nehnutelnosti</label>
                        <select name="type">
                            <option value="Dom">Dom</option>
                            <option value="Byt">Byt</option>
                        </select>

                        <label class="input-label" for="purpouse">Typ ponuky</label>
                        <select name="purpouse">
                            <option value="Na prenájom">Na Prenájom</option>
                            <option value="Na predaj">Na predaj</option>
                        </select>

                        <label class="input-label" for="location">Lokalita</label>
                        <select name="location">
                            <option value="Staré mesto">Staré mesto</option>
                            <option value="Nové mesto">Nové mesto</option>
                            <option value="Ružinov">Ružinov</option>
                            <option value="Rusovce">Rusovce</option>
                            <option value="Devínska Nová Ves">Devínska Nová Ves</option>
                            <option value="Záhorská Bystrica">Záhorská Bystrica</option>
                        </select>
                        
                        <ul>
                            <li>
                                <label class="input-label" for="rooms">Počet izieb</label>
                                <input class="rooms" type="number" name="rooms" min="1" max="10" value="<?php echo $savedRooms ?>" required>
                            </li>

                            <li>
                                <label class="input-label" for="bedrooms">Počet spálni</label>
                                <input class="rooms" type="number" name="bedrooms" min="1" max="10" value="<?php echo $savedBedrooms ?>"required>
                            </li>

                            <li>
                                <label class="input-label" for="baths">Počet kúpelní</label>
                                <input class="rooms" type="number" name="baths" min="1" max="10" value="<?php echo $savedBathrooms ?>" required>
                            </li>
                        </ul>

                        <label class="input-label" for="price">Cena/€</label>
                        <input class="price" type="number" name="price" min="1" max="9999999" value="<?php echo $savedPrice ?>" required>

                        <label class="input-label" for="propertyImage">Obrázok</label>
                        <input id="gallery-photo-add" type="file" accept="image/jpeg, image/png" name="propertyImage[]" multiple/>
                        <small class="image-upload-tip">Tip: Je možné nahrať max 4 fotky</small>

                        <!-- creates server side error messages -->
                        <?php $imageErrors = array(); ?>
                        <?php $imageErrors = array_slice($errors,2,1); ?>
                        <?php $keys = array_keys($imageErrors); ?>
                        <?php if (count($imageErrors) > 0): ?>
                            <?php for($i = 0; $i < count($imageErrors); $i++): ?>
                                <?php foreach ($imageErrors[$keys[$i]] as $key => $value): ?>
                                    <small class="php-validation-user-error"><?php echo $value; ?></small>
                                <?php endforeach ?>
                            <?php endfor ?>
                        <?php endif ?>
                        
                        <div class="gallery">
                            <?php foreach($images as $image): ?>
                                <img src="<?php echo BASE_URL . "/user_images/" . $image['name']; ?>"/>
                            <?php endforeach ?>
                        </div>

                        <div class="submit-button">
                            <input type="submit"  name="editPost" value="Potvrdiť">
                        </div>
                        
                    </form>
                </div>
            </div>
        </section>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="../../shared_js/preview_img.js"></script> 
    </body>
</html>
<?php ob_end_flush(); ?>