var snum = 1;
var num;
var ppt = setInterval(slideshow, 5000);
function slideshow(){
  document.getElementById('p' + snum).checked = true;
  snum++;
  if (snum>3){
    snum=1;
  }
}
function wait(num){
  snum = num;
  clearInterval(ppt);
  ppt = setInterval(slideshow, 5000);
}
function arrowadjust(num) {
  snum = snum + num;
  clearInterval(ppt);
  if (snum>3){
    snum=1;
      document.getElementById('p' + snum).checked = true;
  }
  else if (snum<1){
    snum=3;
      document.getElementById('p' + snum).checked = true;
  }
  else {
      document.getElementById('p' + snum).checked = true;
  }
  ppt = setInterval(slideshow, 5000);
}
