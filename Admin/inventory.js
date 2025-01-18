const productRows = document.getElementById('product-rows');
const sidebar = document.querySelector('.sidebar');
const toggleButton = document.querySelector('.sidebar-toggle');
const addProductBtn = document.querySelector('.add-product-btn');
const tableBody = document.querySelector('.inventory-table tbody');
let isEditing = false;

// Toggle sidebar
toggleButton.addEventListener('click', () => {
    sidebar.classList.toggle('collapsed');
    toggleButton.textContent = sidebar.classList.contains('collapsed') ? '↦' : '↤';
});

// Create a new row for adding a product
const inputRow = document.createElement('tr');
inputRow.innerHTML = `
    <td><input type="text" name="product_name" placeholder="Product Name" required></td>
    <td><input type="text" name="product_category" placeholder="Category" required></td>
    <td><input type="number" name="product_stocks" placeholder="Stocks" required></td>
    <td><input type="number" name="product_price" placeholder="Price" required></td>
    <td><input type="text" name="product_imageurl" placeholder="Image URL" required></td>
    <td><textarea name="product_description" placeholder="Description" required></textarea></td>
    <td>
        <button class="save-btn">Add</button>
        <button class="cancel-btn">Cancel</button>
    </td>
`;
tableBody.appendChild(inputRow);
inputRow.style.display = 'none';

// Show input row when "Add Product" button is clicked
addProductBtn.addEventListener('click', () => {
    if (!isEditing) {
        inputRow.style.display = 'table-row';
        inputRow.querySelector('input[name="product_name"]').focus();
        isEditing = true;
    } else {
        alert("Please save or cancel the current product before adding a new one.");
    }
});

// Handle click events on the product table
tableBody.addEventListener('click', (event) => {
    // Save new product
    if (event.target.classList.contains('save-btn')) {
        event.preventDefault();

        const inputs = inputRow.querySelectorAll('input, textarea');
        const data = {
            product_name: inputs[0].value,
            product_category: inputs[1].value,
            product_stocks: inputs[2].value,
            product_price: inputs[3].value,
            product_imageurl: inputs[4].value,
            product_description: inputs[5].value,
            add_product: true
        };

        fetch('inventory.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: new URLSearchParams(data)
        })
        .then(response => response.json())
        .then(result => {
            if (result.status === 'success') {
                const newRow = document.createElement('tr');
                newRow.innerHTML = `
                    <td>${data.product_name}</td>
                    <td>${data.product_category}</td>
                    <td>${data.product_stocks}</td>
                    <td>${data.product_price}</td>
                    <td><img src="${data.product_imageurl}" alt="${data.product_name}" width="50"></td>
                    <td>${data.product_description}</td>
                    <td><button class="edit-btn" data-id="${result.product_id}">Edit</button></td>
                `;
                tableBody.appendChild(newRow);
                inputRow.style.display = 'none';
                isEditing = false;
            } else {
                alert('Error adding product: ' + result.message);
            }
        })
        .catch(error => console.error('Error:', error));
    }

    // Cancel adding product
    if (event.target.classList.contains('cancel-btn')) {
        inputRow.style.display = 'none';
        isEditing = false;
    }

    // Edit existing product
    if (event.target.classList.contains('edit-btn')) {
        const row = event.target.closest('tr');
        const productId = event.target.getAttribute('data-id');
        const cells = row.querySelectorAll('td');

        const currentData = {
            product_name: cells[0].textContent,
            product_category: cells[1].textContent,
            product_stocks: cells[2].textContent,
            product_price: cells[3].textContent,
            product_imageurl: cells[4].querySelector('img').src,
            product_description: cells[5].textContent
        };

        row.innerHTML = `
            <td><input type="text" value="${currentData.product_name}" name="edit_product_name" required></td>
            <td><input type="text" value="${currentData.product_category}" name="edit_product_category" required></td>
            <td><input type="number" value="${currentData.product_stocks}" name="edit_product_stocks" required></td>
            <td><input type="number" value="${currentData.product_price}" name="edit_product_price" required></td>
            <td><input type="text" value="${currentData.product_imageurl}" name="edit_product_imageurl" required></td>
            <td><textarea name="edit_product_description" required>${currentData.product_description}</textarea></td>
            <td>
                <button class="save-edit-btn">Save</button>
                <button class="cancel-edit-btn">Cancel</button>
            </td>
        `;

        // Save edited product
        row.querySelector('.save-edit-btn').addEventListener('click', () => {
            const updatedData = {
                product_id: productId,
                product_name: row.querySelector('input[name="edit_product_name"]').value,
                product_category: row.querySelector('input[name="edit_product_category"]').value.trim(),
                product_stocks: row.querySelector('input[name="edit_product_stocks"]').value,
                product_price: row.querySelector('input[name="edit_product_price"]').value,
                product_imageurl: row.querySelector('input[name="edit_product_imageurl"]').value,
                product_description: row.querySelector('textarea[name="edit_product_description"]').value,
                update_product: true
            };
            
            // Ensure product_category is not empty
            if (!updatedData.product_category) {
                alert('Category is required.');
                return;
            }
            

            fetch('inventory.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: new URLSearchParams(updatedData)
            })
            .then(response => response.json())
            .then(result => {
                if (result.status === 'success') {
                    row.innerHTML = `
                        <td>${updatedData.product_name}</td>
                        <td>${updatedData.product_category}</td>
                        <td>${updatedData.product_stocks}</td>
                        <td>${updatedData.product_price}</td>
                        <td><img src="${updatedData.product_imageurl}" alt="${updatedData.product_name}" width="50"></td>
                        <td>${updatedData.product_description}</td>
                        <td><button class="edit-btn" data-id="${productId}">Edit</button></td>
                    `;
                } else {
                    alert('Error updating product: ' + result.message);
                }
            })
            .catch(error => console.error('Error:', error));
        });

        // Cancel editing
        row.querySelector('.cancel-edit-btn').addEventListener('click', () => {
            row.innerHTML = `
                <td>${currentData.product_name}</td>
                <td>${currentData.product_category}</td>
                <td>${currentData.product_stocks}</td>
                <td>${currentData.product_price}</td>
                <td><img src="${currentData.product_imageurl}" alt="${currentData.product_name}" width="50"></td>
                <td>${currentData.product_description}</td>
                <td><button class="edit-btn" data-id="${productId}">Edit</button></td>
            `;
        });
    }
});
