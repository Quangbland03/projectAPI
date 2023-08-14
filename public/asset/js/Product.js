function deleteProduct(productId) {
    const url = 'http://127.0.0.1:8000/api/deleteProduct';
    fetch(url + '/' + productId, {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
        },
    })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            const deletedProductRow = document.getElementById(`productRow_${productId}`);
            if (deletedProductRow) {
                deletedProductRow.remove();
                const successMessage = document.getElementById('successMessage');
                successMessage.style.display = 'block';

                setTimeout(() => {
                    successMessage.style.display = 'none';
                }, 2000);
            }
        })
        .catch(error => {
            console.error('Error deleting product:', error);
        });
}

function showProducts1() {
    const url = "http://127.0.0.1:8000/api/list";

    fetch(url)
        .then(response => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return response.json();
        })
        .then(data => {
            const listContainer = document.querySelector('.list-container1');
            let output = '';

            data.forEach(element => {
                output += `
                <tr id="productRow_${element.id}" style="border:1.5px solid rgb(67, 187, 185); font-weight: bold;">
                <td style="width: 14%;">${element.name}</td>
                <td>${element.description}</td>
                <td>${element.price}</td>
                <td>
                <div class="image-container" style = ""width:182px>
                    <img src="http://127.0.0.1:8000/asset/img/${element.image}" class="img-fluid" alt="" style="width: 100%;">
                </div>
            </td>

                <td>${element.name1}</td>
                <td class="text-center">
                    <div class="d-flex justify-content-center">
                        <a href="/updateProduct/${element.id}" class="btn btn-warning btn-sm font-weight-bold">Edit</a>
                    </div>
                </td>
                <td class="bg-light border text-center">
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-danger btn-sm font-weight-bold" onclick="deleteProduct(${element.id})">Delete</button>
                    </div>
                </td>
            </tr>`;
            });
            listContainer.innerHTML = output;
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
}
showProducts1();
