@extends('admin.layout')
@section('content')
    <nav class="col-md-9">
        <div class="main-content" style="margin-top: 20px;">
            <h2>Edit Account</h2>
            <form id="updateAccountForm">
                <div class="mb-3">
                    <label for="accountID" class="form-label">ID</label>
                    <input type="text" class="form-control" id="accountID" name="accountID" readonly>
                    <div id="errorID" class="error-message" style="color: red"></div>
                </div>
                <div class="mb-3">
                    <label for="accountName" class="form-label">Name</label>
                    <input type="text" class="form-control" id="accountName" name="accountName">
                    <div id="errorName" class="error-message" style="color: red"></div>
                </div>
                <div class="mb-3">
                    <label for="accountEmail" class="form-label">Email</label>
                    <input type="text" class="form-control" id="accountEmail" name="accountEmail">
                    <div id="errorEmail" class="error-message" style="color: red"></div>
                </div>
                <button type="button" class="btn btn-primary" onclick="updateAccount()">Update Account</button>
            </form>
        </div>
    </nav>


<script>
    // Lấy ID từ URL
    function getIDFromURL() {
        const url = window.location.href;
        const segments = url.split('/');
        return segments[segments.length - 1];
    }

    const myid = getIDFromURL();

    // Hiển thị thông tin tài khoản người dùng
    function showAccountInfo() {
        const url = 'http://127.0.0.1:8000/api/getUserFind';

        fetch(url + '/' + myid)
            .then(response => {
                if (!response.ok) {
                    throw new Error("Lỗi kết nối mạng");
                }
                return response.json();
            })
            .then(accountData => {
                const idField = document.getElementById('accountID');
                const nameField = document.getElementById('accountName');
                const emailField = document.getElementById('accountEmail');

                idField.value = accountData.id;
                nameField.value = accountData.name;
                emailField.value = accountData.email;
            })
            .catch(error => {
                console.error('Lỗi khi truy xuất dữ liệu:', error);
            });
    }

    // Cập nhật tài khoản người dùng
    function updateAccount() {
        const name = document.getElementById('accountName').value;
        const email = document.getElementById('accountEmail').value;

        const data = {
            name: name,
            email: email,
        };

        const url = 'http://127.0.0.1:8000/api/updateAccount/' + myid;

        fetch(url, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
        .then(response => {
            if (!response.ok) {
                throw new Error("Lỗi kết nối mạng");
            }
            return response.json();
        })
        .then(updatedAccount => {
            alert('Tài khoản đã được cập nhật thành công');
            window.location.href = '/admin/account';
        })
        .catch(error => {
            console.error('Lỗi khi cập nhật tài khoản:', error);
        });
    }

    // Gọi hàm hiển thị thông tin tài khoản khi trang được nạp
    showAccountInfo();
</script>
@endsection