<div uk-height-viewport="offset-top: true; offset-bottom: true" class="uk-flex uk-flex-middle">
    <div class="uk-width-2-3@m uk-width-1-2@s uk-margin-auto  border-radius-6 ">
        <div class="uk-child-width-1-2@m uk-background-grey uk-grid-collapse" uk-grid>
            <div class="uk-text-middle uk-margin-auto-vertical uk-text-center uk-padding-small uk-animation-scale-up">
                <p> <i class="fas fa-chart-line uk-text-white" style="font-size:60px"></i> </p>
                <h1 class="uk-text-white uk-margin-small"> Data Statistik </h1>
                <h5 class="uk-margin-small uk-text-muted uk-text-bold uk-text-nowrap"> Silahkan login untuk melanjutkan. </h5>
            </div>
            <div>
                <div class="uk-card-default uk-padding uk-card-small">
                	<?php Flasher::flash(); ?>
                    <form action="<?= BASEURL; ?>/loginController/login/" method="POST">
                        <div id="login" class="tabcontent tab-default-open animation: uk-animation-slide-right-medium">
                            <h2 class="uk-text-bold"> Log in </h2>
                            <p class="uk-text-muted uk-margin-remove-top uk-margin-small-bottom"> Silahkan masukan data login anda</p>
                            <div class="uk-form-label"> Username </div>
                            <div class="uk-inline">
                                <span class="uk-form-icon"><i class="far fa-User icon-medium"></i></span>
                                <input class="uk-input uk-form-width-large" placeholder="Username" type="text" name="username">
                            </div>
                            <div class="uk-flex-middle" uk-grid>
                                <div class="uk-width-expand@m uk-margin-small-bottom">
                                    <div class="uk-form-label">Password</div>
                                </div>
                            </div>
                            <div class="uk-inline uk-margin-small-bottom">
                                <span class="uk-form-icon"><i class="fas fa-key icon-medium"></i></span>
                                <input class="uk-input uk-form-width-large" name="password" id="password" placeholder="Password" type="password">
                            </div>
                            <div>
                                <label>
                                    <input class="uk-checkbox" type="checkbox" data-show-pw="#password">
                                    <span class="checkmark uk-text-small"> Show password  </span>
                                </label>
                            </div><br>
                            <div class="uk-flex-middle" uk-grid>
                                <div class="uk-width-expand@m">
                                    <input class="uk-button uk-button-success" type="submit" class="button" value="Sign in">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>