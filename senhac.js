// script.js
let cart = [];

function addToCart(productName, productPrice) {
    // Adiciona o produto ao carrinho
    cart.push({ name: productName, price: productPrice });

    // Atualiza a contagem de itens no carrinho
    updateCartCount();
}

function updateCartCount() {
    // Atualiza o número de itens no carrinho
    const cartCount = cart.length;
    document.getElementById('cart-count').textContent = cartCount;
}
