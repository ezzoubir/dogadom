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
        <h1 class="page-header">Edit Company : <?php echo $data['company']; ?></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
			<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <img src="<?php echo BASE_URL.RepPhoto.'pic_company/'.$data['pic_big']; ?>" width="80px"/>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form">
										<div class="form-group">
                                            <label>Company</label>
                                            <input class="form-control" name="company" value="<?php echo $data['company']; ?>">
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
                                            <label>Phone</label>
                                            <input class="form-control" name="phone" value="<?php echo $data['phone']; ?>">
                                        </div>
										<div class="form-group">
                                            <label>Gsm</label>
                                            <input class="form-control" name="gsm" value="<?php echo $data['gsm']; ?>">
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
                                            <label>Address</label>
                                            <input class="form-control" name="address" value="<?php echo $data['address']; ?>">
                                        </div>
										<button type="submit" name="update" class="btn btn-default">Update</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>