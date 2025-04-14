//captura a barra de endereços do navegador
const queryString = window.location.search;
//captura os parametros existentes na barra de endereços
const urlParams = new URLSearchParams(queryString);
//variavel para pegar a categoria
var cat = urlParams.get('categoriaProd');
//evento do carregamento ou f5
window.onload=()=>{
    pesquisaProdutosCategoria();
}
//cria os vetores
var idsProds = [];
var descProds = [];
var precoProds = [];
var tamanhoProds = [];
var fotoProds = [];
var categoriaProds = [];
//limpa os vetores
function limpa_vetores(){
    idsProds = [];
    descProds = [];
    precoProds = [];
    tamanhoProds = [];
    fotoProds = [];
    categoriaProds = [];
}
//traz os produtos por categoria
function pesquisaProdutosCategoria(){
    //limpa os vetores
    limpa_vetores();
    //continua em 25/04
}