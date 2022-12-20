var  nav = document.getElementById('nav');

window.onscroll = function(){

  if (window.pageYOffset >100) {

    nav.style.background = "#007bff";
    nav.style.boxShadow = "0px 4px 2px blue";
  }
  else{
    nav.style.background = "transparent";
    nav.style.boxShadow = "none";
  }
}

function openForm() {
  document.getElementById("myForm").style.display = "block";
  document.getElementById("myDiv").style.display = "none";
}


function closeForm() {
  document.getElementById("myForm").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}

let numDisplay = document.querySelectorAll(".num");
let interval = 3000;


numDisplay.forEach((numDisplays) => {
  let startValue = 0;
  let endValue = parseInt(numDisplays.getAttribute("data-val"));
  let duration = Math.floor(interval / endValue);
  let counter = setInterval(function(){
    startValue += 1;
    numDisplays.textContent = startValue;
    if(startValue == endValue){
      clearInterval(counter);
    }
  }, duration);
});