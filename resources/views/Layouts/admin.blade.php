<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $viewData['title'] ?? 'Admin Panel' }}</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Arial, sans-serif; background-color: #f1f5f9; display: flex; min-height: 100vh; }

        /* SIDEBAR */
        .sidebar { width: 250px; background-color: #1e293b; color: #fff; padding: 2rem 0; position: fixed; height: 100vh; }
        .sidebar-brand { padding: 0 1.5rem 2rem; font-size: 1.3rem; font-weight: bold; color: #74c69d; border-bottom: 1px solid #334155; }
        .sidebar-menu { padding: 1rem 0; }
        .sidebar-menu a { display: block; padding: 0.8rem 1.5rem; color: #94a3b8; text-decoration: none; font-size: 0.95rem; transition: all 0.2s; }
        .sidebar-menu a:hover { background-color: #334155; color: #fff; }
        .sidebar-menu .menu-title { padding: 1rem 1.5rem 0.3rem; font-size: 0.75rem; color: #475569; text-transform: uppercase; letter-spacing: 1px; }

        /* MAIN */
        .main-content { margin-left: 250px; flex: 1; padding: 2rem; }

        /* TOPBAR */
        .topbar { background: #fff; padding: 1rem 1.5rem; border-radius: 8px; margin-bottom: 1.5rem; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 1px 4px rgba(0,0,0,0.06); }
        .topbar h1 { font-size: 1.4rem; color: #1e293b; }
        .topbar a { color: #64748b; text-decoration: none; font-size: 0.9rem; }

        /* CARDS */
        .stats-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 1rem; margin-bottom: 1.5rem; }
        .stat-card { background: #fff; border-radius: 8px; padding: 1.5rem; box-shadow: 0 1px 4px rgba(0,0,0,0.06); }
        .stat-card p { color: #64748b; font-size: 0.85rem; margin-bottom: 0.4rem; }
        .stat-card h2 { color: #1e293b; font-size: 2rem; }

        /* TABLE */
        .table-card { background: #fff; border-radius: 8px; padding: 1.5rem; box-shadow: 0 1px 4px rgba(0,0,0,0.06); }
        table { width: 100%; border-collapse: collapse; }
        th { text-align: left; padding: 0.75rem 1rem; font-size: 0.8rem; color: #64748b; text-transform: uppercase; border-bottom: 1px solid #e2e8f0; }
        td { padding: 0.75rem 1rem; border-bottom: 1px solid #f1f5f9; color: #334155; font-size: 0.9rem; }
        tr:last-child td { border-bottom: none; }
        tr:hover td { background-color: #f8fafc; }

        /* ALERTS */
        .success { background-color: #dcfce7; color: #166534; padding: 0.9rem 1.2rem; border-left: 4px solid #22c55e; border-radius: 4px; margin-bottom: 1.5rem; }
        .errors { background-color: #fee2e2; color: #991b1b; padding: 0.9rem 1.2rem; border-left: 4px solid #ef4444; border-radius: 4px; margin-bottom: 1.5rem; }

        /* FORM */
        .form-card { background: #fff; border-radius: 8px; padding: 1.5rem; box-shadow: 0 1px 4px rgba(0,0,0,0.06); max-width: 600px; }
        .form-group { margin-bottom: 1.2rem; }
        .form-group label { display: block; margin-bottom: 0.4rem; color: #374151; font-weight: 600; font-size: 0.9rem; }
        .form-group input, .form-group textarea, .form-group select { width: 100%; padding: 0.7rem 1rem; border: 1px solid #e2e8f0; border-radius: 6px; font-size: 0.95rem; }
        .form-group input:focus, .form-group textarea:focus { outline: none; border-color: #74c69d; }

        /* BUTTONS */
        .btn { display: inline-block; padding: 0.5rem 1.1rem; border-radius: 6px; text-decoration: none; font-size: 0.9rem; cursor: pointer; border: none; font-weight: 600; transition: background 0.2s; }
        .btn-primary { background-color: #1e293b; color: white; }
        .btn-primary:hover { background-color: #0f172a; }
        .btn-success { background-color: #22c55e; color: white; }
        .btn-success:hover { background-color: #16a34a; }
        .btn-danger { background-color: #ef4444; color: white; }
        .btn-danger:hover { background-color: #dc2626; }
        .btn-warning { background-color: #f59e0b; color: white; }
        .btn-warning:hover { background-color: #d97706; }
        form { display: inline; }
    </style>
</head>
<body>
    <aside class="sidebar">
        <div class="sidebar-brand"> Grow & Bloom</div>
        <nav class="sidebar-menu">
            <div class="menu-title">Dashboard</div>
            <a href="{{ route('admin.index') }}"> Overview</a>
            <div class="menu-title">Management</div>
            <a href="{{ route('admin.plant.index') }}"> Plants</a>
            <a href="{{ route('admin.order.index') }}"> Orders</a>
            <div class="menu-title">Account</div>
            <a href="{{ route('home.index') }}"> View Site</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" style="background:none; border:none; cursor:pointer; display:block; padding:0.8rem 1.5rem; color:#94a3b8; font-size:0.95rem; width:100%; text-align:left;">🚪 Logout</button>
            </form>
        </nav>
    </aside>

    <div class="main-content">
        <div class="topbar">
            <h1>{{ $viewData['title'] ?? 'Admin Panel' }}</h1>
            <span> {{ auth()->user()->getName() }}</span>
        </div>

        @if(session('success'))
            <div class="success"> {{ session('success') }}</div>
        @endif

        @yield('content')
    </div>
</body>
</html>