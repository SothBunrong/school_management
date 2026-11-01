
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Department Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="d-flex justify-content-between mb-4">
        <div>
            <h2 class="fw-bold">Department Management</h2>
            <p class="text-muted">Manage school departments</p>
        </div>
        <div>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Dashboard</a>
            <a href="{{ route('departments.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Add Department
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <table class="table table-hover align-middle">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>Department Name</th>
                        <th>Manager ID</th>
                        <th>Location ID</th>
                        <th>Total Students</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($departments as $department)
                    <tr>
                        <td>{{ $department->dept_id }}</td>
                        <td class="fw-semibold">{{ $department->dept_name }}</td>
                        <td>{{ $department->manager_id ?? '-' }}</td>
                        <td>{{ $department->location_id ?? '-' }}</td>
                        <td>
                            <span class="badge bg-info">
                                {{ $department->students_count }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('departments.show', $department->dept_id) }}"
                               class="btn btn-info btn-sm text-white">View</a>

                            <a href="{{ route('departments.edit', $department->dept_id) }}"
                               class="btn btn-warning btn-sm">Edit</a>

                            <form action="{{ route('departments.destroy', $department->dept_id) }}"
                                  method="POST" class="d-inline"
                                  onsubmit="return confirm('Delete this department?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">No departments found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
