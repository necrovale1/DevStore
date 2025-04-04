//cria os vetores para receber dados dos produtos //
var idsProds=[];
var descProds=[];
var precoProds=[];
var tamanhoProds=[];
var fotoProds=[];
var categoriaProds=[];

//função para limpar os vetores
function limpa_vetores(){
    idsProds=[];
    descProds=[];
    precoProds=[];
    tamanhoProds=[];
    fotoProds=[];
    categoriaProds=[];
}
//evento q será executado toda vez q a pagina
//for carregada
window.onload=()=>{
    pesquisaProdutos();
};
//função para requisitar os produtos do backend
function pesquisaProdutos(){
    //limpa os produtos do vetor
    limpa_vetores();
    //faz a requisicao
    fetch('http://localhost/devstore/produtos.php')
    //traz a resposta pra json
    .then(response=>response.json())
    //manipula os dados da resposta
    .then(data=>{
        //pega os grids de produtos
        const divProds = 
            document.getElementById('products-area');
        divProds.replaceChildren();
        const divSeen =
            document.getElementById('products-seen');
        divSeen.replaceChildren();
        //alimenta os vetores com dados do backend
        for(var i=0;i<data.length;i++){
            //push adiciona um item no final
            idsProds.push(data[i].idProd);
            descProds.push(data[i].descProd);
            precoProds.push(data[i].precoProd);
            categoriaProds.push(data[i].categoriaProd);
            tamanhoProds.push(data[i].tamanhoProd);
            fotoProds.push(data[i].fotoProd);
        
        }
        //monta os cards dos produtos
        for(var j=1;j<idsProds.length;j=j+4){
            //variaveis para cada campo
            var id = idsProds[j];
            var desc = descProds[j];
            var tamanho = tamanhoProds[j];
            var preco = precoProds[j];
            var foto = fotoProds[j];
            var categoria = categoriaProds[j];
            //cria div para o card do produto
            var cardProd = document.createElement('div');
            //seta a classe da div
            cardProd.setAttribute('class', 'product-item');
            //escreve card em html
            cardProd.innerHTML = '<a href="./product.html?idProd='+id+'">'+
            '<div class="product-photo">'+'<img src="./assets/images/products/'+foto+'"/>'+
            '</div>'+
            '<div class="product-name">'+desc+'</div>'+
            '<div class="product-price">'+preco+'</div>'+
            '<div class="product-info">Pagamento via Pix</div>'+
            '</a>'+
            '<div class="product-fav">'+
            '<img src="./assets/images/ui/heart-3-line.png" />'+
            '</div></div>';

        // adiciona o card no grid de produtos
            divProds.appendChild(cardProd);
        }

    })
    .catch(error=>{
        alert("Erro:"+error);
    });
}
