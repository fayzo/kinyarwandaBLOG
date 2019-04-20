<?php include "header_nav_footer/header.php" ;?>
<title id="title_json"> <?php echo $lang['title'] ;?> </title>
</head>

<?php  
$conn = $db;
$sql= $conn->query("SELECT user_id, color,profile_image, username, language FROM users WHERE user_id = $_SESSION[key]");
$data = $sql->fetch_array(); 
$id= $data['user_id'];
$dir = 'assets/image/users/user_image_profile/'.$data['profile_image'];
?>

<body id="<?php echo $data['color']; ?>" class="<?php echo $data['language']; ?>">

    <?php include "header_nav_footer/nav.php" ;?>

    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <h1><i class="fa fa-cog" aria-hidden="true"></i><span id="dashboard_json">
                            <?php echo $lang['Dashboard'];?> </span> <small id="yoursite_json">
                            <?php echo $lang['yoursite'];?></small></h1>
                </div>
                <div class="col-md-2">
                    <div class="dropdown dropdown1 ">
                        <button class="btn main-active dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $lang['CreateContent'];?>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <a class="dropdown-item" id="addpages_json" href="#" data-toggle="modal"
                                data-target="#addpages">
                                <?php echo $lang['AddPages'];?></a>
                            <a class="dropdown-item" id="addposts_json" href="#" data-toggle="modal"
                                data-target="#addposts">
                                <?php echo $lang['AddPost'];?></a>
                            <a class="dropdown-item" id="AddUsers" href="#">
                                <?php echo $lang['AddUsers'];?>
                                <!-- add users --></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>

    <section id="section1">
        <div class="container">
            <ul class="breadcrumb">
                <li id="dashboarda_json" class="active">
                    <!-- Dashboard --><?php echo $lang['Dashboard'];?>
                </li>
            </ul>
        </div>
    </section>

    <section id="section2">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="card mb-3 form-div ">
                        <div class="card-header form-header text-center main-active"> <?php echo $data['username'] ;?>
                        </div>
                        <div class="card-body">
                            <?php if (!empty($msg)): ?>
                            <div class="alert <?php echo $msg_class ?>" role="alert">
                                <?php echo $msg; ?>
                            </div>
                            <?php endif; ?>
                            <form action="core/ajax/dashboard_profile.php" method="post" enctype="multipart/form-data"
                                id="picUploadForms">
                                <!-- <h5 class="text-center main-active"><?php echo $data['username'] ;?></h5> -->
                                <div class="form-group text-center" style="position: relative;">
                                    <input type="hidden" id="profileImage_id" name="profileImage_id"
                                        value="<?php echo $_SESSION['key'] ;?>">
                                    <span class="img-div">
                                        <div class="text-center img-placeholder" onClick="triggerClick()">
                                            <h4>Update image</h4>
                                        </div>
                                        <?php if (!empty($data['profile_image'])) {?>
                                        <img src="<?php echo $dir ;?>" onClick="triggerClick()" id="profileDisplay">
                                        <?php }else{?>
                                        <img src="<?php echo BASE_URL_LINK ;?>image/users/users_upload_empty/no_image.jpg"
                                            onClick="triggerClick()" class="uploadProcess" id="profileDisplay">
                                        <?php }?>
                                    </span>
                                    <input type="file" name="profileImage" onChange="displayImage(this)"
                                        id="profileImage" class="form-control" style="display: none;">
                                    <!-- <small> Profile image</small> -->
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="list-group">
                        <a href="dashboard.php" class="list-group-item list-group-item-action main-active">
                            <i class="fa fa-cog" aria-hidden="true"></i> <span id="dashboardb_json"></span>
                            <!-- Dashboard --><?php echo $lang['Dashboard'];?>
                        </a>
                        <div
                            class="list-group-item list-group-item-action  d-flex justify-content-between align-items-center">
                            <a href="pages.php" class="list-group-item-action "><i class="fa fa-book"
                                    aria-hidden="true"></i> <span id="pages_json">pages</span></a> <span
                                class="badge badge-secondary ">12</span></div>
                        <div
                            class="list-group-item list-group-item-action  d-flex justify-content-between align-items-center">
                            <a href="post.php" class="list-group-item-action  "><i class="fa fa-pen"
                                    aria-hidden="true"></i> <span id="posts_json">posts</span></a><span
                                class="badge badge-secondary">22</span></div>
                        <div
                            class="list-group-item list-group-item-action  d-flex justify-content-between align-items-center">
                            <a href="users.php" class="list-group-item-action "><i class="fa fa-user-circle"
                                    aria-hidden="true"></i><span id="users_json">users</span></a><span
                                class="badge badge-secondary">23</span></div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-body">
                            <label class="progress-bar bg-dark" for="">Disk Spaces Users</label>
                            <div class="progress">
                                <div class="progress-bar bg-dark" role="progressbar" style="width: 25%;"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-body">
                            <label class="progress-bar bg-dark" for="">Bandwindth Users</label>
                            <div class="progress">
                                <div class="progress-bar bg-dark" role="progressbar" style="width: 65%;"
                                    aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">65%</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header main-active" id="overview_json">
                            <!-- Website Overview --><?php echo $lang['CreateContent'];?>
                        </div>
                        <div class="card-body text-center">
                            <div class="row">

                                <div class="col-md-3">
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            <h4 class="card-title"><i class="fa fa-user"
                                                    aria-hidden="true"></i><?php $dashboardpage->countUSERS(); ?></h4>
                                            <p class="card-text">Users</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            <h4 class="card-title"><i class="fa fa-book"
                                                    aria-hidden="true"></i><?php $dashboardpage->countPOSTS() ;?></h4>
                                            <p class="card-text">Pages</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            <h4 class="card-title"><i class="fa fa-pen"
                                                    aria-hidden="true"></i><?php $dashboardpage->countPages();?></h4>
                                            <p class="card-text">Post</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            <h4 class="card-title"><i class="material-icons md-48"> insert_chart </i>
                                                <?php $dashboardpage->countVISITORS();?></h4>
                                            <p class="card-text">Visitors</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- END OF CARD -->
                    <!-- Overview Users -->
                    <div class="card mt-3 mb-3">
                        <div class="card-body">
                            <table class="table table-responsive-sm table-hover ">
                                <thead class="main-active">
                                    <tr>
                                        <th>N0</th>
                                        <th class="text-center">
                                            <i class="icon-people"></i>
                                        </th>
                                        <th>User</th>
                                        <th class="text-center">Country</th>
                                        <th>Usage</th>
                                        <th class="text-center">Payment</th>
                                        <th>Activity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
			                            $increment= 1;
                                        $result= $db->query("SELECT * FROM users");
			                          if ($result->num_rows > 0) {
                                        while($row= $result->fetch_array()){ ?>
                                    <tr>
                                        <td><?php echo  $increment++ ; ?></td>
                                        <td class="text-center">
                                            <div class="avatar">
                                                <img class="img-avatar"
                                                    src="assets/image/users/user_image_profile/<?php echo $row["profile_image"] ;?>"
                                                    width="80px" alt="<?php echo $row["email"] ;?>">
                                                <span class="avatar-status badge-success"></span>
                                            </div>
                                        </td>
                                        <td>
                                            <div><?php echo $row["lastname"];?></div>
                                            <div class="small text-muted">
                                                <span><?php echo $dashboardpage->lengths($dashboardpage->timeAgo($row["date"]));?> |Registered: </span> <p><?php echo $dashboardpage->timeAgo($row["date"]);?></p></div> 
                                                <!-- -Jan 1, 2015 -->
                                        </td>
                                        <td class="text-center">
                                            <!-- <i class="flag-icon flag-icon-rw h4 mb-0" id="us" title="us"></i> -->
                                            <i class="flag-icon flag-icon-<?php echo strtolower($row["country"]) ;?> h4 mb-0" id="<?php echo strtolower($row["country"]) ;?>" title="us"></i>
                                        </td>
                                        <td>
                                            <div class="clearfix">
                                                <div class="text-center">
                                                    <strong><?php echo $row["counts_login"] ;?>%</strong>
                                                </div>
                                                <div>
                                                    <small class="text-muted"><?php echo $dashboardpage->timeAgo($row["date"])." - ".$dashboardpage->timeAgo($row["last_login"]);?></small><!-- Jun 11, 2015 - Jul 10, 2015 -->
                                                </div>
                                            </div>
                                            <div class="progress progress-xs">
                                                <?php echo $dashboardpage->Users_usage_dashboard($row["counts_login"]) ;?>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <i class="fab fa-cc-mastercard" style="font-size:24px"></i>
                                        </td>
                                        <td>
                                            <div class="small text-muted">Last login</div>
                                            <small><?php echo $dashboardpage->timeAgo($row["last_login"]);?></small>
                                        </td>
                                    </tr>
                                    <?php } }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END OF Overview Users -->

                    <div class="card mt-3">
                        <div class="card-header main-active">
                            Latest Users
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-striped table-responsive">
                                <thead class="thead-inverse main-active">
                                    <tr>
                                        <th>#</th>
                                        <th>UserName</th>
                                        <th>FirstName</th>
                                        <th>LastName</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>profile_image</th>
                                        <th>cover_image</th>
                                        <th>Date</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody id='tbody'>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END OF Card -->
                </div>
                <!-- END OF col-9 -->
            </div>
            <!-- END OF ROW -->
        </div>
        <!-- END OF CONTAINER -->
    </section>
    <!-- MODAL OF ADD PAGES IN CREATE CONTENT -->
    <?php include "header_nav_footer/footer.php" ;?>