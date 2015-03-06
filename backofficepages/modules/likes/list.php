<?php

	$sql=mysql_query('select * from likes order by id desc');
?>
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Likes</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Liste des likes
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Date Like</th>
                                            <th>Page FB</th>
                                            <th>Liker User</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
										while($data=mysql_fetch_array($sql)){
									?>
                                        <tr class="odd gradeX" <?php if($data['paye']==1) { echo 'style="background:green"';} else { echo 'style="background:red"'; } ?>>
											<td><?php echo $data['created']; ?></td>
											<td><?php echo $data['pf_id']; ?></td>
											<td><?php echo getUserNameByAd($data['user_id']); ?></td>
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