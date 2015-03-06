<?php
	if($_POST['update']){
		if(do_update('shares',$_POST,$_GET['id'])){
			$msg_success = 'les données ont été modifiés avec succès';
		} else {
			$msg_danger = 'erreur de modification'
		}
	}
	$sql=mysql_query('select * from shares where id="'.$_GET['id'].'"');
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
        <h1 class="page-header">Edit Annonce : <?php echo getCompanyName($data['user_id']); ?></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
			<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <img src="<?php echo BASE_URL.RepPhoto.'pic_ads/'.$data['images']; ?>" width="150px"/>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form">
										<div class="form-group">
                                            <label>Tile</label>
                                            <input class="form-control" name="title" value="<?php echo $data['title']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
											<textarea class="form-control" name="description" rows="3"><?php echo $data['description']; ?></textarea>
                                        </div>
										<div class="form-group">
                                            <label>Url</label>
                                            <input class="form-control" name="url" value="<?php echo $data['url']; ?>">
                                        </div>
										<div class="form-group">
                                            <label>From Age</label>
                                            <input class="form-control" name="age1" value="<?php echo $data['age1']; ?>">
                                        </div>
										<div class="form-group">
                                            <label>To Age</label>
                                            <input class="form-control" name="age2" value="<?php echo $data['age2']; ?>">
                                        </div>
										<div class="form-group">
                                            <label>Sex</label>
                                            <input class="form-control" name="sex" value="<?php echo $data['sex']; ?>">
                                        </div>
										<button type="submit" name="update" class="btn btn-default">Update</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>