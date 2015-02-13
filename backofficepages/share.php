<html xmlns="http://www.w3.org/1999/xhtml"
  xmlns:fb="https://www.facebook.com/2008/fbml">
  <head>
    <title>My Feed Dialog Page</title>
  </head>
  <body>
    <div id='fb-root'></div>
    <script src='http://connect.facebook.net/en_US/all.js'></script>
    <p><a onclick='postToFeed(); return false;'>Post to Feed</a></p>
    <p id='msg'></p>

    <script> 
      FB.init({appId: "1562922873946573", status: true, cookie: true});//change your application ID

      function postToFeed() {

        // calling the API ...
        var obj = {
          method: 'feed',
          link: 'https://developers.facebook.com/docs/reference/dialogs/',
          picture: 'http://fbrell.com/f8.jpg',
          name: 'Facebook Dialogs',
          caption: 'Reference Documentation',
          description: 'Using Dialogs to interact with users.'
        };
		
		function callback(response) {
			if (response && response.post_id) {
			  alert('Post was published.');
			} else {
			  alert('Post was not published.');
			}
		  }

        FB.ui(obj, callback);
      }
	  
	  
    
    </script>
	
	<iframe src="http://www.facebook.com/plugins/like_box.php?app_id=&channel=http%3A%2F%2Fstatic.ak.facebook.com%2Fconnect%2Fxd_arbiter%2FDU1Ia251o0y.js%3Fversion%3D41%23cb%3Df2623aecd5679be%26domain%3Dlikebaguette.com%26origin%3Dhttp%253A%252F%252Flikebaguette.com%252Ff344709d7b6f374%26relation%3Dparent.parent&container_width=940&header=false&height=600&href=http%3A%2F%2Fwww.facebook.com%2FMisencil&locale=fr_FR&sdk=joey&show_faces=false&stream=true&width=942" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:1250px; height:100%;" allowTransparency="true"></iframe>
	
	<?php
		// photo profil = https://graph.facebook.com/Misencil/picture/?width=160&height=160
	
		// 178585515507054 = Facebook page ID
		  $url="https://graph.facebook.com/304360739620539";
		 
		  $ch = curl_init();
		  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		  curl_setopt($ch,CURLOPT_URL,$url);
		  curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		  curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,2);
		  $content = curl_exec($ch);
		  $content = json_decode($content);
		 
		  var_dump($content);
		  
		  var_dump($content->name);
		  // output
		  string "Expert Developer" (length=16)
	
	
	?>
	
	
  </body>
</html>