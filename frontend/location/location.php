<?php include_once("../../path.php"); 
include_once(ROOT_PATH . "/backend/UserController.php");
include_once(ROOT_PATH . "/backend/PropertyView.php");
include_once(ROOT_PATH . "/backend/Utility.php");

$propertyView = new PropertyView();
$properties = $propertyView->getProperties(['location' => $_GET['city']]); 
$utility = new Utility();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="../property_list/styles_list.css" type="text/css"/>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet"/> 
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet"/>       
        <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet"/> 

        <title><?php echo $_GET['city']?></title>
    </head>

    <body>
        
        <!------------NAVBAR------------>
        <?php include(ROOT_PATH . "/frontend/shared_html/navbar.php"); ?>

        <!------------BANNER------------>
        <section class="banner">
            <div class="banner-image">
                <div class="wrapper">
                    <h1><?php echo $_GET['city']?></h1>
                </div>
            </div>
        </section>

        <!------------LIST------------>
        <section class="property-list">
            <?php foreach($properties as $property): ?>
                <?php $propertyImg = $propertyView->getPropertyImage(['property_id' => $property['id']]); ?>

                <div class="property-row">
                    <div class="header">
                        <img src="<?php echo BASE_URL . "/user_images/" . $propertyImg['name']; ?>"/>
                    </div>

                    <div class="body">
                        <h2><?php echo $utility->limitedString($property['title'],30);  ?></h2>
                        <ul>
                            <li><i class="fa fa-bed"></i> <?php echo $property['rooms']; ?> Izby</li>
                            <li><i class="fa fa-bed"></i> <?php echo $property['bedrooms']; ?> Spálne</li>
                            <li><i class="fa fa-bed"></i> <?php echo $property['baths']; ?> Kúpelne</li>
                        </ul>
                        <p><?php echo $utility->limitedString($property['body'],100); ?></p>
                    </div>

                    <div class="footer">
                        <div class="container">
                            <p class="price"><?php echo $property['price']; ?> €</p>
                            <p class="type"><?php echo $property['type']; ?></p>
                            <a href="<?php echo BASE_URL . '/frontend/single/single.php?id=' . $property['id'] ?>" class="button">Detaily</a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>

        </section>
        
        <!------------FOOTER------------>
        <?php include(ROOT_PATH . "/frontend/shared_html/footer.php"); ?>
        
        <script src="../shared_js/open_menu.js"></script>
    </body>
   
</html>