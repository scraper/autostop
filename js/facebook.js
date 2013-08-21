  function fb_logout() {
	FB.logout(function(response) {
	  document.cookie = "user_id=" + ";domain=.gokit.tk;path=/";
	  document.cookie = "fb_id=" + ";domain=.gokit.tk;path=/";
	  window.location.reload();
	});
  };
function doit(id,name,username) {
  $.ajax({
	  url: '/login.php',
	  type: 'post',
	  data: {id: id,name:name,username:username},
	  success: function (data) {
		console.log(data);
	  }
	});
  console.log(id,name,username);
  window.location.reload(true);
};
function user_init(){
  FB.login(function(response) {
	if (response.authResponse) {
	  FB.api('/me', function(response) {
		doit(response.id,response.name,response.username);
		setCookie(response.id,response.name,response.username);
	  });
	}
	else {
	  console.log('User cancelled login or did not fully authorize.');
	}    
  })

};

function fb_share() {
  var body = 'Reading JS SDK documentation';
	FB.api('/me/feed', 'post', { message: body }, function(response) {
	  if (!response || response.error) {
		alert('Error occured');
	  } else {
		console.log('Post ID: ' + response.id);
	}
  });
};

function setCookie(id,name,username) {
  document.cookie = "user_id=" + name + ";domain=.gokit.tk;path=/";
  document.cookie = "fb_id=" + id + ";domain=.gokit.tk;path=/";
};