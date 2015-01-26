<?php
	if(isset($_POST['delete']))
	{
	   $sql='delete from pages_facebook where id='.GetImageButtonValue($_POST['delete']);
	   mysql_query($sql);

	}
	$sql=mysql_query('select * from pages_facebook order by id desc');
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
                                            <th>Page Facebook</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
										while($data=mysql_fetch_array($sql)){
									?>
                                        <tr class="odd gradeX">
											<td><?php echo getCompanyName($data['user_id']); ?></td>
											<td><a href="<?php echo $data['page_url']; ?>"><?php echo $data['page_url']; ?></a></td>
											<td><input type="image" name="delete[<?php echo $data['id']; ?>]" src="imgs/b_drop.gif" onclick='javascript: if(confirm("Êtes-vous certain de supprimer cette page facebook ?")){this.submit();} else return false;'></td>
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