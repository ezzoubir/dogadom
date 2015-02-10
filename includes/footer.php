<!-- footer -->
	<div id="footer">
		<div class="back_top"></div>
		
		<div class="">
			<div class="container_12 footer_content">
				<div class="grid_6">
					<div class="footer_text">Copyright  2015 &copy;, par <a href="http://www.inovancia.com" target="_blank">Inovancia</a></div>
				</div>
				<div class="grid_6">
					<div class="float_right socialicons">
						<a href="http://facebook.com/" target="_blank" class="social_colored facebook" title="Facebook"></a>
						<a href="http://twitter.com/" target="_blank" class="social_colored twitter" title="Twitter"></a>
						<a href="http://linkedin.com/" target="_blank" class="social_colored linkedin" title="Linkedin"></a>
						<a href="http://skype.com/" target="_blank" class="social_colored skype" title="Skype"></a>
						<a href="mailto:yourmail@mail.com" class="social_colored mail" title="Mail"></a>
					</div>
				</div>
			</div>
		</div>
		<!-- footer bottom end -->
	</div>
	<!-- footer end -->
</div>
<!-- container full end -->
<?php if(isset($_SESSION['id_membre']) && isset($_SESSION['userur']) && $_SESSION['likemypage']==0) { ?>
<!--like page Form -->  
<div id="logindiv">     
    <form class="form" action="#" id="login">
        <img src="button_cancel.png" class="img" id="cancel"/>  
        <h3>Login Form</h3>
        <hr/><br/>
        <p>Merci d’aimer notre page! et Faites gagner de l'argent en partageant des publicités de nos annonceurs et en invitant des amis par votre url.</p>
    </form>
</div>
<?php } ?>
<script src="assets/js/jquery-1.9.0.min.js" type="text/javascript"></script>
<script src="assets/js/jquery.components.js" type="text/javascript"></script>
<script src="assets/js/custom.js" type="text/javascript"></script>
<?php if($_GET['page']==4) { ?>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
<script type="text/javascript">
function initialize() {
  var myLatlng = new google.maps.LatLng(40.714353,-74.005973);
  var mapOptions = {
    zoom: 12,
    center: myLatlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    mapTypeControl: false,
    scrollwheel: false,
    scaleControl: false,
    streetViewControl: false,
    draggable: false,
    panControl: true,
    panControlOptions: {
        position: google.maps.ControlPosition.BOTTOM_CENTER
    },
    zoomControl: true,
    zoomControlOptions: {
        style: google.maps.ZoomControlStyle.LARGE,
        position: google.maps.ControlPosition.LEFT_CENTER
    }
  }
  var map = new google.maps.Map(document.getElementById("map_canvas"),
      mapOptions);
      
  var marker = new google.maps.Marker({
    position: myLatlng,
    title:"Hello World!"
});

// To add the marker to the map, call setMap();
marker.setMap(map);
}
initialize();
</script>
<?php } ?>