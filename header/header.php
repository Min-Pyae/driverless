<?php 

    $userName = $adminName = '';    
    
    if (isset($_SESSION['UserID'])) {
        $userName = $_SESSION['UserName'];
    } elseif ((isset($_SESSION['AdminID']))) {
        $adminName = $_SESSION['AdminName'];
    } 

?>


<!-- PRELOADER -->
<div id="preloader">
    <div class="jumper">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
<!-- END OF PRELOADER -->


<!-- HEADER -->
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light py-4 px-2">
      <div class="container-fluid">
        <a class="navbar-brand brand-name" href="./index.php">DRIVERLESS</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link nav-text" aria-current="page" href="index.php">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link nav-text" href="index.php#about">About</a>
                </li>

                <!-- VEHICLE NAV LINK -->
                <?php if (isset($_SESSION['AdminID'])): ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle nav-text" id="adminDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Vehicles
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="adminDropdown">
                        <li><a class="dropdown-item nav-text" href="./vehicle_display_page.php">Products</a></li>
                        <li><a class="dropdown-item nav-text" href="./vehicle_register_page.php">Register</a></li>
                    </ul>
                </li>
                <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link nav-text" href="./vehicle_display_page.php">Vehicles</a>
                </li>
                <?php endif; ?>
                <!-- END OF VEHICLE NAV LINK -->

                <!-- CONTACT NAV LINK -->
                <?php if (isset($_SESSION['AdminID'])):?>
                <li class="nav-item">
                    <a class="nav-link nav-text" href="./contact_question_page.php">Contact</a>
                </li>
                <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link nav-text" href="./contact_page.php">Contact</a>
                </li>
                <?php endif; ?>
                <!-- END OF CONTACT NAV LINK -->

                <!-- ADMIN NAV LINK -->
                <?php if (isset($_SESSION['UserID']) || isset($_SESSION['AdminID'])): ?>
                <li class="nav-item">
                    <a class="nav-link nav-text" href="faq_page.php">FAQ</a>
                </li>
                <?php else: ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle nav-text" id="adminDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Admin
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="adminDropdown">
                        <li><a class="dropdown-item nav-text" href="./admin_login_page.php"><i class="bi bi-box-arrow-in-right"></i> Login</a></li>
                        <li><a class="dropdown-item nav-text" href="./admin_register_page.php"><i class="bi bi-person"></i> Register</a></li>
                    </ul>
                </li>
                <?php endif; ?>
                <!-- END OF ADMIN NAV LINK -->
            </ul>
            
            <!-- ACCOUNT BUTTONS -->
            <div class="mt-3 mt-lg-0">
                <?php if (isset($_SESSION['UserID']) || isset($_SESSION['AdminID'])): ?>
                <ul class="navbar-nav me-2 mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle border-button" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person"></i> 
                            <?php echo htmlspecialchars($userName); ?>
                            <?php echo htmlspecialchars($adminName); ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">   
                        <?php if (isset($_SESSION['AdminID'])):?>
                            <li><a class="dropdown-item nav-text" href="./admin_account_page.php">Account</a></li>
                        <?php else: ?>
                            <li><a class="dropdown-item nav-text" href="./user_account_page.php">Account</a></li>
                        <?php endif; ?>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item nav-text" href="./logout.php">Log Out</a></li>
                        </ul>
                    </li>
                </ul>
                <?php else: ?>
                <a class="btn btn-login me-1" href="./user_login_page.php" role="button"><i class="bi bi-box-arrow-in-right"></i> Login</a>
                <a class="btn btn-register" href="./user_register_page.php" role="button"><i class="bi bi-person"></i> Register</a>
                <?php endif; ?>
            </div>
            <!-- END OF ACCOUNT BUTTONS -->

        </div>
    </nav>
</header>
<!-- END OF HEADER -->