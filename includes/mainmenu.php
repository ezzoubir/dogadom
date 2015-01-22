<nav id="mp-menu" class="mp-menu alternate-menu mp-overlap right-side">
            <div data-level="1" class="mp-level">
                <h2>Menu</h2>
                <ul>
                    <li><a href="accueil.html">Accueil</a></li>
                    <li><a href="promos.html">Promos</a></li>
                    <li><a href="marchands.html">Marchands</a></li>
                    <li><a href="catalogues.html">Catalogues</a></li>
                    <li><a class="try" id="try-3" href="javascript:void(0);" title="">Contact</a></li>
                    <?php if(isset($_SESSION['id_membre'])) { ?>
                    <li>
                        <a href="mes-promos.html">Mes promos</a>
                            <i class="icon iPickRed lbl-count"><span><?php echo getCoupnByUserTotal($_SESSION['id_membre']); ?></span></i>
                    </li>
                                    <?php } ?>
                    <?php if(isset($_SESSION['id_membre'])) { ?>
                    <li><a href="deconnexion.html">Déconnexion</a></li>
                        <?php } else { ?>
                    <li><a id="sys_head_login" href="javascript:void(0);">Connexion</a></li>
                    <?php } ?>
                </ul>
            </div>
        </nav><!--end: .mp-menu -->