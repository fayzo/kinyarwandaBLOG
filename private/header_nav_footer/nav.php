
    <nav class="navbar navbar-expand-sm ">
        <a class="navbar-brand" href="#" id="navbar_brand_json">
            <?php echo $lang['AdminStrap'] ;?></a>
        <button class="navbar-toggler d-lg-none navbar-dark" type="button" data-toggle="collapse"
            data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon "></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" id="dashboard" href="dashboard.php"><span id="dashboard_json">
                            <?php echo $lang['Dashboard'] ;?></span><span class="sr-only">(current)</span></a>
                </li>
                <!-- <?php $dashboardpage->explodeFetchNavbar(1);?> -->
                <li class="nav-item ">
                    <a class="nav-link" id="pages_json" href="pages.php">
                        <?php echo $lang['Pages'] ; ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="posts_json" href="post.php">
                        <?php echo $lang['Posts'] ;?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="users_json" href="users.php">
                        <?php echo $lang['Users']; ?></a>
                </li>
            </ul>
        
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="#" onclick="language('fr',<?php echo $_SESSION['key'];?>);"><img
                            src="<?php echo BASE_URL_LINK ;?>image/flag/iconfinder_Flag_of_France_96147.png"
                            width="30px"></a>
                </li>
                <li class="nav-item">
                    <a href="#" onclick="language('en',<?php echo $_SESSION['key'];?>);"><img
                            src="<?php echo BASE_URL_LINK ;?>image/flag/iconfinder_Flag_of_United_Kingdom_96354.png"
                            width="30px"></a>
                </li>
                <li class="nav-item">
                    <a href="#" onclick="language('rw',<?php echo $_SESSION['key'];?>);"><img
                            src="<?php echo BASE_URL_LINK ;?>image/flag/iconfinder_Flag_of_Rwanda_96263.png"
                            width="30px"></a>
                </li>
            </ul>

            <div class="navbar-nav nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false"><?php echo 'Welcome '.$_SESSION['username']; ?></a>
                <div class="dropdown-menu" aria-labelledby="dropdownId">
                    <a class="d-inline-block" href="#" onclick="colors('blue',<?php echo $_SESSION['key'];?>)">
                        <img src="<?php echo BASE_URL_LINK ;?>image/color/blue.png" width="30px"> </a>
                    <a href="#" onclick="colors('black',<?php echo $_SESSION['key'];?>)"> <img
                            src="<?php echo BASE_URL_LINK ;?>image/color/black.png" width="30px"></a>
                    <a href="#" onclick="colors('yellow',<?php echo $_SESSION['key'];?>)"> <img
                            src="<?php echo BASE_URL_LINK ;?>image/color/yellow.png" width="30px"></a>
                    <a href="#" onclick="colors('green',<?php echo $_SESSION['key'];?>)"> <img
                            src="<?php echo BASE_URL_LINK ;?>image/color/green.png" width="30px"></a>
                    <a href="#" onclick="colors('purple',<?php echo $_SESSION['key'];?>)"> <img
                            src="<?php echo BASE_URL_LINK ;?>image/color/purple.png" width="30px"></a>
                    <a href="#" onclick="colors('rose',<?php echo $_SESSION['key'];?>)"> <img
                            src="<?php echo BASE_URL_LINK ;?>image/color/rose.png" width="30px"></a>
                    <a href="#" onclick="colors('chocolate',<?php echo $_SESSION['key'];?>)"> <img
                            src="<?php echo BASE_URL_LINK ;?>image/color/chocolate.png" width="30px"></a>
                    <a href="#" onclick="colors('orange',<?php echo $_SESSION['key'];?>)"> <img
                            src="<?php echo BASE_URL_LINK ;?>image/color/orange.png" width="30px"></a>
                    <a class="dropdown-item dropdown-item3" id="logout_json" href='<?php echo LOGOUT ;?>'>
                        Log out</a>
                </div>
            </div>

        </div>
    </nav>