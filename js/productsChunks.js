let productsJuices = document.querySelectorAll('.products-chunk');//-fresh-juices page JUICES CARDS
let productsJuicesChunkBtn = document.querySelectorAll('.chunk-btn');//-fresh-juices page JUICES CARDS
let chunkBtnForward = document.querySelector('#chunk-btn-forward');//-fresh-juices page CHUNKs
let chunkBtnBackward = document.querySelector('#chunk-btn-backward');//-fresh-juices page CHUNKs

// ***** FORWARD, BACKWARD and NUM-go BTN FOR PRODUCTS (fresh_juices page) *****
let tempActiveChunkBtnCount = 0;

chunkBtnForward.addEventListener('click', chunkForward);
chunkBtnBackward.addEventListener('click', chunkBackward);

productsJuices[0].style.display = 'block';
productsJuicesChunkBtn[0].className = "w3-bar-item w3-button w3-hover-dark-grey w3-dark-grey w3-circle";

for (let i = 0; i < productsJuices.length; i++) {
  productsJuicesChunkBtn[i].addEventListener('click',function (e) {
    for (let j = 0; j < productsJuices.length; j++) {
      productsJuices[j].style.display = 'none';
      productsJuicesChunkBtn[j].className = "w3-bar-item w3-button w3-ripple w3-hover-dark-grey w3-circle";
    }
    this.parentElement.parentElement.parentElement.children[i].style.display = 'block';
    this.className = "w3-bar-item w3-button w3-hover-dark-grey w3-dark-grey w3-circle";
    window.navigator.vibrate(30);
    tempActiveChunkBtnCount = i;
  });
}

function chunkBackward(e) {
  for (let j = 0; j < productsJuices.length; j++) {
      productsJuices[j].style.display = 'none';
      productsJuicesChunkBtn[j].className = "w3-bar-item w3-button w3-hover-dark-grey w3-circle";
  }
  tempActiveChunkBtnCount--;
  if (tempActiveChunkBtnCount < 0) {
    e.preventDefault();
    tempActiveChunkBtnCount = 0;
  }
  this.parentElement.parentElement.parentElement.children[tempActiveChunkBtnCount].style.display = 'block';
  productsJuicesChunkBtn[tempActiveChunkBtnCount].className = "w3-bar-item w3-button w3-hover-dark-grey w3-dark-grey w3-circle";
  this.className = "w3-bar-item w3-button w3-circle";
  window.navigator.vibrate(30);
}

function chunkForward(e) {
  for (let j = 0; j < productsJuices.length; j++) {
      productsJuices[j].style.display = 'none';
      productsJuicesChunkBtn[j].className = "w3-bar-item w3-button w3-hover-dark-grey w3-circle";
  }
  tempActiveChunkBtnCount++;
  if (tempActiveChunkBtnCount == productsJuices.length) {
    e.preventDefault();
    tempActiveChunkBtnCount = productsJuices.length-1;
  }
  this.parentElement.parentElement.parentElement.children[tempActiveChunkBtnCount].style.display = 'block';
  productsJuicesChunkBtn[tempActiveChunkBtnCount].className = "w3-bar-item w3-button w3-hover-dark-grey w3-dark-grey w3-circle";
  this.className = "w3-bar-item w3-button w3-circle";
  window.navigator.vibrate(30);
}
// *****************************************************************************