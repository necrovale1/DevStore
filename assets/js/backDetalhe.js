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
window.onload=()=>{
    pesquisaProduto();
};

function pesquisaProduto(){
    limpa_vetores();
    fetch('http://localhost/devstore/produtos.php?idProd='+id)
    .then(response=>response.json())
    .then(data=>{
        //captura os elementos do html para modificar
        const breadcrumb = document.getElementById('breadcrumb');
        breadcrumb.replaceChildren();
        const divProduct = document.getElementById('product');
        const fotoProd = document.getElementById('fotoProd');
        const idProd = document.getElementById('idProd')
        //11-04 continuar pegando os elementos
        const nomeProd = document.getElementById("nomeProd");
        const tamanhoProd = document.getElementById("tamProd");
        const precoProd = document.getElementById("precoProd");
        const descProd = document.getElementById("descProd");
        const precoCheio = document.getElementById("precoCheio");
        //variaveis para receber os dados
        var id = data[0].idProd;
        var desc = data[0].descProd;
        var tamanho = data[0].tamanhoProd;
        var preco = data[0].precoProd;
        var foto = data[0].fotoProd;
        var categoria = data[0].categoriaProd;
        //colocar os valores nos elementos do html
        breadcrumb.textContent = 'Home > '+categoria+' > '+desc;
        fotoProd.setAttribute('src','./assets/images/products/'+foto);
        idProd.textContent = 'Cód: '+id;
        nomeProd.textContent = desc;
        tamanhoProd.innerHTML = '<div class="btn-icon">'+tamanho+'</div>';
        precoProd.textContent = 'R$: '+preco;
        descProd.innerHTML = desc+'<br>'+desc+'<br>'+'<br>'+desc;
        let precoNormal = preco * 1.5;
        precoCheio.innerHTML = 'de <span> R$ '+precoNormal.toFixed(2)+'</span> por';

        pesquisaProdutos();
       
    })
    .catch(erro=>{
        alert("Erro: "+erro);
    });
}

//função para relacionamentos
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
            alert("Error: "+error);
        });
}