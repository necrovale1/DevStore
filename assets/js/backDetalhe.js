//captura o texto da barra de navegação
const queryString = window.location.search;
//captura os parametros vindos na barra de navegação
//tudo depois da interrogação
const urlParams = new URLSearchParams(queryString);
//pega o idProd entre os parametros
var id = urlParams.get('idProd');
//criar os vetores para os produtos relacionados
var idsProds = [];
var descProds = [];
var precoProds = [];
var tamanhoProds = [];
var fotoProds = [];
var categoriaProds = [];

function limpa_vetores(){
    idsProds = [];
    descProds = [];
    precoProds = [];
    tamanhoProds = [];
    fotoProds = [];
    categoriaProds = [];
}
//evento onload, roda com f5 ou toda vez q carregar
window.onload()=>{
    pesquisaProdutos();
};

function pesquisaProdutos(){
    limpa_vetores();
    fetch('http://localhost/devstore/produtos.php'+'?idProd='+id)
    .then(response=>response.json())
    .then(data=>{
        //captura os elementos do html para modificar
        const breadcrumb = document.getElementById('breadcrumb');
        breadcrumb.replaceChildren();
        const divProduct = document.getElementById('product');
        const fotoProd = document.getElementById('fotoProd');
        const idProd = document.getElementById('idProd')
        //11-04 continuar pegando os elementos
    })
}
