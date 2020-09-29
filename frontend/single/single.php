<?php include_once("../../path.php"); 
include_once(ROOT_PATH . "/backend/UserController.php");
include_once(ROOT_PATH . "/backend/PropertyView.php");
include_once(ROOT_PATH . "/backend/Utility.php");

$propertyView = new PropertyView();
$property = $propertyView->getProperty(['id' => $_GET['id']]);
$propertyImages = $propertyView->getPropertyImages(['property_id' => $_GET['id']]);
$utility = new Utility();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="styles_single.css" type="text/css"/>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet"/> 
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet"/>       
        <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet"/> 

        <title>Nehnutelnost 1</title>
    </head>

    <body>
        
        <!------------NAVBAR------------>
        <?php include(ROOT_PATH . "/frontend/shared_html/navbar.php"); ?>

        <!------------BANNER------------>
        <section class="banner">
            <div class="banner-image">
                <div class="wrapper">
                    <h1><?php echo $property['title']?></h1>
                </div>
            </div>
        </section>

        <!------------DETAILS------------>
        <section class="property-sheet">
            <div class="property-details">
                <div class="header">
                    <div class="text-box1">
                        <h1><?php echo $property['title']?></h1>
                        <p><?php echo $property['price']?> €</p>
                    </div>

                    <div class="text-box2">
                        <span class="purpouse"><?php echo $property['purpouse']?></span>
                        <span class="type"><?php echo $property['type']?></span>
                    </div>
                </div>

                <div class="image-carousel">
                    <i class="fa fa-chevron-circle-right" id="nextButton" aria-hidden="true"></i>
                    <i class="fa fa-chevron-circle-left" id="prevButton" aria-hidden="true"></i>
                    <div class="image-container">
                        <?php foreach($propertyImages as $image): ?>
                            <img src="<?php echo BASE_URL . "/user_images/" . $image['name']; ?>">
                        <?php endforeach ?>
                    </div>
                </div>

                <div class="description">
                    <h3 class="property-details-h">Property description</h3>
                    <hr class="property-details-hr">
                    <p><?php echo $property['body']?></p>
                </div>

                <div class="overview">
                    <div class="wrapper">
                        <h3 class="property-details-h">Property overview</h3>
                        <hr class="property-details-hr">
                    </div>
                    
                    <ul>
                        <div class="first-half">
                            <li>
                                <div class="wrapper">
                                    <i class="fa fa-caret-right" aria-hidden="true"></i>
                                    <h4>Cena</h4>
                                </div>
                                
                                <span><?php echo $property['price']?></span>
                            </li>

                            <li>
                                <div class="wrapper">
                                    <i class="fa fa-caret-right" aria-hidden="true"></i>
                                    <h4>Typ nehnutelnosti</h4>
                                </div>
                                
                                <span><?php echo $property['type']?></span>
                            </li>

                            <li>
                                <div class="wrapper">
                                    <i class="fa fa-caret-right" aria-hidden="true"></i>
                                    <h4>Typ</h4>
                                </div>

                                <span><?php echo $property['purpouse']?></span>
                            </li>

                            <li>
                                <div class="wrapper">
                                    <i class="fa fa-caret-right" aria-hidden="true"></i>
                                    <h4>Izby</h4>
                                </div>
                                
                                <span><?php echo $property['rooms']?></span>
                            </li>
                        </div>
                        
                        <div class="second-half">
                            <li>
                                <div class="wrapper">
                                    <i class="fa fa-caret-right" aria-hidden="true"></i>
                                    <h4>Spálne</h4>
                                </div>
                                
                                <span><?php echo $property['bedrooms']?></span>
                            </li>

                            <li>
                                <div class="wrapper">
                                    <i class="fa fa-caret-right" aria-hidden="true"></i>
                                    <h4>Kúpelne</h4>
                                </div>
                                
                                <span><?php echo $property['baths']?></span>
                            </li>

                            <li>
                                <div class="wrapper">
                                    <i class="fa fa-caret-right" aria-hidden="true"></i>
                                    <h4>Lokalita</h4>
                                </div>
                                
                                <span><?php echo $property['location']?></span>
                            </li>
                        </div>
                                                
                    </ul>
                </div>
            </div>
           

        </section>

        <!------------FOOTER------------>
        <?php include(ROOT_PATH . "/frontend/shared_html/footer.php"); ?>
        
        <script src="../shared_js/open_menu.js"></script>
        <script src="image_slideshow.js"></script>
    </body>
   
</html>