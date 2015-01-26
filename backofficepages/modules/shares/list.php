<?php

	$sql=mysql_query('select * from shares order by id desc');
?>
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Shares</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Liste des shares
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Date Share</th>
                                            <th>Company</th>
                                            <th>Title</th>
                                            <th>Share User</th>
                                            <th>Paye</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
										while($data=mysql_fetch_array($sql)){
									?>
                                        <tr class="odd gradeX" <?php if($data['paye']==1) { echo 'style="background:green"';} else { echo 'style="background:red"'; } ?>>
											<td><?php echo $data['created']; ?></td>
											<td><?php echo getCompanyNameByAd($data['ad_id']); ?></td>
											<td><?php echo $data['title']; ?></td>
											<td><?php echo getUserNameByAd($data['user_id']); ?></td>
											<td><?php echo $data['paye']; ?></td>
											<td><a href="index.php?action=edit_ad&id=<?php echo $data['id']; ?>"><i class="fa fa-edit fa-fw"></i> Edit</a></td>
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