<header class="mod-header">
            <div class="grid_frame">
                <div class="container_grid clearfix">
                    <div class="grid_12">
                        <div class="header-content clearfix">
                            <h1 id="logo" class="rs">
                                <a href="accueil.html">
                                    <img src="images/logo.png" alt="<?php echo META_TITLE; ?>">
                                </a>
                            </h1>
							<?php if(isset($_SESSION['id_membre'])) { ?>
                            <a id="" class="btn btn-red type-login btn-login" href="deconnexion.html">Déconnexion</a>
							<?php } else { ?>
							<a id="sys_head_login" class="btn btn-green type-login btn-login" href="javascript:void(0);">Connexion</a>
							<?php } ?>
                            <nav class="main-nav">
                                <ul id="main-menu" class="nav nav-horizontal clearfix">
                                    <li class="active">
                                        <a href="accueil.html">Accueil</a>
                                    </li>
                                    <li>
                                        <a href="promos.html">Promos</a>
                                    </li>
									<li>
                                        <a href="marchands.html">Marchands</a>
                                    </li>
									<li>
                                        <a href="catalogues.html">Catalogues</a>
                                    </li>
									<li>
                                        <a class="try" id="try-3" href="javascript:void(0);" title="">Contact</a>
                                    </li>
									<!--li>
                                        <a href="collection.html">New Collection</a>
                                    </li-->
                                    <!--li class="has-sub">
                                        <a href="coupon-code.html">Bons à imprimer</a>
                                        <ul class="sub-menu">
                                            <li><a href="coupon-code.html">Bons marchands</a></li>
                                            <li><a href="coupon-code-2.html">Bons produits</a></li>
                                        </ul>
                                    </li-->
                                    <!--li class="has-sub">
                                        <a href="brand-list.html">Deals</a>
                                        <ul class="sub-menu">
                                            <li><a href="brand-detail-1.html">Brand Detail 1</a></li>
                                            <li><a href="brand-detail-2.html">Brand Detail 2</a></li>
                                            <li><a href="brand-detail-3.html">Brand Detail 3</a></li>
                                            <li><a href="brand-detail-4.html">Brand Detail 4</a></li>
                                            <li><a href="brand-detail-5.html">Brand Detail 5</a></li>
                                        </ul>
                                    </li-->
									<?php if(isset($_SESSION['id_membre'])) { ?>
                                    <li>
                                        <a href="mes-promos.html">Mes promos</a>
                                        <i class="icon iPickRed lbl-count"><span><?php echo getCoupnByUserTotal($_SESSION['id_membre']); ?></span></i>
                                    </li>
									<?php } ?>
                                </ul>
                                <a id="sys_btn_toogle_menu" class="btn-toogle-res-menu" href="#alternate-menu"></a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sys_pop_login" class="pop-login">
                <div class="viewport-pop">
                    <div class="transport-viewer clearfix">
                        <div class="mod-register">
                            <h3 class="rs title-mod">Déjà membre ?<br/>Merci de vous connecter en utilisant le formulaire ci-dessous </h3>
                            <div class="wrap-form-reg clearfix">
                                <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
                                    <div class="left-form">
                                        <label class="wrap-txt" for="">
                                            <input class="input-txt" id="sys_email" placeholder="aaa@mail.com" type="email" name="FORM_EMAIL">
											<input class="input-txt" id="sys_pass" placeholder="Mot de passe svp!" type="password" name="FORM_PASSWORD">
                                        </label>
                                        <label class="wrap-check" for="sys_chk_news">
                                            <a class="lost-pass" href="#">Mot de passe oublié?</a>
                                        </label>
                                        <div class="wrap-login-btn">
                                            <button class="btn-flat gr btn-submit-reg" type="submit" name="LOGIN_FORM_ENVOYER">Connexion</button>
                                            <div class="sep-connect">
                                                <span>Ou</span>
                                            </div>
                                            <div class="grp-connect">
                                                <a class="btn-flat fb" href="/login.php?provider=facebook">Facebook</a>
                                                <a class="btn-flat gg" href="/login.php?provider=Google">Google</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="right-create-acc">
                                        <img class="account" src="images/reg-account.png" alt="Couponday.com">
                                        <p class="lbl-dung-lo rs">Pas encore membre? Ne vous inquiétez pas</p>
                                        <a id="sys_link_reg_panel" href="register.html" class="btn-flat yellow btn-submit-reg">Créer un compte</a>
                                    </div>
                                </form>
                                <i class="line-sep"></i>
                            </div>
                        </div><!--end: Login panel -->
                        <div class="mod-register">
                            <h3 class="rs title-mod">Bienvenue à Groupromo.ma</h3>
                            <div class="desc-reg">Inscrivez-vous gratuitement et
obtenir un accès exclusif aux promotions de Groupromo.ma. Entrez un e-mail et un mot de passe.</div>
                            <div class="wrap-form-reg clearfix">
                                <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
                                    <div class="left-form">
										<label class="wrap-txt" for="sys_raison_reg">
											<input class="input-txt" id="sys_raison_reg" placeholder="Raison social" type="text" name="FORM_SOCIETE" style="width:99%">
										</label>
                                        <label class="wrap-txt" for="">
                                            <input class="input-txt" id="sys_nom_reg" placeholder="Nom & Prénom" type="text" name="FORM_NOM">
                                            <input class="input-txt" id="sys_email_reg" placeholder="aaa@mail.com" type="email" name="FORM_EMAIL">
                                        </label>
                                        <label class="wrap-txt" for="">
                                            <input class="input-txt" id="sys_pass_reg" placeholder="Mot de passe" type="password" name="FORM_PASSWORD">
                                            <input class="input-txt" id="sys_pass_2" placeholder="Confimer" type="password" name="FORM_PASSWORD2">
                                        </label>
										<label class="wrap-txt" for="sys_pass_adrs">
                                            <input class="input-txt" id="sys_adrs" placeholder="Adresse" type="text" name="FORM_ADRESSE">
                                            <input class="input-txt" id="sys_tel" placeholder="Tél" type="text" name="FORM_TEL">
                                        </label>
                                        <label class="wrap-check" for="sys_chk_news_reg">
                                            <input id="sys_chk_news_reg" class="input-chk" name="FORM_NEWSLETTER" type="checkbox"> Envoyez-moi les offres spéciales de Groupromo.ma.
                                            <i class="icon iUncheck"></i>
                                        </label>
                                    </div>
                                    <div class="right-connect">
                                        <button class="btn-flat yellow btn-submit-reg" type="submit" name="ESPACE_MEMBRE_FORM_INSCRIPTION">Créer un compte</button>
                                        <div class="sep-connect">
                                            <span>Ou</span>
                                        </div>
                                        <div class="grp-connect">
                                            <p class="rs">Inscrivez-vous en utilisant votre compte:</p>
                                            <a class="btn-flat fb" href="/login.php?provider=facebook">Facebook</a>
                                            <a class="btn-flat gg" href="/login.php?provider=Google">Google</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <p class="rs wrap-link-back">
                                <a id="sys_link_login_panel" href="login.html" class="link-back">
                                    <i class="pick-r"></i>
                                    Retour à la connexion
                                </a>
                            </p>
                        </div><!--end: Register panel -->
                    </div>
                    <div id="sys_paging_state" class="paging-state">
                        <i class="active"></i>
                        <i></i>
                    </div>
                    <i id="sys_close_login_popup" class="icon iClose close-popop"></i>
                </div>
            </div>
        </header><!--end: header.mod-header -->