<?php include "header_nav_footer/header.php" ;?>
    <title>Admin Areas | Edit Pages</title>

</head>
<?php  
$conn = $db;
$sql= $conn->query("SELECT user_id, color,language FROM users WHERE user_id = $_SESSION[key]");
$data = $sql->fetch_array(); 
?>
<body id="<?php echo $data['color']; ?>" class="<?php echo $data['language']; ?>">

<?php include "header_nav_footer/nav.php" ;?>

    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <h1><i class="fa fa-cog" aria-hidden="true"></i> Edit Pages <small>About</small></h1>
                </div>
                <div class="col-md-2">
                    <div class="dropdown dropdown1 ">
                        <button class="btn main-active dropdown-toggle " type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Create Content
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <a class="dropdown-item" data-toggle="modal" data-target="#addpages">Add Pages</a>
                            <a class="dropdown-item" data-toggle="modal" data-target="#addposts">Add Post</a>
                            <a class="dropdown-item" data-toggle="modal" id="AddUsers">Add Users</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>

    <section id="section1">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="pages.php"> / Pages</a></li>
                <li><a href="edit.php"> / Edit</a></li>
            </ul>
        </div>
    </section>

    <section id="section2">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
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
                    <div class="card mt-3">
                        <div class="card-header main-active">
                            Edit Pages
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <label for="pages title">Pages Title</label>
                                    <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="Authors">Authors</label>
                                    <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="email">email</label>
                                    <input type="email" class="form-control" name="" id="" aria-describedby="emailHelpId" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="Pages Body">Pages Body</label>
                                    <textarea class="form-control" name="editor1" id="" rows="4"></textarea>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="" id="" value="checkedValue" checked>
                                        Publish
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="Meta Description">Meta Tags</label>
                                    <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="Meta Description">Meta Description</label>
                                    <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                                </div>
                                <input name="submit" id="" class="btn btn-primary" type="button" value="Submit">
                            </form>
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
