<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />

    <!-- tagify -->
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
    @yield('library-css')

    <title>Surabaya Events</title>
</head>
<body style="margin-bottom: 25vh">

    <div class="navbar bg-base-300  shadow-2xl relative z-50 px-8">
        <div class="navbar-start">
            <a href="/" class="btn btn-ghost text-xl">Surabaya Events</a>
        </div>
        <div class="navbar-center">
            <ul class="menu menu-horizontal px-1">
                <li>
                    <details>
                        <summary>Master Data</summary>
                        <ul class="bg-base-100 rounded-t-none p-2">
                            <li><a href="/master/categories" class="whitespace-nowrap">Master Event Category</a></li>
                            <li><a href="/master/organizer" class="whitespace-nowrap">Master Organizer</a></li>
                            <li><a href="/master/events" class="whitespace-nowrap">Master Events</a></li>
                        </ul>
                    </details>
                </li>
                <li><a href="/">Events</a></li>
            </ul>
        </div>
        <div class="navbar-end">
            <a href="/" class="btn btn-ghost text-xl">Home</a>
        </div>
    </div>

    <div class="contaner mx-auto px-4">
        @yield('content')
    </div>
    

    <!-- jQuery (move this above DataTables) -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <!-- Data table (after jQuery is loaded) -->
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <!-- Tagify -->
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
    @vite(['resources/js/app.js'])
    @yield('library-js')
</body>
</html>