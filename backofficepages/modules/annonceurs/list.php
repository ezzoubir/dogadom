<?php
    if(isset($_POST['delete']))
    {
       $sql='update users set deleted = 1 where id='.GetImageButtonValue($_POST['delete']);
       mysql_query($sql);

    }

    if(isset($_POST['save']))
  {
      // id_membre =
      $id_annonceur=GetImageButtonValue($_POST['save']);
      if(isset($_POST['active'][$id_annonceur]))
      {
          $sql='update  users set active="1" where id="'.$id_annonceur.'"';
          mysql_query($sql);
      } else
      {
      
        $sql='update users set active="0" where id="'.$id_annonceur.'"';
        mysql_query($sql);
      }
}
	$sql=mysql_query('select * from users where type="premium" and deleted = 0 order by id desc');
?>
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Annonceurs</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Liste des annonceurs
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                            <form role="form" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" enctype="multipart/form-data">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Pic</th>
                                            <th>Company</th>
                                            <th>Address</th>
                                            <th>Responsable</th>
                                            <th>Phone</th>
                                            <th>Gsm</th>
                                            <th>Email</th>
                                            <th>Country</th>
                                            <th>City</th>
                                            <th>Active</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
										while($data=mysql_fetch_array($sql)){
									?>
                                        <tr class="odd gradeX">
                                            <td><img src="<?php echo BASE_URL.RepPhoto.'pic_company/'.$data['pic_big']; ?>" width="80px"/></td>
                                            <td><?php echo $data['company']; ?></td>
                                            <td><?php echo $data['address']; ?></td>
                                            <td><?php echo $data['first_name'].' '.$data['last_name']; ?></td>
                                            <td><?php echo $data['phone']; ?></td>
                                            <td><?php echo $data['gsm']; ?></td>
                                            <td><?php echo $data['email']; ?></td>
                                            <td><?php echo $data['country']; ?></td>
                                            <td><?php echo $data['city']; ?></td>
                                            <td><input type="checkbox" name="active[<?php echo $data['id']; ?>]" <?php if($data['active']==1) echo ' checked '; ?>></td>
                                            <td><a href="index.php?action=edit_annonceur&id=<?php echo $data['id']; ?>"><img src="imgs/edit.png" /></a>&nbsp;&nbsp;<input type="image" name="delete[<?php echo $data['id']; ?>]" src="imgs/delete.png" onclick='javascript: if(confirm("Êtes-vous certain de supprimer cet annonceur ?")){this.submit();} else return false;'>
                                            <input type="image" name="save[<?php echo $data['id']; ?>]" src="imgs/save.png">
                                            </td>
                                        </tr>
									<?php
										}
									?>
                                    </tbody>
                                </table>
                            </form>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>