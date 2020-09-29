<?php include("path.php"); 
include_once(ROOT_PATH . "/backend/UserController.php");
include_once(ROOT_PATH . "/backend/PropertyView.php");
include_once(ROOT_PATH . "/backend/Utility.php");

$utility = new Utility();
$propertyView = new PropertyView();
$userProperties = $propertyView->getLatestProperties();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="frontend/styles.css" type="text/css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">     
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>    
        <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css2?family=Fredericka+the+Great&display=swap" rel="stylesheet"> 

        <title>Bratislava Estate</title>
    </head>

    <body>
        <!------------NAVBAR------------>
        <?php include(ROOT_PATH . "/frontend/shared_html/navbar.php"); ?>

        <!------------HOME-HERO------------>
        <section class="home-hero">
            <div class="banner">
                <div class="banner-text">
                    <h1 class="animate__animated animate__fadeInDown">Staré mesto</h1>
                    <p class="animate__animated animate__fadeInUp">Nadštandartne vybavené luxusné byty na Blumentálskej ulici. Byty s výrivkou a bazénom ešte stále k dispozícii. Nepremeškajte túto ponuku</p>
                    <button class="secondary-button animate__animated animate__fadeInUp"><a href="#">Rezervovať</a></button>
                </div>
            </div>
            
            <div class="banner-arrows">
                <i id="arrow-left" class="arrow fa fa-angle-left animate__animated animate__fadeIn"></i>
                <i id="arrow-right" class="arrow fa fa-angle-right animate__animated animate__fadeIn"></i>
            </div>
            
        </section>

        <!-------------LOCATIONS----------->
        <section class="locations">
            <div class="locations-text center-container shared-property-header-text">
                <div class="text-block">
                    <h3>Lokality</h3>
                    <p>Nájdite ubytovanie na základe lokality</p> 
                </div>
                
            </div>

            <div class="locations-container center-container">
                <div class="container">
                    <a href="<?php echo BASE_URL . '/frontend/location/location.php?city=Staré mesto' ?>"><img src="images/stare_mesto.jpg"></a>
                    <small>Staré mesto</small>
                </div>
    
                <div class="container">
                    <a href="<?php echo BASE_URL . '/frontend/location/location.php?city=Nové mesto' ?>"><img src="images/nove_mesto.jpg"></a>
                    <small>Nové mesto</small>
                </div>

                <div class="container">
                    <a href="<?php echo BASE_URL . '/frontend/location/location.php?city=Ružinov' ?>"><img src="images/ruzinov.jpg"></a>
                    <small>Ružinov</small>
                </div>
           
                <div class="container">
                    <a href="<?php echo BASE_URL . '/frontend/location/location.php?city=Rusovce' ?>"><img src="images/rusovce.jpg"></a>
                    <small>Rusovce</small>
                </div>

                <div class="container">
                    <a href="<?php echo BASE_URL . '/frontend/location/location.php?city=Devínska Nová Ves' ?>"><img src="images/devinska.jpg"></a>
                    <small>Devínska Nová Ves</small>
                </div>
    
                <div class="container">
                    <a href="<?php echo BASE_URL . '/frontend/location/location.php?city=Záhorská Bystrica' ?>"><img src="images/zahorska.jpg"></a>
                    <small>Záhorská Bystrica</small>
                </div>
            </div>
        </section>
        
        <!------------FEATURED PROPERTIES------------>
        <section class="featured">
            <div class="featured-text center-container shared-property-header-text">
                <div class="text-block">
                    <h3>Vybrané nehnuteľnosti</h3>
                    <p>Nehnuteľnosti ktoré odporúča náš tím</p> 
                </div>
                
                <a href="<?php echo BASE_URL . '/frontend/property_list/list.php' ?>" class="all-properties-button">Všetky nehnuteľnosti</a>
            </div>

            <div class="featured-houses center-container">
                <div class="container shared-property-container">
                    <div class="property-img">
                        <img src="images/featured.jpg">
                        <small class="property-rent rent-buy">Na prenájom</small>
                    </div>

                    <div class="property-text">
                        <h3>Krásna nehnutelnost 1</h3>
                        <ul class="property-dimension">
                            <li><i class="fa fa-bed"></i> 4 Izby</li>
                            <li><i class="fa fa-bed"></i> 4 Spálne</li>
                            <li><i class="fa fa-bed"></i> 1 Kúpelne</li>
                        </ul>
                        <div class="property-footer">
                            <p class="property-price">1000000 €</p>
                             <p class="property-type">Dom</p>
                             <a href="<?php echo BASE_URL . '/frontend/single/single.php?id=44'?>" class="property-button">Detaily</a> 
                         </div>
                    </div>
                </div>

                <div class="container shared-property-container">
                    <div class="property-img">
                        <img src="images/featured3.jpg">
                        <small class="property-buy rent-buy">Na prenájom</small>
                    </div>
    
                    <div class="property-text">
                        <h3>Krásna nehnutelnosť 2</h3>
                        <ul class="property-dimension">
                            <li><i class="fa fa-bed"></i> 1 Izby</li>
                            <li><i class="fa fa-bed"></i> 1 Spálne</li>
                            <li><i class="fa fa-bed"></i> 1 Kúpelne</li>
                        </ul>

                        <div class="property-footer">
                            <p class="property-price">1000 €</p>
                            <p class="property-type">Byt</p>
                            <a href="<?php echo BASE_URL . '/frontend/single/single.php?id=45'?>" class="property-button">Detaily</a> 
                        </div>
        
                    </div>

                    </div>

                <div class="container shared-property-container">
                    <div class="property-img">
                        <img src="images/featured2.jpg">
                        <small class="property-rent rent-buy">Na predaj</small>
                    </div>
    
                    <div class="property-text">
                        <h3>Krásna nehnutelnosť 3</h3>
                        <ul class="property-dimension">
                            <li><i class="fa fa-bed"></i> 2 Izby</li>
                            <li><i class="fa fa-bed"></i> 2 Spálne</li>
                            <li><i class="fa fa-bed"></i> 1 Kúpelne</li>
                        </ul>
                        <div class="property-footer">
                            <p class="property-price">200000 €</p>
                            <p class="property-type">Byt</p>
                            <a href="<?php echo BASE_URL . '/frontend/single/single.php?id=46'?>" class="property-button">Detaily</a> 
                        </div>
                    </div>
                </div>
            </div>

        </section>
        

        

        <!------------LATEST PROPERTIES------------>
        <section class="latest">
            <div class="latest-text center-container shared-property-header-text">
                <div class="text-block">
                    <h3>Najnovšie nehnuteľnosti</h3>
                    <p>Nové nehnuteľnosti na predaj alebo prenájom</p> 
                </div>
                
                <a href="<?php echo BASE_URL . '/frontend/property_list/list.php' ?>" class="all-properties-button">Všetky nehnuteľnosti</a>
            </div>

            <div class="latest-houses center-container">
                <?php foreach($userProperties as $property): ?>
                    <?php $propertyImg = $propertyView->getPropertyImage(['property_id' => $property['id']]); ?>
                        <div class="container shared-property-container">
                            <div class="property-img">
                                <img src="<?php echo BASE_URL . "/user_images/" . $propertyImg['name']; ?>"/>
                                <?php if($property['purpouse'] == "Na prenájom"): ?>
                                    <small class="property-rent rent-buy"><?php echo $property['purpouse'] ?></small>
                                <?php else: ?>
                                    <small class="property-buy rent-buy"><?php echo $property['purpouse'] ?></small>
                                <?php endif ?>
                            </div>

                            <div class="property-text">
                                <h3><?php echo $utility->limitedString($property['title'],21);  ?></h3>
                                <ul class="property-dimension">
                                    <li><i class="fa fa-bed"></i><?php echo $property['rooms']; ?> Izby</li>
                                    <li><i class="fa fa-bed"></i><?php echo $property['bedrooms']; ?> Spálne</li>
                                    <li><i class="fa fa-bed"></i><?php echo $property['baths']; ?> Kúpelne</li>
                                </ul>
                            </div>

                            <div class="property-footer">
                                <p class="property-price"><?php echo $property['price']; ?> €</p>
                                <p class="property-type"><?php echo $property['type']; ?></p>
                                <a href="<?php echo BASE_URL . '/frontend/single/single.php?id=' . $property['id'] ?>" class="property-button">Detaily</a> 
                            </div>
                        </div>
                <?php endforeach ?>

                    
            </div>

        </section>
        
        <!------------OUR SERVICE------------>
        <section class="services">
            <div class="service-text center-container">
                <h1>Najlepšie služby</h1>
                <p>Prevedieme Vás od A po Z</p>
                <hr>
            </div>

            <div class="about-services center-container">
                <div class="container">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    <h3>Nájdite vysnivaný domov</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                </div>

                <div class="container">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                    <h3>Zabezpečenie predaja</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                </div>

                <div class="container">
                    <i class="fa fa-wrench" aria-hidden="true"></i>
                    <h3>Zariaďovanie domu</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                </div>

                <div class="container">
                    <i class="fa fa-gavel" aria-hidden="true"></i>
                    <h3>Právna pomoc</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                </div>
            </div>
        </section>

        <!------------WHAT OUR CUSTOMERS SAY------------>
        <section class="customers">
            <div class="customers-text center-container shared-property-header-text">
                <div class="text-block">
                    <h3>Čo hovoria naši zákazníci</h3>
                    <p>Ponúkame najlepší servis</p>
                </div>
                
            </div>

            <div class="customer-quotes center-container">
                <div class="container">
                    <img src="images/person-1.jpg">
                    <i class="fa fa-quote-right" aria-hidden="true"></i>
                    <h3>Exkluzívny servis</h3>
                    <p>Ak chcete kúpiť nehnutelnosť s pomocou profesionálou obráte sa na...</p>
                    <small>Juraj Jánošík - Politik</small>
                </div>

                <div class="container">
                    <img src="images/person-4.jpg">
                    <i class="fa fa-quote-right" aria-hidden="true"></i>
                    <h3>Ľahký predaj</h3>
                    <p>Doporučujem Bratislava Estate majú skvelý klientský prístup. Rada by som... </p>
                    <small>Danielka Pekná - Farmaceutka</small>
                </div>
            </div>
        </section>

        <!------------FOOTER------------>
        <?php include(ROOT_PATH . "/frontend/shared_html/footer.php"); ?>


                
        <script src="frontend/shared_js/open_menu.js"></script> 
        <script src="frontend/index/slideshow.js"></script> 
    </body>
   
</html>