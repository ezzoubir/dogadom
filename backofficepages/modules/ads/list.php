<?php
    if(isset($_POST['delete']))
    {
       $sql='update ads set deleted = 1 where id='.GetImageButtonValue($_POST['delete']);
       mysql_query($sql);

    }
	$sql=mysql_query('select * from ads where deleted = 0 order by id desc');
?>
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Annonces</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Liste des annonces
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Company</th>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Description</th>
                                            <th>Url</th>
                                            <th>From Age</th>
                                            <th>To Age</th>
                                            <th>Sex</th>
                                            <th>N° Share</th>
                                            <th>Active</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
										while($data=mysql_fetch_array($sql)){
									?>
                                        <tr class="odd gradeX" <?php if($data['finished']==1) { echo 'style="background:red"';} ?>>
											<td><?php echo getCompanyName($data['user_id']); ?></td>
											<td><?php echo $data['title']; ?></td>
                                            <td><img src="<?php echo BASE_URL.RepPhoto.'pic_ads/'.$data['image']; ?>" width="80px"/></td>
                                            <td><?php echo $data['description']; ?></td>
                                            <td><?php echo $data['url']; ?></td>
                                            <td><?php echo $data['age1']; ?></td>
                                            <td><?php echo $data['age2']; ?></td>
                                            <td><?php echo $data['sex']; ?></td>
                                            <td><?php echo $data['nbr_share']; ?></td>
                                            <td><input type="checkbox" name="active[<?php echo $data['id']; ?>]" <?php if($data['active']==1) echo ' checked '; ?>></td>
                                            <td><a href="index.php?action=edit_ad&id=<?php echo $data['id']; ?>"><i class="fa fa-edit fa-fw"></i> Edit</a>&nbsp;&nbsp;<input type="image" name="delete[<?php echo $data['id']; ?>]" src="imgs/b_drop.gif" onclick='javascript: if(confirm("Êtes-vous certain de supprimer cette annonce ?")){this.submit();} else return false;'></td>
                                        </tr>
									<?php
										}
									?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>