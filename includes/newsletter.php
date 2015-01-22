<div class="mod-email-newsletter clearfix">
                    <div class="grid_12">
                        <div class="wrap-form clearfix">
                            <div class="left-lbl">
                                <div class="big-lbl">newsletter</div>
                                <div class="sml-lbl">Ne manquez pas la chance!</div>
                            </div>
							<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
                            <div class="wrap-email">
                                <label for="sys_email_newsletter">
                                    <input id="sys_email_newsletter" placeholder="Insérez votre e-mail ici" required="true" type="email" name="FORM_REGISTER_NEWSLETTER_EMAIL">
                                </label>
                            </div>
                            <button class="btn btn-orange btn-submit-email" type="submit" name="FORM_REGISTER_NEWSLETTER_SUBMIT">S'INSCRIRE</button>
							</form>
                        </div>
                    </div>
                </div><!--end: .mod-email-newsletter-->