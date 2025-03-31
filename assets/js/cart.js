// Função para obter o carrinho do localStorage ou inicializar um carrinho vazio
function getCart() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    return cart;
  }
  
  // Função para salvar o carrinho no localStorage
  function saveCart(cart) {
    localStorage.setItem('cart', JSON.stringify(cart));
  }
  const inputEle = document.getElementById('enter');
inputEle.addEventListener('keyup', function(e){
  var key = e.which || e.keyCode;
  if (key == 13) { // codigo da tecla enter
    // colocas aqui a tua função a rodar
    window.open('./produtos.html?descProduto='+this.value);
    //alert('carregou enter o valor digitado foi: ' +this.value);
  }
});