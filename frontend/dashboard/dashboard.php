<?php 
ob_start();

include_once("../../path.php"); 
include_once(ROOT_PATH . "/backend/UserController.php");
include_once(ROOT_PATH . "/backend/PropertyView.php");
include_once(ROOT_PATH . "/backend/Utility.php");

$propertyView = new PropertyView();
$userProperties = $propertyView->getProperties(['user_id' => $_SESSION['id']]); 
$utility = new Utility();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="styles_dashboard.css?version=51" type="text/css"/>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet"/> 
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet"/>       
        <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet"/> 

        <title>Dashboard</title>
    </head>

    <body>
        
        <!------------NAVBAR_DASHBOARD------------>
        <?php include(ROOT_PATH . "/frontend/shared_html/navbar_dashboard.php"); ?>

        <!------------ADMIN PANEL------------>
        <section class="admin-panel">
            <div class="left-side">
                <h3>Vitaj</h3>
                <h3><?php echo $utility->limitedString($_SESSION['username'],14);  ?></h3>
                <img src="../../images/Profile-Icon.jpg"/>
            </div>

            <div class="right-side">
                <div class="button-group">
                    <ul>
                        <li><a href="<?php echo BASE_URL . "/frontend/dashboard/add/add_property.php" ?>">Pridať nehnutelnosť</a></li>
                    </ul>
                </div>

                <?php if(isset($_SESSION['message'])): ?>
                    <div class="hello">
                        <p><?php echo $_SESSION['message'] ?></p>
                    </div>
                    <?php unset($_SESSION['message']); ?>
                <?php endif ?>

                <?php if(empty($userProperties)): ?>
                    <div class="filler-text">
                        <h2>Pridajte svoju nehnutelnosť na predaj :&#41</h2>
                    </div>
                <?php endif ?>
                

                <table>
                    <?php foreach($userProperties as $property): ?>
                        <?php $propertyImg = $propertyView->getPropertyImage(['property_id' => $property['id']]); ?>
                        <tr>
                            <td class="property-container-whole-row">
                                <div class="header">
                                    <img src="<?php echo BASE_URL . "/user_images/" . $propertyImg['name']; ?>"/>
                                </div>

                                <div class="body">
                                    <h3><?php echo $utility->limitedString($property['title'],30);  ?></h3>
                                    <ul class="property-dimension">
                                        <li><i class="fa fa-bed"></i> <?php echo $property['rooms']; ?> Izby</li>
                                        <li><i class="fa fa-bed"></i> <?php echo $property['bedrooms']; ?> Spálne</li>
                                        <li><i class="fa fa-bed"></i> <?php echo $property['baths']; ?> Kúpelne</li>
                                    </ul>
                                    <p><?php echo $utility->limitedString($property['body'],40); ?></p>
                                </div>

                                <div class="footer">
                                    <div class="container">
                                        <p class="property-price"> <?php echo $property['price']; ?> €</p>
                                        <p class="property-type"><?php echo $property['type']; ?></p>
                                    </div>
                                    
                                </div>
                            </td>
                            <td class="manage-property">
                                <a href="<?php echo BASE_URL . '/frontend/dashboard/edit/edit.php?update_id=' . $property['id']?>" class="edit">Zmeniť</a>
                                <a href="<?php echo BASE_URL . '/backend/PropertyController.php?delete_id=' . $property['id']?>" class="delete">Vymazať</a>
                            </td>
                       
                        </tr>
                    <?php endforeach ?>
                    
                </table>                
            </div>
        </section>
        <script src="../shared_js/open_menu.js"></script>
    </body>
   
</html>
<?php ob_end_flush(); ?>