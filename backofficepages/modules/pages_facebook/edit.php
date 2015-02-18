<?php
	if($_POST['update']){
		if(do_update('pages_facebook',$_POST,$_GET['id'])){
			$msg_success = 'les données ont été modifiés avec succès';
		} else {
			$msg_danger = 'erreur de modification'
		}
	}

    if(isset($_POST['addad'])){
        if(do_insert('pages_facebook',$_POST)){
            $msg_success = 'les données ont été enregistrés avec succès';
        } else {
            $msg_danger = 'erreur d\'enregistrement';
        }

	$sql=mysql_query('select * from pages_facebook where id="'.$_GET['id'].'"');
	$data=mysql_fetch_array($sql);
?>
<div class="row">
    <div class="col-lg-12">
		<?php if(isset($msg_success)) { ?>
		<div class="alert alert-success">
            <?php echo $msg_success; ?>
        </div>
		<?php } ?>
		<?php if(isset($msg_danger)) { ?>
		<div class="alert alert-danger">
            <?php echo $msg_danger; ?>
        </div>
		<?php } ?>
        <?php if(isset($_GET['id'])) { ?>
            <h1 class="page-header">Modifier la page de : <?php echo getCompanyName($data['user_id']); ?></h1>
        <?php } else { ?>
            <h1 class="page-header">Ajouter une page facebook</h1>
        <?php } ?>
    </div>
    <!-- /.col-lg-12 -->
</div>
			<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form">
										<div class="form-group">
                                            <label>Company</label>
                                            <select class="form-control" name="user_id">
                                            <option value=""></option>
                                            <?php
                                                $sqle='select * from users where type="premium" and active="1"';
                                                $res = mysql_query($sqle);
                                                while ($users=mysql_fetch_array($res)) {
                                                    echo '<option value="'.$users['id'].'"';
                                                    if(isset($_GET['id']) && $data['user_id']==$users['id']){ echo ' selected '; }
                                                    echo '>'.$users['company'].'</option>';
                                                }
                                            ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Page Url</label>
											<input class="form-control" name="page_url" value="<?php if(isset($_GET['id'])){ echo $data['page_url']; } ?>">
                                        </div>
										<div class="form-group">
                                            <label>Page Id</label>
                                            <input class="form-control" name="page_id" value="<?php if(isset($_GET['id'])){ echo $data['page_id']; } ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>N° Like</label>
                                            <input class="form-control" name="nbr_like" value="<?php if(isset($_GET['id'])){ echo $data['nbr_like']; } ?>">
                                        </div>
										<?php if(isset($_GET['id'])){ ?>
                                        <button type="submit" name="updatead" class="btn btn-default">Update</button>
                                        <?php } else { ?>
                                        <button type="submit" name="addad" class="btn btn-default">Add</button>
                                        <?php } ?>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>