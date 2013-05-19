// window.fbAsyncInit = function() {
//     init the FB JS SDK
//     FB.init({
//       appId      : '430939383625961', // App ID from the App Dashboard
//       channelUrl : '//WWW.YOUR_DOMAIN.COM/channel.html', // Channel File for x-domain communication
//       status     : true, // check the login status upon init?
//       cookie     : true, // set sessions cookies to allow your server to access the session?
//       xfbml      : true  // parse XFBML tags on this page?
//     });

//     // Additional initialization code such as adding Event Listeners goes here
//     FB.getLoginStatus(function(response) {
//       if (response.status === 'connected') {
//     // connected
//       } else if (response.status === 'not_authorized') {
//     // not_authorized
//       } else {
//     // not_logged_in
//       }
//   });
//   };
  
  function fb_login(){

    FB.login(function(response) {
        if (response.authResponse) {
          console.log('Welcome!  Fetching your information.... ');
          FB.api('/me', function(response) {
              console.log('Good to see you, ' + response.name + '.');
              document.getElementById('fb_username').innerHTML = response.name;
            var link = document.getElementById('fb_page');
            link.href = "http://www.facebook.com/" + response.username;
            console.log(response.location);
          });
          window.location.replace("./profile.php");
        }
        else {
          console.log('User cancelled login or did not fully authorize.');
        }
    }, {scope:'publish_actions'});
  };

  function fb_logout() {
    FB.logout(function(response) {
    });
    window.location.reload(true);
  };
function doit(id,name,username) {
  $.ajax({
      url: './login.php',
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