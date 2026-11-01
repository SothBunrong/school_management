
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Department</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="card shadow-sm border-0 mx-auto" style="max-width:650px">
        <div class="card-header bg-warning p-3">
            <h4 class="mb-0">Edit Department</h4>
        </div>

        <div class="card-body p-4">
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('departments.update', $department->dept_id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Department Name</label>
                    <input type="text" name="dept_name" class="form-control"
                           value="{{ old('dept_name', $department->dept_name) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Manager ID</label>
                    <input type="number" name="manager_id" class="form-control"
                           value="{{ old('manager_id', $department->manager_id) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Location ID</label>
                    <input type="number" name="location_id" class="form-control"
                           value="{{ old('location_id', $department->location_id) }}">
                </div>

                <button class="btn btn-warning">Update Department</button>
                <a href="{{ route('departments.index') }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
</div>

</body>
</html>
