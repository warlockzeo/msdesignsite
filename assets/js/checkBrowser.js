(function checkbrowser () {
    var txt = "";
    txt += "<p>Browser Name: " + navigator.appName + "</p>";
    txt += "<p>Browser Version: " + navigator.appVersion + "</p>";
    txt += "<p>User-agent header: " + navigator.userAgent + "</p>";
    alert(txt);
})();