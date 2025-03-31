function filterProducts() {
    const searchInput = document.querySelector('.search').value.toLowerCase();
    const products = document.querySelectorAll('.product');

    products.forEach(product => {
        const productName = product.textContent.toLowerCase();
        if (productName.includes(searchInput)) {
            product.style.display = '';
        } else {
            product.style.display = 'none';
        }
    });
}