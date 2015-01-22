<footer class="mod-footer">
            <div class="footer-top">
                <div class="grid_frame">
                    <div class="container_grid clearfix">
                        <div class="grid_3">
                            <div class="company-info">
                                <img src="images/logo-gray.png" alt="CouponDay">
                                <p class="rs">Toutes les promotions, les prospectus, les catalogues et les bonnes affaires proches de chez-vous.</p>
                                <p class="rs">
                                    Avenue Anfa N 256 Etage 5 <br>
                                    Bureau 6 Casablanca
                                </p>
                            </div>
                        </div>
                        <div class="grid_3">
                            <div class="block social-link">
                                <h3 class="title-block">Suivez nous</h3>
                                <div class="block-content">
                                    <ul class="rs">
                                        <li>
                                            <i class="fa fa-facebook-square fa-2x"></i>
                                            <a href="#" target="_blank">Aimez nous sur Facebook</a>
                                        </li>
                                        <li>
                                            <i class="fa fa-twitter-square fa-2x"></i>
                                            <a href="#" target="_blank">Suivez nous sur Twitter</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div><!--end: Follow us -->
                        <div class="grid_3">
                            <div class="block intro-video">
                                <h3 class="title-block">Contactez nous</h3>
                                <div class="block-content">
                                    <form action="<?php echo $_SERVER['REQUEST_URI']?>" method="post">
										<label class="wrap-txt" for="">
                                            <input class="input-txt" id="sys_nom" placeholder="Nom é Prenom" type="text" name="FORM_NAME">
											<input class="input-txt" id="sys_ville" placeholder="Ville" type="text" name="FORM_VILLE">
											<input class="input-txt" id="sys_email" placeholder="Email" type="text" name="FORM_EMAIL">
											<input class="input-txt" id="sys_sujet" placeholder="Sujet" type="text" name="FORM_SUJET">
											<textarea name="FORM_MESSAGE" placeholder="Message"></textarea>
											<button class="btn-flat gr btn-submit-reg" type="submit" name="CONTACT_FORM_ENVOYER">Connexion</button>
                                        </label>
									</form>
                                </div>
                            </div>
                        </div><!--end: Intro Video -->
                        <div class="grid_3">
                            <div class="block blog-recent">
                                <h3 class="title-block">Carte Fidélité</h3>
                                <div class="block-content">
                                    <div class="entry-item flex">
                                        <a class="try" id="try-1" href="javascript:void(0);" title="">
                                            <img src="images/carte.png" alt="carte groupormo" style="width:245px">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div><!--end: blog-recent -->
                    </div>
                </div>
            </div><!--end: .foot-top-->
            <div class="foot-copyright">
                <div class="grid_frame">
                    <div class="container_grid clearfix">
                        <div class="left-link">
                            <a href="accueil.html">Accueil</a>
                            <a href="mentions.html">Mentions légales</a>
                            <a class="try" id="try-2" href="javascript:void(0);" title="">Demande un devis</a>
                            <a class="try" id="try-4" href="javascript:void(0);" title="">Contact</a>
                        </div>
                        <div class="copyright">
                            www.lespromos.ma Copyright © 2014 by INOVANCIA
                        </div>
                    </div>
                </div>
            </div>
        </footer>
<?php
  if(isset($inscription_newsletter))
  {
      echo '<script type="text/javascript">alert("'.$inscription_newsletter.'");</script>';
  }
?>