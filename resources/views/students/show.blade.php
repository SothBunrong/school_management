
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="card shadow-sm border-0 mx-auto" style="max-width:700px">
        <div class="card-header bg-info text-white">
            <h4>Student Information</h4>
        </div>

        <div class="card-body">
            <p><strong>Student ID:</strong> {{ $student->student_id }}</p>
            <p><strong>Name:</strong> {{ $student->student_name }}</p>
            <p><strong>Gender:</strong> {{ $student->gender }}</p>
            <p><strong>Date of Birth:</strong> {{ $student->dob }}</p>
            <p><strong>Enrollment:</strong> {{ $student->enrollment }}</p>
            <p><strong>Enrollment Date:</strong> {{ $student->enrollment_date }}</p>
            <p><strong>Department:</strong> {{ $student->department->dept_name }}</p>
            <p><strong>Description:</strong> {{ $student->description ?? '-' }}</p>

            <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
            <a href="{{ route('students.edit', $student->student_id) }}"
               class="btn btn-warning">Edit</a>
        </div>
    </div>
</div>

</body>
</html>
