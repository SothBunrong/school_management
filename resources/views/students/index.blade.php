 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container-fluid px-4 py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold">Student Management</h2>
            <p class="text-muted">Manage all school students</p>
        </div>

        <div>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Dashboard</a>
            <a href="{{ route('students.create') }}" class="btn btn-primary">+ Add Student</a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <form action="{{ route('students.index') }}" method="GET">
                <div class="row g-3">
                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control"
                               placeholder="Search student name..."
                               value="{{ request('search') }}">
                    </div>

                    <div class="col-md-3">
                        <select name="gender" class="form-select">
                            <option value="">All Gender</option>
                            <option value="Male" {{ request('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ request('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <select name="dept_id" class="form-select">
                            <option value="">All Departments</option>
                            @foreach($departments as $department)
                                <option value="{{ $department->dept_id }}"
                                    {{ request('dept_id') == $department->dept_id ? 'selected' : '' }}>
                                    {{ $department->dept_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-2">
                        <button class="btn btn-primary w-100">Search</button>
                    </div>
                </div>

                <a href="{{ route('students.index') }}" class="btn btn-link mt-2">Clear Filters</a>
            </form>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>Student Name</th>
                        <th>Gender</th>
                        <th>Date of Birth</th>
                        <th>Enrollment</th>
                        <th>Enrollment Date</th>
                        <th>Department</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($students as $student)
                    <tr>
                        <td>{{ $student->student_id }}</td>
                        <td class="fw-semibold">{{ $student->student_name }}</td>
                        <td>{{ $student->gender }}</td>
                        <td>{{ $student->dob }}</td>
                        <td>{{ $student->enrollment }}</td>
                        <td>{{ $student->enrollment_date }}</td>
                        <td>
                            <span class="badge bg-info">
                                {{ $student->department->dept_name }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('students.show', $student->student_id) }}"
                               class="btn btn-info btn-sm text-white">View</a>

                            <a href="{{ route('students.edit', $student->student_id) }}"
                               class="btn btn-warning btn-sm">Edit</a>

                            <form action="{{ route('students.destroy', $student->student_id) }}"
                                  method="POST" class="d-inline"
                                  onsubmit="return confirm('Are you sure you want to delete this student?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-4">No students found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $students->links('pagination::bootstrap-5') }}
        </div>
    </div>

</div>

</body>
</html>
