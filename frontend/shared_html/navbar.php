<?php include_once(ROOT_PATH . '/backend/Utility.php');
$utility = new Utility();
?>

<header>
    <div class="navbar-upper">
        <div class="container">
            <div class="left">
                <i class="fa fa-phone"><span>123 456 789</span></i>
                <i class="fa fa-envelope-o"><span>kontakt@bratislavaestate.sk</span></i> 
            </div>
                
            <div class="right">
                <i class="fa fa-instagram"></i>
            </div>
        </div>
    </div>

    <div class="navbar-lower">
        <div class="container" id="navbar-lower-container">
            <div class="logo">
                <h1 id="first-part">Bratislava</h1> 
                <h1 id="second-part">Estate</h1>
            </div>
                
            <nav id = "dropdown" class="menu">
                <ul><a href="<?php echo BASE_URL . "/index.php" ?>">Domov</a></ul>
                <ul><a href="<?php echo BASE_URL . "/frontend/property_list/list.php" ?>">Nehnuteľnosti</a></ul>
                <ul><a href="#">Kontakt</a></ul>
                <?php if (isset($_SESSION['id'])): ?>
                    <ul><a id="login" href="<?php echo BASE_URL . "/frontend/dashboard/dashboard.php" ?>"><?php echo $utility->limitedString($_SESSION['username'],10);  ?></a></ul>
                <?php else: ?>
                    <ul><a id="login" href="<?php echo BASE_URL . "/frontend/login/login.php" ?>">Login</a></ul>
                <?php endif ?>
                
            </nav>
            <i class="fa fa-bars" aria-hidden="true"></i>
        </div>     
    </div>          
</header>