<?php
include '../class/upload.class.inc.php';

function ProposeFichier($UploadingFile)
{
    $charge=false;
    //insertion photo traitement 
    $handle = new upload($UploadingFile);
    if ($handle->uploaded) 
    {
        $FileName='ads_'.time();
        $Rep='../'.RepPhoto.'pic_ads';
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
    
    
    @ $upload=ProposeFichier($_FILES['image']);

	if(isset($_POST['updatead'])){
		if(do_update('ads',$_POST,$_GET['id'])){
			$msg_success = 'les données ont été modifiés avec succès';
		} else {
			$msg_danger = 'erreur de modification';
		}

        if($upload==true) {
            $sql='update ads set image ="'.$upload.'" where id="'.$_GET['id'].'"';
            mysql_query($sql);
        }
	}
    if(isset($_POST['addad'])){
        if(do_insert('ads',$_POST)){
            $msg_success = 'les données ont été enregistrés avec succès';
        } else {
            $msg_danger = 'erreur d\'enregistrement';
        }

        $lastid = mysql_insert_id();
        if($upload==true) {
            $sql='update ads set image ="'.$upload.'" where id="'.$lastid.'"';
            mysql_query($sql);
        }

        $sql='update ads set aid ="'.GetNewId().'" where id="'.$lastid.'"';
        mysql_query($sql);
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
                            <img src="<?php echo BASE_URL.RepPhoto.'pic_ads/'.$data['image']; ?>" width="150px"/>
                        <?php } ?>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form"action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" enctype="multipart/form-data">
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
                                            <label>Image</label>
                                            <input name="image" type="file"/>
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
                                            <input class="form-control" placeholder="13" name="age1" value="<?php if(isset($_GET['id'])){ echo $data['age1']; } ?>">
                                        </div>
										<div class="form-group">
                                            <label>To Age</label>
                                            <input class="form-control" placeholder="65+" name="age2" value="<?php if(isset($_GET['id'])){ echo $data['age2']; } ?>">
                                        </div>
									    <div class="form-group">
                                            <label>Sex</label>
                                            <select class="form-control" name="sex">
                                                <option value=""></option>
                                                <option value="tous" <?php if(isset($_GET['id']) && $data['sex']=='tous'){ echo 'selected'; } ?>>Tous</option>
                                                <option value="male" <?php if(isset($_GET['id']) && $data['sex']=='male'){ echo 'selected'; } ?>>Male</option>
                                                <option value="female" <?php if(isset($_GET['id']) && $data['sex']=='female'){ echo 'selected'; } ?>>Female</option>
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