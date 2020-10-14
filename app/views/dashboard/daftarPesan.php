
<div class="admin-content-inner">
        <?php Flasher::flash(); ?>
    <div class="uk-flex-inline uk-flex-middle">
        <i class="fas fa-envelope icon-large uk-margin-right"></i>
        <h4 class="uk-margin-remove"> Daftar Pesan </h4>
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
                            <li><a href="<?= BASEURL; ?>/dashboard/pengurus/15">15 data</a></li>
                            <li><a href="<?= BASEURL; ?>/dashboard/pengurus/30">30 data</a></li>
                            <li><a href="<?= BASEURL; ?>/dashboard/pengurus/45">45 data</a></li>
                            <li><a href="<?= BASEURL; ?>/dashboard/getSemuaPengurus/">Semua data</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="uk-width-auto@m uk-text-small">
                <form action="<?= BASEURL; ?>/dashboard/cariPengurus" method="POST">
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
                    <th style="text-align: center">Username Pengirim</th>
                    <th style="text-align: center">Tanggal</th>
                    <th style="text-align: center">Isi Pesan</th>
                    <th style="text-align: center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $no = 1;
                    foreach ($data['pesan'] as $user)
                { ?>
                <tr>
                    <td class="center firstLetter"> <?= $no++; ?> </td>
                    <td class="center firstLetter"> <?= $user['pengirim'] ?> </td>
                    <td class="center firstLetter"> <?= $user['tanggal'] ?> </td>
                    <td class="center firstLetter"> <?= $user['isi_pesan'] ?> </td>
                    <td class="uk-flex-inline uk-flex-middle aksi">
                        <a href="<?= BASEURL; ?>/dashboard/bacaPesan/<?= $user['id_pesan'] ?>">
                            <button class="uk-button uk-button-primary admin-table-btn">
                                <i class="fas fa-check"></i> Tandai sudah dibaca
                            </button>
                        </a>
                        <a href="<?= BASEURL; ?>/dashboard/hapusPesan/<?= $user['id_pesan'] ?>">
                            <button class="uk-button uk-button-danger admin-table-btn" onclick="return confirm('Apakah anda yakin untuk menghapus data ini?')">
                            <i class="fas fa-trash uk-visible@m"></i> Hapus
                            </button>
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="uk-padding uk-background-default">
        <ul class="uk-pagination uk-flex-center uk-margin-medium">
            <li class="uk-active">
                <a href="<?= BASEURL; ?>/dashboard/pengurus/15">1</a>
            </li>
            <li>
                <a href="<?= BASEURL; ?>/dashboard/pengurus/15/15">2</a>
            </li>
            <li>
                <a href="<?= BASEURL; ?>/dashboard/pengurus/30/15">3</a>
            </li>
            <li>
                <a href="<?= BASEURL; ?>/dashboard/pengurus/45/15">4</a>
            </li>
            <li>
                <a href="<?= BASEURL; ?>/dashboard/pengurus/60/15">5</a>
            </li>
        </ul>
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