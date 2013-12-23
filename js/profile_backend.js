var profileBackend = {
	init: function(config) {

	},
//initialize FB
	initFB: function() {
		FB.init({
			appId      : '430939383625961', // App ID from the App Dashboard
			channelUrl : '//WWW.YOUR_DOMAIN.COM/channel.html', // Channel File for x-domain communication
			status     : true, // check the login status upon init?
			cookie     : true, // set sessions cookies to allow your server to access the session?
			xfbml      : true  // parse XFBML tags on this page?
		});
	},
	get_fb_id: function() {
			//set FB.id cookie value
				var c_id = "fb_id";
				var c_id_value = document.cookie;
				//calculating chars to the c_name in cookie
				var c_id_start = c_id_value.indexOf(" " + c_id + "=");
				//check if cookie user_id exists
				if (c_id_start == -1) {
					c_id_start = c_id_value.indexOf(c_id + "=");
					//if c_name cookie does not exist then create it with parameters 
					document.cookie = "fb_id=" + ";domain=.gokit.tk;path=/";
				}
				if (c_id_start == -1) {
					c_id_value = null;
					//if c_name cookie does not exist then create it with parameters
					document.cookie = "fb_id=" + ";domain=.gokit.tk;path=/";
				}
				//if c_name cookie exists
				else {
					//calculate length of the value of the c_name cookie
					c_id_start = c_id_value.indexOf("=", c_id_start) + 1;
					var c_id_end = c_id_value.indexOf(";", c_id_start);
					if (c_id_end == -1) {
						c_id_end = c_id_value.length;
					}
					//get the c_name cookie value
					c_id_value = unescape(c_id_value.substring(c_id_start,c_id_end));
					//if c_name cookie value equals 0 get user name from FB.api
					if (c_id_value.length == 0) {
						// profile.showUserDetailes(getUrlParam.init('id'));
						return (false);
					}
					else {
						// profile.showUserDetailes(c_id_value);
						return (c_id_value);
					}
				};
	},
	//if user is authorized in FB enable or disable editing data
	ifAuthorized: function(fb_id) {
		var user_id = getUrlParam.init('id');
		
		FB.getLoginStatus(function(response) {
			if(response.status === 'connected') {	
				FB.api('/me', function(response) {
					//if logged in user is not the owner of the profile
					if (response.id != user_id) {
						return false;
					}
					else if (response.id == user_id) {
						return true;
					};
				});
			}
			else if(response.status === 'not_authorized') {
				FB.api('/me', function(response) {
					console.log(response.id, user_id);
					if (response.id != user_id) {
						return false;
					}
				});
			}
			else {
				FB.api('/me', function(response) {
					console.log(response.id, user_id);
					if (response.id != user_id) {
						return false;
					}
				});				
			};
		});
	}
};