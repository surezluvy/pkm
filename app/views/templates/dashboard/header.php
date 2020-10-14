<html lang="en"> 
    <head> 
        <meta charset="utf-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <link rel="shortcut icon" href="<?= BASEURL; ?>/images/favicon.png"> 
        <meta name="description" content=""> 
        <title> <?= $data['title'] ?> </title>         
        <!-- Favicon -->         
        <link href="<?= BASEURL; ?>/img/brand/favicon.png" rel="icon" type="image/png"> 
        <!-- Your stylesheet-->         
        <link rel="stylesheet" href="<?= BASEURL; ?>/css/uikit.css"> 
        <link rel="stylesheet" href="<?= BASEURL; ?>/css/main.css"> 
        <link rel="stylesheet" href="<?= BASEURL; ?>/css/admin.css"> 
        <link rel="stylesheet" href="<?= BASEURL; ?>/css/style.css"> 
        <!-- font awesome -->         
        <link rel="stylesheet" href="<?= BASEURL; ?>/css/fontawesome.css"> 
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    </head>     
    <body> 
        <!-- sidebar -->         
        <div class="admin-side" id="admin-side"> 
            <a href="#" class="admin-logo"><i class="fas fa-chart-line"></i> Data Statistik</a> 
            <hr class="uk-divider-icon"><ul data-simplebar> 
                <li> 
                    <a href="<?= BASEURL; ?>/dashboard/"> <i class="fas fa-tachometer-alt"></i> Dashboard  </a>
                </li>                 
                <li> 
                    <a href="<?= BASEURL; ?>/dashboard/wilayah/0/15"> <i class="fas fa-map-marked-alt"></i> Wilayah    </a>
                </li> 
                <?php
                    if($data['admin']['role'] == 'admin') {
                 ?>       
                    <li> 
                        <a href="<?= BASEURL; ?>/dashboard/pengurus/15"> <i class="fas fa-users-cog"></i> Data Pengurus  </a>
                    </li> 
                    <li> 
                        <a href="<?= BASEURL; ?>/dashboard/daftarPesan/0/15"> <i class="fas fa-envelope"></i> Daftar Pesan<span class="uk-badge uk-margin-small-left"><?= $data['totalpesan']['COUNT(*)'] ?></span>  </a>
                    </li>           
                <?php } ?>   
                <?php
                    if($data['admin']['role'] == 'pengurus') {
                 ?>       
                    <li> 
                        <a href="<?= BASEURL; ?>/dashboard/pesan/"> <i class="fas fa-paper-plane"></i> Kirim Pesan Ke Admin    </a>
                    </li> 
                <?php } ?>               
                <li> 
                    <a href="<?= BASEURL; ?>/dashboard/logout"> <i class="fas fa-sign-out-alt"></i> Logout </a>
                </li>                 
            </ul>             
        </div>         
        <!-- mobile  header -->         
        <div class="admin-mobile-headder uk-hidden@m"> 
            <span uk-toggle="target: #admin-side; cls: admin-side-active" class="uk-padding-small uk-text-white uk-float-right"><i class="fas fa-bars"></i></span> 
            <a class="uk-logo" href="index.html"> <i class="fas fa-chart-line"></i> Data Statistik</a> 
        </div>         
        <!-- main contant -->         
        <div class="admin-content"> 
            <nav class="uk-navbar"> 
                <!-- navbar -->                 
                <div class="uk-navbar-left"> 
                    <ul class="uk-navbar-nav"> 
                        <li class="uk-active"> 
                            <a href="<?= BASEURL; ?>/dashboard">Dashboard</a> 
                        </li>
                        <li> 
                            <a href='#'><?= $data['bagian'] ?></a> 
                        </li> 
                    </ul>                     
                </div>                 
                <!-- right navbar  -->                 
                <div class="uk-navbar-right"> 
                    <!-- User profile -->                 
                    <a href="#"> 
                        <img src="<?= BASEURL; ?>/images/avatures/avature-2.png" alt="" class="uk-border-circle user-profile-tiny"> 
                    </a>                     
                    <div uk-dropdown="pos: top-right ;mode : click ;animation: uk-animation-slide-bottom-small" class="uk-dropdown uk-padding-small angle-top-right uk-dropdown-bottom-right" > 
                        <p class="uk-margin-remove-bottom uk-text-bold center">
                            <b style="text-transform: capitalize"><?= $data['admin']['username'] ?></b>
                            <br><b style="text-transform: capitalize"><?= $data['admin']['full_name'] ?></b> <hr>   
                        </p>                                
                        <ul class="uk-nav uk-dropdown-nav"> 
                            <li> 
                                <a href="Profile.html"> <i class="fas fa-user uk-margin-small-right"></i> Profile</a> 
                            </li>                                             
                            <li> 
                               <a href="admin-edite-profile.html"> <i class="fas fa-cog uk-margin-small-right"></i> Setting</a>                                 </li>                                             
                            <li class="uk-nav-divider"></li>                                             
                            <li> 
                                <a href="<?= BASEURL; ?>/dashboard/logout"> <i class="fas fa-sign-out-alt uk-margin-small-right"></i> Log out</a>
                            </li>                                             
                        </ul>                                         
                    </div>                    
                </div>                 
            </nav> 