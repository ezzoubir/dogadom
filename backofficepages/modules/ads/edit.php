<?php
	if(isset($_POST['updatead'])){
		if(do_update('ads',$_POST,$_GET['id'])){
			$msg_success = 'les données ont été modifiés avec succès';
		} else {
			$msg_danger = 'erreur de modification';
		}
	}
    if(isset($_POST['addad'])){
        if(do_insert('ads',$_POST)){
            $msg_success = 'les données ont été enregistrés avec succès';
        } else {
            $msg_danger = 'erreur d\'enregistrement';
        }
    }
    if(isset($_GET['id'])){
    	$sql=mysql_query('select * from ads where id="'.$_GET['id'].'"');
    	$data=mysql_fetch_array($sql);
    }
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
        <?php if(isset($_GET['id'])){ ?>
            <h1 class="page-header">Modifier l'annonce de : <?php echo getCompanyName($data['user_id']); ?></h1>
        <?php } else { ?>
            <h1 class="page-header">Ajouter une annonce</h1>
        <?php } ?>
        
    </div>
    <!-- /.col-lg-12 -->
</div>
			<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <?php if(isset($_GET['id'])){ ?>
                            <img src="<?php echo BASE_URL.RepPhoto.'pic_ads/'.$data['images']; ?>" width="150px"/>
                        <?php } ?>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form">
                                        <div class="form-group">
                                            <label>Image</label>
                                            <input class="form-control" name="image" type="file"/>
                                        </div>
										<div class="form-group">
                                            <label>Tile</label>
                                            <input class="form-control" name="title" value="<?php if(isset($_GET['id'])){ echo $data['title']; } ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
											<textarea class="form-control" name="description" rows="3"><?php if(isset($_GET['id'])){ echo $data['description']; } ?></textarea>
                                        </div>
										<div class="form-group">
                                            <label>Url</label>
                                            <input class="form-control" name="url" value="<?php if(isset($_GET['id'])){ echo $data['url']; } ?>">
                                        </div>
										<div class="form-group">
                                            <label>From Age</label>
                                            <input class="form-control" name="age1" value="<?php if(isset($_GET['id'])){ echo $data['age1']; } ?>">
                                        </div>
										<div class="form-group">
                                            <label>To Age</label>
                                            <input class="form-control" name="age2" value="<?php if(isset($_GET['id'])){ echo $data['age2']; } ?>">
                                        </div>
										<div class="form-group">
                                            <label>Sex</label>
                                            <input class="form-control" name="sex" value="<?php if(isset($_GET['id'])){ echo $data['sex']; } ?>">
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