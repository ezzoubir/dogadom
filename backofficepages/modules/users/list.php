<?php
    if(isset($_POST['delete']))
    {
       $sql='update users set deleted = 1 where id='.GetImageButtonValue($_POST['delete']);
       mysql_query($sql);

    }
	$sql=mysql_query('select * from users where type="basic" and deleted = 0 order by id desc');
?>
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Membres</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Liste des utilisateurs
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Pic</th>
                                            <th>Sex</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Age</th>
                                            <th>City</th>
                                            <th>Country</th>
                                            <th>Active</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
										while($data=mysql_fetch_array($sql)){
									?>
                                        <tr class="odd gradeX">
                                            <td><img src="<?php echo BASE_URL.RepPhoto.'pic_users/'.$data['pic_big']; ?>" width="80px"/></td>
                                            <td><?php echo $data['sex']; ?></td>
                                            <td><?php echo $data['first_name']; ?></td>
                                            <td><?php echo $data['last_name']; ?></td>
                                            <td><?php echo $data['email']; ?></td>
                                            <td><?php echo $data['birthday']; ?></td>
                                            <td><?php echo $data['city']; ?></td>
                                            <td><?php echo $data['country']; ?></td>
                                            <td><input type="checkbox" name="active[<?php echo $data['id']; ?>]" <?php if($data['active']==1) echo ' checked '; ?>></td>
                                            <td><a href="index.php?action=edit_user&id=<?php echo $data['id']; ?>"><i class="fa fa-edit fa-fw"></i> Edit</a>&nbsp;&nbsp;<input type="image" name="delete[<?php echo $data['id']; ?>]" src="imgs/b_drop.gif" onclick='javascript: if(confirm("Êtes-vous certain de supprimer cet utilisateur ?")){this.submit();} else return false;'></td>
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