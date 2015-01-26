<?php
	if($_POST['update']){
		if(do_update('users',$_POST,$_GET['id'])){
			$msg_success = 'les données ont été modifiés avec succès';
		} else {
			$msg_danger = 'erreur de modification'
		}
	}
	$sql=mysql_query('select * from users where id="'.$_GET['id'].'"');
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
        <h1 class="page-header">Edit User : <?php echo $data['first_name'].' '.$data['last_name']; ?></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
			<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <img src="<?php echo BASE_URL.RepPhoto.'pic_users/'.$data['pic_big']; ?>" width="80px"/>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form">
										<div class="form-group">
                                            <label>UID Facebook</label>
                                            <input class="form-control" name="uid_facebook" value="<?php echo $data['uid_facebook']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input class="form-control" name="first_name" value="<?php echo $data['first_name']; ?>">
                                        </div>
										<div class="form-group">
                                            <label>Last Name</label>
                                            <input class="form-control" name="last_name" value="<?php echo $data['last_name']; ?>">
                                        </div>
										<div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" name="email" value="<?php echo $data['email']; ?>">
                                        </div>
										<div class="form-group">
                                            <label>Sex</label>
                                            <input class="form-control" name="sex" value="<?php echo $data['sex']; ?>">
                                        </div>
										<div class="form-group">
                                            <label>Age</label>
                                            <input class="form-control" name="birthday" value="<?php echo $data['birthday']; ?>">
                                        </div>
										<div class="form-group">
                                            <label>City</label>
                                            <input class="form-control" name="city" value="<?php echo $data['city']; ?>">
                                        </div>
										<div class="form-group">
                                            <label>Country</label>
                                            <input class="form-control" name="country" value="<?php echo $data['country']; ?>">
                                        </div>
										<div class="form-group">
                                            <label>Relationship status</label>
                                            <input class="form-control" name="relationship_status" value="<?php echo $data['relationship_status']; ?>">
                                        </div>
										<div class="form-group">
                                            <label>RIB</label>
                                            <input class="form-control" name="rib" value="<?php echo $data['rib']; ?>">
                                        </div>
										<button type="submit" name="update" class="btn btn-default">Update</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>