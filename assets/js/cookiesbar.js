$('.cookies-bar button').click(function () {
  var d = new Date();
  d.setTime(d.getTime() + 365 * 24 * 60 * 60 * 1000);
  var expires = 'expires=' + d.toUTCString();
  document.cookie = 'aceptCookies' + '=' + 'acept' + ';' + expires + ';path=/';
  $('.cookies-bar').css({ visibility: 'hidden' });
});

function getCookie(cookieName) {
  var cookie = cookieName + '=';
  var ca = document.cookie.split(';');
  for (var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(cookie) == 0) {
      return c.substring(cookie.length, c.length);
    }
  }
  return '';
}

(function checkCookie() {
  var acept = getCookie('aceptCookies');
  if (acept === '') {
    $('.cookies-bar').css({ visibility: 'visible' });
  }
})();
