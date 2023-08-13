<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Edit Leave Request</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!-- ... Your navigation content ... -->
    </nav>

    <div class="container">
        <h1>Edit Leave Request</h1>
        @include('LEMS.flash_erroe')
        @include('LEMS.flash_action')
        <form action="{{ route('leave-requests.update', $leaveRequest->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="leave_type_id">Leave Type</label>
                <select name="leave_type_id" id="leave_type_id"
                    class="form-control @error('leave_type_id') is-invalid @enderror">
                    <option value="">Select Leave Type</option>
                    @foreach ($leaveTypes as $leaveType)
                        <option value="{{ $leaveType->id }}"
                            {{ $leaveRequest->leave_type_id == $leaveType->id ? 'selected' : '' }}>
                            {{ $leaveType->title }}
                        </option>
                    @endforeach
                </select>
                @error('leave_type_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" name="start_date" id="start_date"
                    class="form-control @error('start_date') is-invalid @enderror"
                    value="{{ old('start_date', $leaveRequest->start_date) }}">
                @error('start_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="end_date">End Date</label>
                <input type="date" name="end_date" id="end_date"
                    class="form-control @error('end_date') is-invalid @enderror"
                    value="{{ old('end_date', $leaveRequest->end_date) }}">
                @error('end_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>

</html>
