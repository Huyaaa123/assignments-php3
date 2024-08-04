
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="../adminnn/style.css">
    <title>Admin Dashboard</title>
</head>

<body>

    <div class="container">
        <!-- Sidebar Section -->
        <aside>
            @include('admin.layouts-admin.patials-admin.aside')
        </aside>
        <!-- End of Sidebar Section -->

        <!-- Main Content -->
        <main>
            @yield('content')
        </main>
        <!-- End of Main Content -->

        <!-- Right Section -->
        <div class="right-section">
            @include('admin.layouts-admin.patials-admin.right-section')
        </div>


    </div>

    {{-- <script src="../adminnn/orders.js"></script>
    <script src="../adminnn/index.js"></script> --}}
</body>

</html>

