
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="card shadow-sm border-0 mx-auto" style="max-width:800px">
        <div class="card-header bg-warning p-3">
            <h4 class="mb-0">Edit Student</h4>
        </div>

        <div class="card-body p-4">
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('students.update', $student->student_id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Student Name</label>
                        <input type="text" name="student_name" class="form-control"
                               value="{{ old('student_name', $student->student_name) }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Gender</label>
                        <select name="gender" class="form-select" required>
                            <option value="Male" {{ old('gender', $student->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ old('gender', $student->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Date of Birth</label>
                        <input type="date" name="dob" class="form-control"
                               value="{{ old('dob', $student->dob) }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Enrollment Number</label>
                        <input type="text" name="enrollment" class="form-control"
                               value="{{ old('enrollment', $student->enrollment) }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Enrollment Date</label>
                        <input type="date" name="enrollment_date" class="form-control"
                               value="{{ old('enrollment_date', $student->enrollment_date) }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Department</label>
                        <select name="dept_id" class="form-select" required>
                            @foreach($departments as $department)
                                <option value="{{ $department->dept_id }}"
                                    {{ old('dept_id', $student->dept_id) == $department->dept_id ? 'selected' : '' }}>
                                    {{ $department->dept_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12 mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="3">{{ old('description', $student->description) }}</textarea>
                    </div>
                </div>

                <button class="btn btn-warning">Update Student</button>
                <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
</div>

</body>
</html>
