<?php
	if(isset($_POST['delete']))
	{
	   $sql='update pages_facebook set deleted = 1 where id='.GetImageButtonValue($_POST['delete']);
	   mysql_query($sql);

	}
	$sql=mysql_query('select * from pages_facebook where deleted = 0 order by id desc');
?>
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Pages Facebook</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Liste des pages Facebook
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Company</th>
                                            <th>Id Page Facebook</th>
                                            <th>Page Facebook</th>
                                            <th>N� Like</th>
                                            <th>Active</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
										while($data=mysql_fetch_array($sql)){
									?>
                                        <tr class="odd gradeX">
											<td><?php echo getCompanyName($data['user_id']); ?></td>
                                            <td><?php echo $data['page_id']; ?></td>
											<td><a href="<?php echo $data['page_url']; ?>"><?php echo $data['page_url']; ?></a></td>
                                            <td><?php echo $data['nbr_like']; ?></td>
                                            <td><input type="checkbox" name="active[<?php echo $data['id']; ?>]" <?php if($data['active']==1) echo ' checked '; ?>></td>
                                            <td><a href="index.php?action=edit_pf&id=<?php echo $data['id']; ?>"><i class="fa fa-edit fa-fw"></i> Edit</a>&nbsp;&nbsp;<input type="image" name="delete[<?php echo $data['id']; ?>]" src="imgs/b_drop.gif" onclick='javascript: if(confirm("�tes-vous certain de supprimer cette page facebook ?")){this.submit();} else return false;'></td>
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