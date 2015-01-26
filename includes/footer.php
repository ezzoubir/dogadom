		<footer id="footer">
            <div class="wrap group">
                <div class="footer-text">
                    <a href="#">Pinfinity</a> &mdash; A Pinterest like site template.
                </div>
            </div>
        </footer>
	</div><!-- #page -->

<script src="js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script src="js/jquery.backstretch.min.js" type="text/javascript"></script>
<script src="js/superfish.js" type="text/javascript"></script>
<script src="js/jquery.isotope.js" type="text/javascript"></script>
<script src="js/jquery.fitvids.js" type="text/javascript"></script>
<script src="js/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script>
<script src="js/jquery.flexslider-min.js" type="text/javascript"></script>
<script src="js/jquery.formLabels1.0.js" type="text/javascript"></script>
<script src="js/jquery.jplayer.js" type="text/javascript"></script>
<script src="js/jquery.ias.min.js" type="text/javascript"></script>

<!--[if (gte IE 6)&(lte IE 8)]><script type="text/javascript" src="js/selectivizr-min.js"></script><![endif]-->
<script defer src="js/scripts.js" type="text/javascript"></script>

<script type="text/javascript">
	jQuery.ias({
	    container   : "#entry-listing",
	    item        : ".entry",
	    pagination  : ".nav",
	    next        : "#nextpage",
	    loader  : "images/ajax-loader.gif",
	    onRenderComplete: function(items) {
	      var $newElems = jQuery(items).addClass("newItem");

	      $newElems.hide().imagesLoaded(function(){
	        if( jQuery(".flexslider").length > 0) {
	          jQuery(".flexslider").flexslider({
	            'controlNav': true,
	            'directionNav': true
	          });
	        }
	        jQuery(this).show();
	        jQuery('#infscr-loading').fadeOut('normal');
	        jQuery("#entry-listing").isotope('appended', $newElems );
	        loadAudioPlayer();
	      });
	    }
    });

	$(document).ready(function(){
		 $.backstretch([
			"images/background1.jpg"
			, "images/background2.jpg"
			, "images/background3.jpg"
			, "images/background4.jpg"
			], {duration: 3000, fade: 750}); 
	})
</script>