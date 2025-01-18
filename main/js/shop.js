// Function to open the modal with product details
function openModal(imageUrl, productName, productPrice, productDescription) {
    // Set product details in the modal
    document.getElementById('modalProductImage').src = imageUrl;
    document.getElementById('modalProductName').innerText = productName;
    document.getElementById('modalProductPrice').innerText = '₱ ' + productPrice;
    document.getElementById('modalProductDescription').innerText = productDescription;
    
    // Reset counter to 1 when opening a new product
    const numberElement = document.getElementById('number');
    numberElement.innerText = '1'; // Reset the counter to 1

    // Immediately update the button state after resetting the counter
    updateCounter(); 

    // Show the modal
    document.getElementById('productModal').style.display = 'block';
}

// Function to close the modal
function closeModal() {
    document.getElementById('productModal').style.display = 'none';
}

// Update counter and disable/enable the minus button based on the current count
function updateCounter() {
    const numberElement = document.getElementById('number');
    const decreaseBtn = document.getElementById('decrease');
    const currentValue = parseInt(numberElement.innerText);

    // Disable the minus button if the count is 1
    if (currentValue <= 1) {
        decreaseBtn.disabled = true;
        decreaseBtn.classList.add('disabled'); // Add gray styling for disabled state
    } else {
        decreaseBtn.disabled = false;
        decreaseBtn.classList.remove('disabled'); // Enable button if count is greater than 1
    }
}

// Event listeners for the increase and decrease buttons
document.getElementById('increase').addEventListener('click', function() {
    const numberElement = document.getElementById('number');
    let currentValue = parseInt(numberElement.innerText);
    numberElement.innerText = currentValue + 1; // Increase the count by 1
    updateCounter(); // Update button state after increasing
});

document.getElementById('decrease').addEventListener('click', function() {
    const numberElement = document.getElementById('number');
    let currentValue = parseInt(numberElement.innerText);
    if (currentValue > 1) {
        numberElement.innerText = currentValue - 1; // Decrease the count by 1 if it's greater than 1
    }
    updateCounter(); // Update button state after decreasing
});

// Event listener for clicking outside the modal to close it
window.onclick = function(event) {
    const modal = document.getElementById('productModal');
    if (event.target == modal) {
        closeModal();
    }
}

window.onscroll = function() {
    const button = document.getElementById('backToTop');
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        button.style.display = 'block';
    } else {
        button.style.display = 'none';
    }
};

// Smooth scroll back to the top when button is clicked
document.getElementById('backToTop').addEventListener('click', function(event) {
    event.preventDefault(); // Prevent default anchor behavior
    window.scrollTo({
        top: 0,
        behavior: 'smooth' // Smooth scroll
    });
});


