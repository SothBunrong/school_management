
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Department Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="card shadow-sm border-0 mx-auto" style="max-width:650px">
        <div class="card-header bg-info text-white">
            <h4>Department Details</h4>
        </div>

        <div class="card-body">
            <p><strong>ID:</strong> {{ $department->dept_id }}</p>
            <p><strong>Name:</strong> {{ $department->dept_name }}</p>
            <p><strong>Manager ID:</strong> {{ $department->manager_id ?? '-' }}</p>
            <p><strong>Location ID:</strong> {{ $department->location_id ?? '-' }}</p>
            <p><strong>Total Students:</strong> {{ $department->students()->count() }}</p>

            <a href="{{ route('departments.index') }}" class="btn btn-secondary">Back</a>
            <a href="{{ route('departments.edit', $department->dept_id) }}"
               class="btn btn-warning">Edit</a>
        </div>
    </div>
</div>

</body>
</html>
