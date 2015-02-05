<?php
include '../class/upload.class.inc.php';

function ProposeFichier($UploadingFile)
{
    $charge=false;
    //insertion photo traitement 
    $handle = new upload($UploadingFile);
    if ($handle->uploaded) 
    {
        $FileName='company_'.time();
        $Rep='../'.RepPhoto.'pic_company';
        $ext='.'.$handle->file_src_name_ext;
        $handle->file_new_name_body  = $FileName;
       
        $handle->process($Rep);
       
        $charge=true;
        $handle->clean(); 
        unset($handle);
        $file=$FileName.$ext;
        return $file;
  }
  else return false;
} 

    @ $upload=ProposeFichier($_FILES['pic_big']);

	if($_POST['update']){
		if(do_update('users',$_POST,$_GET['id'])){
			$msg_success = 'les données ont été modifiés avec succès';
		} else {
			$msg_danger = 'erreur de modification'
		}
	}

    if(isset($_POST['addad'])){
        if(do_insert('users',$_POST)){
            $msg_success = 'les données ont été enregistrés avec succès';
        } else {
            $msg_danger = 'erreur d\'enregistrement';
        }

        $lastid = mysql_insert_id();
        if($upload==true) {
            $sql='update users set pic_big ="'.$upload.'" where id="'.$lastid.'"';
            mysql_query($sql);
        }

        $sql='update users set password ="'.GetNewId().'" where id="'.$lastid.'"';
        mysql_query($sql);
    }


    if(isset($_GET['id'])){
	   $sql=mysql_query('select * from users where id="'.$_GET['id'].'"');
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
            <h1 class="page-header">Edit Company : <?php echo $data['company']; ?></h1>
        <?php } else { ?>
            <h1 class="page-header">Ajouter un annonceur</h1>
        <?php } ?>
        
    </div>
    <!-- /.col-lg-12 -->
</div>
			<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <?php if(isset($_GET['id'])){ ?>
                            <img src="<?php echo BASE_URL.RepPhoto.'pic_company/'.$data['pic_big']; ?>" width="80px"/>
                        <?php } ?>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form"action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" enctype="multipart/form-data">
                                       <?php if(!isset($_GET['id'])){ ?>
                                        <div class="form-group">
                                            <label>Image</label>
                                            <input name="pic_big" type="file"/>
                                        </div>
                                        <?php } ?>
										<div class="form-group">
                                            <label>Company</label>
                                            <input class="form-control" name="company" value="<?php if(isset($_GET['id'])){ echo $data['company']; } ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" name="name" value="<?php if(isset($_GET['id'])){ echo $data['company']; } ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input class="form-control" name="first_name" value="<?php if(isset($_GET['id'])){ echo $data['first_name']; } ?>">
                                        </div>
										<div class="form-group">
                                            <label>Last Name</label>
                                            <input class="form-control" name="last_name" value="<?php if(isset($_GET['id'])){ echo $data['last_name']; } ?>">
                                        </div>
										<div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" name="email" value="<?php if(isset($_GET['id'])){ echo $data['email']; } ?>">
                                        </div>
										<div class="form-group">
                                            <label>Phone</label>
                                            <input class="form-control" name="phone" value="<?php if(isset($_GET['id'])){ echo $data['phone']; } ?>">
                                        </div>
										<div class="form-group">
                                            <label>Gsm</label>
                                            <input class="form-control" name="gsm" value="<?php if(isset($_GET['id'])){ echo $data['gsm']; } ?>">
                                        </div>
										<div class="form-group">
                                            <label>City</label>
                                            <input class="form-control" name="city" value="<?php if(isset($_GET['id'])){ echo $data['city']; } ?>">
                                        </div>
										<div class="form-group">
                                            <label>Country</label>
                                            <input class="form-control" name="country" value="<?php if(isset($_GET['id'])){ echo $data['country']; } ?>">
                                        </div>
										<div class="form-group">
                                            <label>Address</label>
                                            <input class="form-control" name="address" value="<?php if(isset($_GET['id'])){ echo $data['address']; } ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Type</label>
                                            <select class="form-control" name="type">
                                                <option value=""></option>
                                                <option value="basic" <?php if(isset($_GET['id']) && $data['type']=='basic'){ echo 'selected'; } ?>>Basic</option>
                                                <option value="premium" <?php if(isset($_GET['id']) && $data['type']=='premium'){ echo 'selected'; } ?>>Premium</option>
                                            </select>
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