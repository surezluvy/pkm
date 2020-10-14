
<div class="admin-content-inner"> 
    <div class="uk-alert-primary alert" uk-alert>
        <a class="uk-alert-close" uk-close></a>
        <p>Selamat datang di dashboard admin.</p>
    </div>
    <div class="uk-child-width-1-3@m uk-child-width-1-2 uk-grid-match " uk-grid> 
        <div> 
            <div class="uk-background-cover uk-light dashboard-card" data-src="<?= BASEURL; ?>/images/admin/cards-bg.jpg" uk-img> 
                <h3><?php echo $data['desa']['COUNT(*)'] ?> Desa</h3> 
                <p> pro detracto disputando reformidans at</p>
                <a href="<?= BASEURL; ?>/dashboard/wilayah/0/15"> Lihat Semua </a>
            </div>
        </div> 
        <div> 
            <div class="uk-background-cover uk-light dashboard-card" data-src="<?= BASEURL; ?>/images/admin/cards-bg.jpg" uk-img> 
                <h3><?php echo $data['kecamatan']['COUNT(*)'] ?> Kecamatan</h3> 
                <p> pro detracto disputando reformidans at</p>
                <a href="<?= BASEURL; ?>/dashboard/wilayah/0/15"> Lihat Semua </a>
            </div>
        </div> 
        <div> 
            <div class="uk-background-cover uk-light dashboard-card" data-src="<?= BASEURL; ?>/images/admin/cards-bg.jpg" uk-img> 
                <h3><?php echo $data['totalpengurus']['COUNT(*)'] ?> Pengurus </h3> 
                <p> pro detracto disputando reformidans at</p>
                <a href="<?= BASEURL; ?>/dashboard/pengurus/15"> Lihat Semua </a>
            </div>
        </div>                      
    </div>
    
    <div uk-grid>
        <div class="uk-width-1@m"> 
            <div class="uk-card-small uk-card-default"> 
                <div class="uk-card-header uk-text-bold">
                    <i class="fas fa-users uk-margin-small-right"></i> Daftar Admin
                </div>                                 
                <div class="uk-card-body uk-padding-remove-top"> 
                    <div class="uk-child-width-1-4@m uk-child-width-1-2 uk-grid-collapse uk-flex-center"  uk-scrollspy="target: > div; cls:uk-animation-scale-up; delay: 100" uk-grid>
                     	<?php foreach ($data['userAdmin'] as $userAdmin): ?>
                            <div>
                                <a href="<?= BASEURL; ?>/dashboard/pesan/" class="uk-link-reset">
                                    <div class="uk-padding-remove   uk-text-center"> 
                                        <img alt="Image" class="uk-width-2-3 uk-margin-top uk-margin-small-bottom uk-border-circle uk-align-center uk-box-shadow-large" src="<?= BASEURL; ?>/images/avatures/avature-1.png">
                                        <h5 class="uk-margin-remove-bottom uk-margin-remove-top firstLetter"><?= $userAdmin['username'] ?></h5>  
                                    </div> 
                                </a>                          
                            </div>  
                   		<?php endforeach ?>
                    </div>
                </div>                                 
            </div>                             
        </div> 
        <div class="uk-width-1@m">
            <div class="uk-card-small uk-card-default"> 
                <div class="uk-card-header uk-text-bold">
                    <i class="fas fa-comment uk-margin-small-right"></i> Daftar Pengurus
                </div>                                 
                <div class="uk-card-body">
                     <?php foreach ($data['user'] as $user): ?>
                        <div>
                            <img class="user-profile-medium uk-align-left uk-margin-small-right uk-margin-small-bottom" src="<?= BASEURL; ?>/images/avatures/avature-1.png" width="60"  alt="Example image"> 
                            <p class="uk-margin-remove-top">
                                Username : <b class="firstLetter"><?= $user['username'] ?></b><br>
                                Nama Lengkap : <b class="firstLetter"><?= $user['full_name'] ?></b>
                            </p>
                            <hr>
                        </div>
                    <?php endforeach ?>       
                </div>
            </div>
        </div>
    </div>
</div>