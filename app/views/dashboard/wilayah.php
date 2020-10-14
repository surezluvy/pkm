<div class="admin-content-inner">
        <?php Flasher::flash(); ?>
    <div class="uk-flex-inline uk-flex-middle">
        <i class="fas fa-map-marked-alt icon-large uk-margin-right"></i>
        <h4 class="uk-margin-remove"> Daftar Wilayah </h4>
        <!-- model -->
        
    </div>
    <div class="uk-background-default uk-margin-top uk-padding">
        <div uk-grid>
            <div class="uk-width-expand@m">
                <div class=" uk-flex-inline uk-flex-middle uk-text-small">
                    <p class="uk-margin-remove-bottom uk-margin-right"> Tampilkan :  </p>
                    
                    <button class="uk-button uk-button-default" type="button">data</button>
                    <div uk-dropdown="mode: click" style="display: none">
                        <ul class="uk-nav uk-dropdown-nav">
                            <li class="uk-active"><a href="#">Tampilkan data :</a></li>
                            <li><a href="<?= BASEURL; ?>/dashboard/wilayah/0/15">15 data</a></li>
                            <li><a href="<?= BASEURL; ?>/dashboard/wilayah/0/30">30 data</a></li>
                            <li><a href="<?= BASEURL; ?>/dashboard/wilayah/0/45">45 data</a></li>
                            <li><a href="<?= BASEURL; ?>/dashboard/semuaWilayah/">Semua data</a></li>
                        </ul>
                    </div>      
                </div>
            </div>
            <div class="uk-width-auto@m uk-text-small">
                <form action="<?= BASEURL; ?>/dashboard/cariWilayah" method="POST">
                    <input class="uk-input uk-form-width-medium" type="text" placeholder="Cari Data" name="keyword">
                    <button type="submit" class="uk-button uk-button-grey admin-btn" id="tombolCari">Cari</button>
                </form>
            </div>
        </div>
    </div>
    <div class="uk-overflow-auto">
        <table class="uk-table uk-table-hover uk-table-middle uk-table-divider">
            <thead>
                <tr class="uk-text-small uk-text-bold">
                    <th style="text-align: center">No</th>
                    <th style="text-align: center">Nama Desa</th>
                    <th style="text-align: center">Nama Kecamatan</th>
                    <th style="text-align: center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $no = 1;
                    foreach ($data['wilayah'] as $user)
                { ?>
                <tr>
                    <td class="center firstLetter"> <?= $no++; ?> </td>
                    <td class="center firstLetter"> <?= $user['nama_desa'] ?> </td>
                    <td class="center firstLetter"> <?= $user['nama_kecamatan'] ?> </td>
                    <td class="uk-flex-inline uk-flex-middle aksi" style="position: relative; left: 28%;">
                        <button class="uk-button uk-button-primary admin-table-btn">
                            <i class="fas fa-trash uk-visible@m"></i> Edit
                        </button>
                        <a href="#">
                            <button class="uk-button uk-button-danger admin-table-btn" onclick="return confirm('Maaf data wilayah tidak dapat dihapus.')">
                            <i class="fas fa-trash uk-visible@m"></i>Hapus
                            </button>
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="uk-padding uk-background-default uk-margin-large-top">
        <ul class="uk-pagination uk-flex-center uk-margin-medium">
             <li class="uk-active">
                <a href="<?= BASEURL; ?>/dashboard/wilayah/0/15">1</a>
            </li>
            <li>
                <a href="<?= BASEURL; ?>/dashboard/wilayah/15/15">2</a>
            </li>
            <li>
                <a href="<?= BASEURL; ?>/dashboard/wilayah/30/15">3</a>
            </li>
            <li>
                <a href="<?= BASEURL; ?>/dashboard/wilayah/45/15">4</a>
            </li>
            <li>
                <a href="<?= BASEURL; ?>/dashboard/wilayah/60/15">5</a>
            </li>
            <!-- <li>
                <a href="<?= BASEURL; ?>/dashboard/wilayah/75/15">6</a>
            </li>
            <li>
                <a href="<?= BASEURL; ?>/dashboard/wilayah/90/15">7</a>
            </li>
            <li>
                <a href="<?= BASEURL; ?>/dashboard/wilayah/105/15">8</a>
            </li>
            <li>
                <a href="<?= BASEURL; ?>/dashboard/wilayah/120/15">9</a>
            </li>
            <li>
                <a href="<?= BASEURL; ?>/dashboard/wilayah/135/15">10</a>
            </li>
            <li>
                <a href="<?= BASEURL; ?>/dashboard/wilayah/150/15">11</a>
            </li>
            <li>
                <a href="<?= BASEURL; ?>/dashboard/wilayah/165/15">12</a>
            </li>
            <li>
                <a href="<?= BASEURL; ?>/dashboard/wilayah/180/15">13</a>
            </li>
            <li>
                <a href="<?= BASEURL; ?>/dashboard/wilayah/195/15">14</a>
            </li>
            <li>
                <a href="<?= BASEURL; ?>/dashboard/wilayah/205/15">15</a>
            </li>
            <li>
                <a href="<?= BASEURL; ?>/dashboard/wilayah/220/15">16</a>
            </li> -->
        </ul>
         
        <!-- <div class="uk-text-small uk-width-1-2">
            <form action="<?= BASEURL; ?>/dashboard/wilayah/" method="GET">
                <input class="uk-input uk-form-width-medium" type="text" placeholder="Ke halaman" name="id3">
                <button type="submit" class="uk-button uk-button-grey admin-btn" id="tombolCari">Cari</button>
            </form>
        </div>   -->
    </div>
</div>
</div>

<div id="create-model" uk-modal>
    <div class="uk-modal-dialog">
        <button class="uk-modal-close-default uk-padding-small" type="button" uk-close></button>
        <div class="uk-modal-header">
            <h4 class="title"> Tambah Pengurus   </h4>
        </div>
        <form action="<?= BASEURL; ?>/dashboard/tambahPengurus" method="POST">
            <div class="uk-modal-body">
                <div uk-grid>
                    <div class="uk-width-1@m">
                        <div class="uk-margin">
                            <label> Username </label>
                            <input id="username" class="uk-input " placeholder="Username" type="text" name="username" autocomplete="off">
                        </div>
                        <div class="uk-margin">
                            <label> Nama Lengkap </label>
                            <input id="fullname" class="uk-input " placeholder="Nama Lengkap" type="text" name="full_name" autocomplete="off">
                        </div>
                        <div class="uk-margin">
                            <label> Password </label>
                            <input id="password" class="uk-input " placeholder="Password" type="password" name="password" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
            <div class="uk-modal-footer uk-text-right">
                <button class="uk-button uk-button-default uk-modal-close" type="button">Batal</button>
                <input class="uk-button uk-button-primary tambah" type="submit" name="login" value="Tambah">
            </div>
        </form>
    </div>
</div>