<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Laravel CRUD')</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        html, body {
            height: 100%;
            margin: 0;
            background-color: #1c1c1e;
            color: #e0e0e0;
            font-family: 'Poppins', sans-serif;
        }
        .wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .content {
            flex: 1;
            display: flex;
            flex-direction: row;
        }
        .sidebar {
            width: 250px;
            background: #2a2a2e;
            padding: 20px;
            height: 100vh;
            position: fixed;
            top: 56px;
            left: 0;
        }
        .sidebar .nav-link {
            color: #e0e0e0;
            padding: 10px;
            display: block;
            border-radius: 5px;
            transition: 0.3s;
        }
        .sidebar .nav-link.active,
        .sidebar .nav-link:hover {
            background-color: #6a11cb;
        }
        .main-content {
            margin-left: 270px;
            padding: 20px;
            flex-grow: 1;
        }
        .navbar {
            background: linear-gradient(45deg, #6a11cb, #2575fc);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
        }
        .footer {
            text-align: center;
            padding: 15px;
            background: #2a2a2e;
            border-top: 1px solid #444;
        }
        .table-container {
            overflow-x: auto;
            border-radius: 10px;
            background: #2a2a2e;
            padding: 10px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            background: #2a2a2e;
            color: #e0e0e0;
            border-radius: 10px;
            overflow: hidden;
        }

        thead.table-gradient {
            background: linear-gradient(45deg, #6a11cb, #2575fc);
            color: white;
        }

        th, td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #444;
        }

        tbody tr:nth-child(even) {
            background-color: #242429;
        }

        tbody tr:nth-child(odd) {
            background-color: #2a2a2e;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(255, 255, 255, 0.1) !important;
            color: #ffffff !important;
        }
        .btn {
            transition: all 0.3s ease-in-out;
            border-radius: 6px;
        }

        .btn-sm {
            padding: 6px 12px;
            font-size: 14px;
        }

        .btn:hover {
            transform: scale(1.05);
        }

        .badge {
            padding: 6px 10px;
            font-size: 14px;
            border-radius: 5px;
        }
        .list-group-item {
            background-color: #2a2a2e !important;
            border: 1px solid #444 !important;
            color: #e0e0e0 !important;
        }

        .list-group-item:hover {
            background-color: #3a3a3e !important;
        }

        .dark-list-link {
            display: block;
            width: 100%;
            text-decoration: none;
            color: #e0e0e0 !important;
            padding: 10px;
            text-align: center;
        }

        .dark-list-link:hover {
            background-color: #6a11cb !important;
            color: white !important;
            border-radius: 6px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="navbar navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/colleges') }}">Uni-lever</a>
            </div>
        </nav>

        <div class="content">
            <!-- Sidebar Navigation -->
            <div class="sidebar">
                <h5 class="text-light">Navigation</h5>
                <a class="nav-link {{ request()->is('colleges*') ? 'active' : '' }}" href="{{ route('colleges.index') }}">📚Colleges</a>
                <a class="nav-link {{ request()->is('departments*') ? 'active' : '' }}" href="{{ route('departments.index') }}">🏛 Departments</a>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                @yield('content')
            </div>
        </div>

        <!-- Footer (Sticky at Bottom) -->
        <div class="footer">
            <p>&copy; 2025 Uni-lever</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
