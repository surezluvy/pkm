<div class="admin-content-inner"> 
        <?php Flasher::flash(); ?>
    <div class="uk-card-small uk-card-default"> 
        <div class="uk-card-header uk-text-bold">
            <i class="fas fa-paper-plane uk-margin-small-right"></i> Kirim Pesan
        </div>                     
        <div class="uk-card-body "> 
            <div uk-grid>                         
                <div class="uk-width-3-3@m"> 
                    <form class="uk-grid-small" uk-grid method="POST" action="<?= BASEURL; ?>/dashboard/kirimPesan/"> 
                        <div class="uk-width-1-2"> 
                            <div class="uk-form-label"> Pengirim : </div>
                            <input type="hidden" name="pengirim" value="<?= $_SESSION['username'] ?>">                                         
                            <input disabled="" class="uk-input" type="text" value="<?= $_SESSION['username'] ?>"> 
                        </div>                                     
                        <div class="uk-width-1-2"> 
                            <div class="uk-form-label"> Nama Lengkap :  </div>                                         
                            <input disabled="" class="uk-input" type="text" value="<?= $data['admin']['full_name'] ?>"> 
                        </div>                                     
                        <div class="uk-width-1-2"> 
                            <div class="uk-form-label"> Tanggal : </div>  
                            <input type="hidden" name="tanggal" value="<?= date("Y-m-j") ?>">                                       
                            <input disabled="" class="uk-input" type="text" value="<?= date("Y-m-j") ?>"> 
                        </div>                                     
                        <div class="uk-width-1-2"> 
                            <div class="uk-form-label"> Kode Pesan :</div>                                         
                            <input disabled="" class="uk-input" type="text" value="<?= $data['pesan']['id_pesan'] + 1 ?>"> 
                        </div>                                     
                        <div class="uk-width-1-1"> 
                            <div class="uk-form-label"> Isi Pesan : </div>                                         
                            <textarea name="isi_pesan" class="uk-textarea" rows="5" placeholder="Masukan isi pesanmu disini.."></textarea>                                         
                        </div> <br><br><br>       
                        <button type="submit" name="kirim" style="margin-left: 15px;" class="uk-button uk-button-primary uk-width-1-1 uk-margin-small-bottom">Kirim Pesan</button>                             
                    </form>                                 
                </div>                             
            </div>                         
        </div>                     
    </div>            
</div>        
