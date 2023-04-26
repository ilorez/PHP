<?php
    
    session_start()
    
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Football School</title>
    <link rel="stylesheet" href="../../000_bootstrap/css/bootstrap.min.css" />
    <!-- <link rel="stylesheet" href="styles/hompage.css" /> -->
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light p-1 ps-5 pe-5">
            <a class="navbar-brand" href="#">BOUNOU</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between ps-3" id="navbarSupportedContent">
                <!-- pages -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Area</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                </ul>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                    <li class="ps-3 pe-3 p-2">
                        <?php echo "BONJOUR ".$_SESSION['firstname'] ;?>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./remove_session.php">
                            <input type="button" value="Log Out" class="btn-danger btn ps-3 pe-3 p-2" />
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./remove_cookies.php">
                            <input type="button" value="Log Out For now" class="btn-danger btn ps-3 pe-3 p-2" />
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- <script src="../bootstrap-4.0.0-dist/js/bootstrap.min.js"></script> -->
        <script src="../../000_bootstrap/js/bootstrap.bundle.js"></script>
    </header>
</body>

</html>