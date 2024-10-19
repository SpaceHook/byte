<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    @vite(['resources/css/admin/index.scss'])
</head>
<body>
<div class="admin">
    <div class="admin__menu menu">
        @include('admin.menu')
    </div>

    <div class="admin__section">
        @yield('content')
    </div>
</div>

</body>
</html>
