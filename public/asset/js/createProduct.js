function showProducts() {
    const url = "http://127.0.0.1:8000/api/listCategory";

    fetch(url)
        .then(response => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return response.json();
        })
        .then(data => {
            let optionsHtml = '';

            data.forEach(category => {
                optionsHtml += `<option value="${category.id}">${category.name}</option>`;
            });

            const selectElement = document.getElementById('mySelect');
            selectElement.innerHTML = optionsHtml;
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
}

function createProduct() {
    const name = document.getElementById('productName').value;
    const description = document.getElementById('productDescription').value;
    const image = document.getElementById('productImage').value;
    const price = document.getElementById('productPrice').value;
    const selectedCategoryId = document.getElementById('mySelect').value;

    const data = {
        name: name,
        description: description,
        image: image,
        price: price,
        category_id: selectedCategoryId
    };
    const url = 'http://127.0.0.1:8000/api/storeProduct';
    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 422) {
            const errorContainers = {
                name: document.getElementById('errorName'),
                description: document.getElementById('errorDescription'),
                image: document.getElementById('errorImage'),
                price: document.getElementById('errorPrice')
            };

            for (const field in errorContainers) {
                if (errorContainers[field]) {
                    errorContainers[field].textContent = data.errors[field] ? data.errors[field][0] : '';
                }
            }
        } else {
            clearErrorMessages();
            alert('Product created successfully');
            window.location.href = '/admin/product';
        }
    })
    .catch(error => {
        console.error('Error creating product:', error);
    });
}

function clearErrorMessages() {
    const errorContainers = document.querySelectorAll('.error-message');
    errorContainers.forEach(container => {
        container.textContent = '';
    });
}

showProducts();
