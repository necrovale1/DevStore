<?php
//verifica se tem sessão e
//caso nao tenha, vai pra login
session_start();
if(!isset($_SESSION['username'])){
    header("Location: login.html");
    exit();
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEVstore</title>
    <link rel="stylesheet" href="assets/css/global.css" />
    <link rel="stylesheet" href="assets/css/header.css" />
    <link rel="stylesheet" href="assets/css/newsletter.css" />
    <link rel="stylesheet" href="assets/css/footer.css" />
    <link rel="stylesheet" href="assets/css/home.css" />
    <link rel="stylesheet" href="./assets/css/cadastro.css" />
    <!-- <link rel="stylesheet" href="assets/css/single-product.css" /> -->
</head>

<body>
    
    <section class="header-warning">
        <div class="mobile"><span>FRETE GRÁTIS</span> para todo o Brasil!</div>
        <div class="desktop"><span>FRETE GRÁTIS</span> para todo o Brasil nas compras acima de R$ 199,00.
            <span>APROVEITA!</span>
        </div>
    </section>
    <header>
        <div class="header-main">
            <div class="header-left">
                <a class="logo" href="./index.html">
                    <img src="assets/images/ui/logo-black.png" alt="DEVstore" />
                </a>
                <ul>
                    <li><a href="produtos.html">Camisetas</a></li>
                    <li><a href="produtos.html">Kits DEVstore</a></li>
                    <li><a href="produtos.html">Acessórios</a></li>
                    <li><a href="produtos.html">Eletrônicos</a></li>
                </ul>
            </div>
            <div class="header-right">
                <input class="search" type="text" placeholder="Pesquisa"/>
                <a href="login.html" class="btn-icon">
                    <img src="assets/images/ui/user-line.png" alt="login"/>
                </a>
                <a href="checkout.html" class="btn-icon">
                    <img src="assets/images/ui/shopping-bag-4-line.png" alt="" />
                </a>
                <a class="btn-icon menu-burger">
                    <img class="off" src="assets/images/ui/menu-line.png" alt="" />
                    <img class="on" src="assets/images/ui/menu-line-white.png" alt="" />
                </a>
            </div>
        </div>
        <div class="header-menu">
            <a href="produtos.html">Camisetas</a>
            <a href="produtos.html">Kits DEVstore</a>
            <a href="produtos.html">Acessórios</a>
            <a href="produtos.html">Eletrônicos</a>
        </div>
        <div class="header-search">
            <input class="search" type="text" placeholder="O que você procura?" />
        </div>
    </header>
    <main>
        <section class="cadastro-produto">
            <h2>Cadastro de Produto</h2>
            <form class="form-cadastro" action="./insereProduto.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="descProd">Descrição do Produto:</label>
                    <input type="text" id="descProd" name="descProd" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="precoProd">Preço do Produto:</label>
                    <input type="number" id="precoProd" name="precoProd" step="0.01" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="categoriaProd">Categoria do Produto:</label>
                    <select id="categoriaProd" name="categoriaProd" required class="form-control">
                        <option value="">Selecione</option>
                        <option value="Acessórios">Acessórios</option>
                        <option value="Camisetas">Camisetas</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tamanhoProd">Tamanho do Produto:</label>
                    <select id="tamanhoProd" name="tamanhoProd" class="form-control">
                        <option value="">Selecione</option>
                        <option value="P">P</option>
                        <option value="M">M</option>
                        <option value="G">G</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="fotoProd">Foto do Produto:</label>
                    <input type="file" id="foto" name="foto" accept="image/*" required class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Cadastrar Produto</button>
            </form>
        </section>
    </main>
    <!-- <main>

        <section class="banner">
            <div class="banner-area">
                <a href="./produtos.html" class="active">
                    <img src="./assets/images/banners/banner-1.png" alt="" />
                </a>
                <a href="./produtos.html">
                    <img src="./assets/images/banners/banner-2.png" alt="" />
                </a>
                <a href="./produtos.html">
                    <img src="./assets/images/banners/banner-3.png" alt="" />
                </a>
                <a href="./produtos.html">
                    <img src="./assets/images/banners/banner-4.png" alt="" />
                </a>
            </div>
            <div class="banner-counter-area">
                <div class="banner-counter">
                    <div class="banner-counter-item active">
                        <div class="banner-counter-point"></div>
                    </div>
                    <div class="banner-counter-item">
                        <div class="banner-counter-point"></div>
                    </div>
                    <div class="banner-counter-item">
                        <div class="banner-counter-point"></div>
                    </div>
                    <div class="banner-counter-item">
                        <div class="banner-counter-point"></div>
                    </div>
                </div>
            </div>
        </section>

        <section class="warnings">
            <div class="warning">
                <div class="warning-icon">
                    <img src="assets/images/ui/truck-line.png" alt="" />
                </div>
                <div class="warning-info">
                    <div class="warning-title">Frete Grátis</div>
                    <div class="warning-subtitle">Para todo o Brasil</div>
                </div>
            </div>
            <div class="warning">
                <div class="warning-icon">
                    <img src="assets/images/ui/discount-percent-line.png" alt="" />
                </div>
                <div class="warning-info">
                    <div class="warning-title">Muitas ofertas</div>
                    <div class="warning-subtitle">Ofertas imbatíveis</div>
                </div>
            </div>
            <div class="warning">
                <div class="warning-icon">
                    <img src="assets/images/ui/arrow-left-right-line.png" alt="" />
                </div>
                <div class="warning-info">
                    <div class="warning-title">Troca fácil</div>
                    <div class="warning-subtitle">No período de 30 dias</div>
                </div>
            </div>
        </section>

        <section class="product-list">
            <h4>Produtos mais vistos</h4>
            <h5>Campeões de visualização da nossa loja.</h5>
            <div class="products-area">

                <div class="product-item">
                    <a href="product.html">
                        <div class="product-photo">
                            <img src="assets/images/products/camiseta-css.png" alt="" />
                        </div>
                        <div class="product-name">Camisa CSS - Azul</div>
                        <div class="product-price">R$ 59,90</div>
                        <div class="product-info">Pagamento via PIX</div>
                    </a>
                    <div class="product-fav">
                        <img src="assets/images/ui/heart-3-line.png" alt="" />
                    </div>
                </div>
                <div class="product-item">
                    <a href="product.html">
                        <div class="product-photo">
                            <img src="assets/images/products/adesivoHTML.png" alt="" />
                        </div>
                        <div class="product-name">Adesivo HTML</div>
                        <div class="product-price">R$ 9,90</div>
                        <div class="product-info">Pagamento via PIX</div>
                    </a>
                    <div class="product-fav">
                        <img src="assets/images/ui/heart-3-line.png" alt="" />
                    </div>
                </div>
                <div class="product-item">
                    <a href="product.html">
                        <div class="product-photo">
                            <img src="assets/images/products/camiseta-css.png" alt="" />
                        </div>
                        <div class="product-name">Camisa CSS - Azul</div>
                        <div class="product-price">R$ 59,90</div>
                        <div class="product-info">Pagamento via PIX</div>
                    </a>
                    <div class="product-fav">
                        <img src="assets/images/ui/heart-3-line.png" alt="" />
                    </div>
                </div>
                <div class="product-item">
                    <a href="product.html">
                        <div class="product-photo">
                            <img src="assets/images/products/camiseta-css.png" alt="" />
                        </div>
                        <div class="product-name">Camisa CSS - Azul</div>
                        <div class="product-price">R$ 59,90</div>
                        <div class="product-info">Pagamento via PIX</div>
                    </a>
                    <div class="product-fav">
                        <img src="assets/images/ui/heart-3-line.png" alt="" />
                    </div>
                </div>

            </div>
        </section>

        <section class="product-list">
            <h4>Produtos mais vendidos</h4>
            <h5>Campeões de vendas da nossa loja.</h5>
            <div class="products-area">

                <div class="product-item">
                    <a href="product.html">
                        <div class="product-photo">
                            <img src="assets/images/products/camiseta-css.png" alt="" />
                        </div>
                        <div class="product-name">Camisa CSS - Azul</div>
                        <div class="product-price">R$ 59,90</div>
                        <div class="product-info">Pagamento via PIX</div>
                    </a>
                    <div class="product-fav">
                        <img src="assets/images/ui/heart-3-line.png" alt="" />
                    </div>
                </div>
                <div class="product-item">
                    <a href="product.html">
                        <div class="product-photo">
                            <img src="assets/images/products/camiseta-css.png" alt="" />
                        </div>
                        <div class="product-name">Camisa CSS - Azul</div>
                        <div class="product-price">R$ 59,90</div>
                        <div class="product-info">Pagamento via PIX</div>
                    </a>
                    <div class="product-fav">
                        <img src="assets/images/ui/heart-3-line.png" alt="" />
                    </div>
                </div>
                <div class="product-item">
                    <a href="product.html">
                        <div class="product-photo">
                            <img src="assets/images/products/camiseta-css.png" alt="" />
                        </div>
                        <div class="product-name">Camisa CSS - Azul</div>
                        <div class="product-price">R$ 59,90</div>
                        <div class="product-info">Pagamento via PIX</div>
                    </a>
                    <div class="product-fav">
                        <img src="assets/images/ui/heart-3-line.png" alt="" />
                    </div>
                </div>
                <div class="product-item">
                    <a href="product.html">
                        <div class="product-photo">
                            <img src="assets/images/products/camiseta-css.png" alt="" />
                        </div>
                        <div class="product-name">Camisa CSS - Azul</div>
                        <div class="product-price">R$ 59,90</div>
                        <div class="product-info">Pagamento via PIX</div>
                    </a>
                    <div class="product-fav">
                        <img src="assets/images/ui/heart-3-line.png" alt="" />
                    </div>
                </div>

            </div>
        </section>

    </main> -->
    <!-- <section class="newsletter">
        <div class="news-area">
            <div class="news-left">
                <img src="assets/images/ui/mail-send-line.png" alt="" />
                <div>
                    <h3>Fique por dentro das promoções!</h3>
                    <p>Coloque seu e-mail e seja o primeiro a saber</p>
                </div>
            </div>
            <div class="news-right">
                <input class="input" type="text" placeholder="Qual seu e-mail?" />
                <button class="button">Enviar</button>
            </div>
        </div>
    </section> -->
    <footer>
        <div class="footer-menu">
            <a class="logo" href="">
                <img src="./assets/images/ui/logo-white.png" alt="DEVstore" />
            </a>
            <ul>
                <li><a href="./produtos.html">Camisetas</a></li>
                <li><a href="./produtos.html">Kits DEVstore</a></li>
                <li><a href="./produtos.html">Acessórios</a></li>
                <li><a href="./produtos.html">Eletrônicos</a></li>
            </ul>
        </div>
        <div class="footer-contacts">
            <div class="contacts">
                <div class="footer-title">Precisa de ajuda?</div>
                <div class="footer-icons">
                    <a class="btn-icon-text" href="">
                        <img src="./assets/images/ui/mail-line.png" alt="" />
                        <span>devstore@email.com</span>
                    </a>
                    <a class="btn-icon-text" href="">
                        <img src="./assets/images/ui/phone-line.png" alt="" />
                        <span>(00) 00000-0000</span>
                    </a>
                </div>
            </div>
            <div class="social">
                <div class="footer-title">Acompanhe nas redes sociais</div>
                <div class="footer-icons">

                    <a href="" class="btn-icon">
                        <img src="./assets/images/ui/instagram-line.png" alt="" />
                    </a>

                    <a href="" class="btn-icon">
                        <img src="./assets/images/ui/linkedin-line.png" alt="" />
                    </a>

                    <a href="" class="btn-icon">
                        <img src="./assets/images/ui/facebook-line.png" alt="" />
                    </a>

                    <a href="" class="btn-icon">
                        <img src="assets/images/ui/twitter-x-fill.png" alt="" />
                    </a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="btn-icon">
                <img src="assets/images/ui/arrow-up-line.png" alt="" />
            </div>
        </div>
    </footer>

    <script type="text/javascript" src="assets/js/header.js"></script>
    <script type="text/javascript" src="assets/js/footer.js"></script>
    <script type="text/javascript" src="assets/js/home.js"></script>
</body>

</html>