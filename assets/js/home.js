const inputEle = document.getElementById('enter');
/*inputEle.addEventListener('keydown', function(e){
  var key = e.which || e.keyCode;
  if (key == 13) { // codigo da tecla enter
    // colocas aqui a tua função a rodar
    window.open('./produtos.html?descProduto='+this.value, "__self");
    
  }
  alert('carregou enter o valor digitado foi: ' +this.value);
});
*/

inputEle.addEventListener('keydown', function (event) {
    alert("task input onkeydown executed");
    if (event.key == "Enter") {
        window.open('./produtos.html?descProduto='+this.value, "__self");
    }
});
// BANNER
let banners = document.querySelectorAll('.banner-area a');
let counters = document.querySelectorAll('.banner-counter-item');
let currentBanner = 0;
let bannerInterval;

counters.forEach((item, key) => {
    item.addEventListener('click', () => {
        currentBanner = key;
        showBanner(key);
        restartBannerTimer();
    });
});

restartBannerTimer();

function showBanner(n) {
    for (let banner of banners) {
        banner.classList.remove('active');
    }
    for (let counter of counters) {
        counter.classList.remove('active');
    }

    banners[n].classList.add('active');
    counters[n].classList.add('active');
}

function restartBannerTimer() {
    clearInterval(bannerInterval);
    bannerInterval = setInterval(nextBanner, 2000);
}

function nextBanner() {
    if (currentBanner + 1 >= banners.length) {
        currentBanner = 0;
    } else {
        currentBanner++;
    }

    showBanner(currentBanner);
}


