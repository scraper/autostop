<?php include '_partials/header.php'; ?>
<p>Your facebook username is:</p>
<a id="fb_page" href=""><p id="fb_username"></p></a>
<div id="fb-root"></div>
<p id="fb_share" onclick="user_init()">FB Share</p>

<script type="text/javascript">

function doit(id,name,username) {
  $.ajax({
      url: './login.php',
      type: 'post',
      data: {id: id,name:name,username:username},
      success: function (data) {
        console.log(data);
      }
    });
  console.log(id,name,username)
};
function user_init(){
	FB.api('/me', function(response) {
    doit(response.id,response.name,response.username);
	});
};
</script>

<?php include '_partials/footer.php'; ?>