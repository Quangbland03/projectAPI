<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .sidebar {
            height: 100vh;
            background-color: #343a40;
        }
        .sidebar a {
            color: #fff;
            padding: 10px 15px;
            display: block;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .main-content {
            background-color: #f8f9fa;
            padding: 20px;
        }

    </style>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 d-none d-md-block sidebar">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">

                            <a class="nav-link" href="{{ route('admin.product') }}">
                                Product
                            </a>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.order') }}">
                                Accounts
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.user') }}">
                                Orders
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            @yield('content')


        <!-- ... (các đoạn mã HTML sau đó) ... -->
        Trong phần trên, tôi đã thêm một trường <input type="file"> để cho phép người dùng chọn và tải lên hình ảnh từ máy tính của họ. Tôi cũng đã thêm một trường <select> để cho phép người dùng chọn một loại sản phẩm từ danh sách tùy chọn. Bạn có thể thay đổi và tùy chỉnh các giá trị của danh sách tùy chọn cho phù hợp với nhu cầu của bạn.






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const addProductButton = document.getElementById("addProductButton");
            const addProductModal = new bootstrap.Modal(document.getElementById("addProductModal"));

            addProductButton.addEventListener("click", function() {
                addProductModal.show();
            });
            const addProductForm = document.getElementById("addProductForm");
            addProductForm.addEventListener("submit", function(event) {
                event.preventDefault();
                // Perform form submission logic here (e.g., AJAX request)
                addProductModal.hide();
            });
        });
    </script>
</body>

</html>
