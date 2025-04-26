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
    fetch('http://localhost/devstore/produtos.php'+'?categoriaProd='+cat)
    .then(response=>response.json())
    .then(data=>{
        //pega os elementos do html
        const divProds = document.getElementById('produtosGrid');
        divProds.replaceChildren();
        const qtde = document.getElementById('qtde');
        const breadcrumb = document.getElementById('breadcrumb');
        breadcrumb.replaceChildren();
        breadcrumb.textContent = 'Home >' +cat;
        // estrutura de repeticao para alimentar os vetores
        for(var i=0;i<data.length;i++){
            // push adiciona item no final do vetor
            idsProds.push(data[i].idProd);
            descProds.push(data[i].descProd);
            precoProds.push(data[i].precoProd);
            categoriaProds.push(data[i].categoriaProd);
            tamanhoProds.push(data[i].tamanhoProd);
            fotoProds.push(data[i].fotoProd);
        }
        //altera o elemento qtde
        qtde.textContent = idsProds.length + ' produtos';
        for(var j=0;j< idsProds.length;j++){
            var id = idsProds[j];
            var desc = descProds[j];
            var tamanho = tamanhoProds[j];
            var preco = precoProds[j];
            var foto = fotoProds[j];
            var categoria = categoriaProds[j];
            //cria o card como div
            var cardProd = document.createElement('div');
            cardProd.setAttribute('class','product-item');
            cardProd.innerHTML = '<a href="./product.html?idProd='+id+'">'+
            '<div class="product-photo">'+'<img src="./assets/images/products/'+foto+'"/></div>'+
            '<div class="product-name">'+desc+'</div>'+
            '<div class="product-price">'+preco+'</div>'+
            '<div class="product-info">Pagamento via Pix</div>'+'</a>'+
            '<div class="product-fav">'+'<img src="./assets/images/ui/heart-3-line.png"/>'+'</div>';
            // adicionar o card no grid de produtos
            divProds.appendChild(cardProd);
        }
    })
    .catch(error=>{alert("Erro: "+error);
    });
}