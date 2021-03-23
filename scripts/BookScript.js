var snum = 1;
var num;

function wait(num){
  snum = num;
}

function arrowadjust(num) {
  snum = snum + num;
  var max = document.getElementsByClassName('manbtn').length;
  if (snum>max){
    snum=1;
      document.getElementById('p' + snum).checked = true;
  }
  else if (snum<1){
    snum=max;
      document.getElementById('p' + snum).checked = true;
  }
  else {
      document.getElementById('p' + snum).checked = true;
  }
}
