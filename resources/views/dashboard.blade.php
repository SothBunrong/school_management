
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: #f4f7fb;
            font-family: Arial, sans-serif;
        }
        .sidebar {
            width: 250px;
            min-height: 100vh;
            background: #102c54;
            position: fixed;
            color: white;
            padding: 25px 15px;
        }
        .sidebar a {
            display: block;
            color: #dbeafe;
            text-decoration: none;
            padding: 13px;
            margin-top: 8px;
            border-radius: 8px;
        }
        .sidebar a:hover {
            background: #1d4ed8;
            color: white;
        }
        .main {
            margin-left: 250px;
            padding: 30px;
        }
        .stat-card {
            border: none;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(0,0,0,.05);
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h4 class="text-center fw-bold mb-4">SCHOOL SYSTEM</h4>

    <a href="{{ route('dashboard') }}">
        <i class="bi bi-speedometer2 me-2"></i> Dashboard
    </a>

    <a href="{{ route('departments.index') }}">
        <i class="bi bi-building me-2"></i> Departments
    </a>

    <a href="{{ route('students.index') }}">
        <i class="bi bi-people me-2"></i> Students
    </a>

    <form action="{{ route('logout') }}" method="POST" class="mt-4">
        @csrf
        <button class="btn btn-danger w-100">
            <i class="bi bi-box-arrow-right me-2"></i> Logout
        </button>
    </form>
</div>

<div class="main">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold">Dashboard</h2>
            <p class="text-muted">Welcome to School Management System</p>
        </div>
        <span class="badge bg-primary p-2">
            {{ Auth::user()->name }}
        </span>
    </div>

    <div class="row g-4">
        <div class="col-md-6">
            <div class="stat-card bg-white">
                <i class="bi bi-people fs-1 text-primary"></i>
                <h5 class="mt-3">Total Students</h5>
                <h2 class="fw-bold">{{ $totalStudents }}</h2>
            </div>
        </div>

        <div class="col-md-6">
            <div class="stat-card bg-white">
                <i class="bi bi-building fs-1 text-success"></i>
                <h5 class="mt-3">Total Departments</h5>
                <h2 class="fw-bold">{{ $totalDepartments }}</h2>
            </div>
        </div>
    </div>
</div>

</body>
</html>
