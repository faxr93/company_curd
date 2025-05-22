<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Company CRUD</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto p-6">
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-200 text-green-800 rounded">{{ session('success') }}</div>
        @endif
        @yield('content')
    </div>
</body>
</html>
