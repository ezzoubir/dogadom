<?php
require 'config.php';
	$link =@mysql_connect(SQL_SVR,SQL_LOGIN,SQL_PASS); 
	@mysql_select_db(SQL_DATABASE);
	mysql_query("SET CHARACTER SET 'utf8';", $link)or die(mysql_error());
	mysql_query("SET NAMES 'UTF8' ");
	
define('PAGE_PER_NO',1); // number of results per page.
	function getPagination($count)
	{
		$paginationCount= floor($count / PAGE_PER_NO);
		$paginationModCount= $count % PAGE_PER_NO;
		if(!empty($paginationModCount))
		{
			$paginationCount++;
		}
		return $paginationCount;
	}
	
	function truncate($string, $max_length = 80, $replacement = '', $trunc_at_space = false)
{
	$max_length -= strlen($replacement);
	$string_length = strlen($string);
	
	if($string_length <= $max_length)
		return $string;
	
	if( $trunc_at_space && ($space_position = strrpos($string, ' ', $max_length-$string_length)) )
		$max_length = $space_position;
	
	return substr_replace($string, $replacement, $max_length);
}

if(isset($_POST['pageId']) && !empty($_POST['pageId']))
{
    $id=$_POST['pageId'];
}
else
{
    $id='0';
}
$pageLimit=PAGE_PER_NO*$id;
$query="select * from coupons order by id desc
limit $pageLimit,".PAGE_PER_NO;
//echo $query;
$res=mysql_query($query);
$count=mysql_num_rows($res);

if($count > 0)
{
    while($dtcp=mysql_fetch_assoc($res)){
							?>
								<?php if($dtcp['date_fin'] > date('Y-m-d')) { ?>
                                <div class="coupons-code-item right-action flex">
                                    <div class="brand-logo thumb-left">
                                        <div class="wrap-logo">
                                            <div class="center-img">
                                                <span class="ver_hold"></span>
                                                <a href="coupon-<?php echo $dtcp['slug']; ?>.html" class="ver_container">
													<img class="lazy" src="images/photos/<?php echo $dtcp['logo']; ?>" alt<?php echo $dtcp['titre']; ?>">
												</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="right-content flex-body">
                                        <p class="rs save-price"><a href="#">Réduction de: <?php echo $dtcp['reduction']; ?> <br/> 
										<?php echo truncate($dtcp['presentation'], 80, '...', true); ?></a></p>
                                        <p class="rs coupon-desc">
											<div class="time-left"><br/>
										<div class="countdown<?php echo $dtcp['id']; ?> styled"></div>
											<script type="text/javascript">
											  $(function() {
												<?php
													$dt = explode('-',$dtcp['date_fin']);
													$monthName = date("F", mktime(0, 0, 0, $dt[1], 10));
												?>
												var endDate = "<?php echo $monthName; ?> <?php echo $dt[2]; ?>, <?php echo $dt[0]; ?> 23:59:59";

												$('.countdown<?php echo $dtcp['id']; ?>.styled').countdown({
												  date: endDate,
												  render: function(data) {
													$(this.el).html("<div>" + this.leadingZeros(data.days, 3) + " <span>jours</span></div><div>" + this.leadingZeros(data.hours, 2) + " <span>heures</span></div><div>" + this.leadingZeros(data.min, 2) + " <span>minutes</span></div><div>" + this.leadingZeros(data.sec, 2) + " <span>secondes</span></div>");
												  }
												});
												});
											</script></div>
										</p>
                                        <div class="bottom-action">
                                            <div class="left-vote">
                                                <span class="lbl-work">100% ça marche</span>
                                                <!--span>
                                                    <span class="lbl-vote"><span class="vtop">12</span> <i class="icon iAddVote"></i></span>
                                                    <span class="lbl-vote"><span class="vbot">2</span> <i class="icon iSubVote"></i></span>
                                                </span-->
                                            </div>
                                            <a class="btn btn-blue btn-view-coupon" href="promo-<?php echo $dtcp['slug']; ?>.html">Détails</a>
                                        </div>
                                    </div>
                                </div><!--end: .coupons-code-item -->
							<?php } }  ?>
<?php }
else
{
   echo 'No Data Found';
}

?>