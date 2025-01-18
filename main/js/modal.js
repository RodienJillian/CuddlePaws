function addToCart() {
    // Get product details from the modal
    const productName = document.getElementById('modalProductName').textContent;
    const productPrice = document.getElementById('modalProductPrice').textContent;
    const productImage = document.getElementById('modalProductImage').src;
    const quantity = document.getElementById('number').textContent;

    // Create a product object
    const product = {
        name: productName,
        price: productPrice,
        image: productImage,
        quantity: parseInt(quantity)
    };

    // Save to localStorage
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    cart.push(product);
    localStorage.setItem('cart', JSON.stringify(cart));

    // Send the data to the server
    fetch('add_to_cart.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(product),
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(`${productName} has been added to the cart!`);
        } else {
            alert('Failed to add product to the cart.');
        }
    })
    .catch(error => console.error('Error:', error));
}