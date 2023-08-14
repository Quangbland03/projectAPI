function getIDFromURL() {
    const url = window.location.href;
    const segments = url.split('/');
    return segments[segments.length - 1];
}
const myid = getIDFromURL();
function updateProduct() {
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
    const url = 'http://127.0.0.1:8000/api/updateProduct';
    fetch(url + '/' + myid, {
        method: 'PUT',
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

                for (const field in data.errors) {
                    if (errorContainers[field]) {
                        errorContainers[field].textContent = data.errors[field][0];
                    }
                }
            } else {
                const errorContainers = document.querySelectorAll('.error-message');
                errorContainers.forEach(container => {
                    container.textContent = '';
                });
             
                alert('Product updated successfully');
                window.location.href = '/admin/product';
            }
        })
        .catch(error => {
            console.error('Error creating product:', error);
        });
}
function showStudentInfo(id) {
    const url = 'http://127.0.0.1:8000/api/listProduct';
    fetch(url + '/' + id)
        .then(response => {
            if (!response.ok) {
                throw new Error("Lỗi kết nối mạng");
            }
            return response.json();
        })
        .then(element => {
            const name = document.getElementById('productName');
            const description = document.getElementById('productDescription');
            const image = document.getElementById('productImage');
            const price = document.getElementById('productPrice');
            const selectedCategoryId = document.getElementById('mySelect');
            name.value = element.name;
            description.value = element.description;
            image.value = element.image;
            price.value = element.price;
            findCategory(element.category_id);


        })
        .catch(error => {
            console.error('Lỗi khi truy xuất dữ liệu:', error);
        });
}
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
function findCategory(idSelect) {
    document.addEventListener("DOMContentLoaded", function () {

        var selectElement = document.getElementById("mySelect");
        for (var i = 0; i < selectElement.options.length; i++) {
            var option = selectElement.options[i];


            if (option.value === idSelect) {

                option.selected = true;
                break;
            }
        }
    });
}
showProducts();
showStudentInfo(myid);
