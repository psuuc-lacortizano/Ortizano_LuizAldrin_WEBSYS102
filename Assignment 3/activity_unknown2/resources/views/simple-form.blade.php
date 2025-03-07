<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-5">
        <h1 class="mb-4 text-center">Form Submission</h1>
        <hr>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('simple-form') }}" method="POST" class="bg-white p-4 rounded shadow-sm">
            @csrf

            <!-- First Name -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="Firstname" class="form-label">First Name</label>
                    <input type="text" class="form-control" name="Firstname" id="Firstname" value="{{ old('Firstname') }}">
                    @error('Firstname')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Last Name -->
                <div class="col-md-6">
                    <label for="Lastname" class="form-label">Last Name</label>
                    <input type="text" class="form-control" name="Lastname" id="Lastname" value="{{ old('Lastname') }}">
                    @error('Lastname')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Sex -->
            <div class="mb-3">
                <label class="form-label">Sex</label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sex" value="male" {{ old('sex') == 'male' ? 'checked' : '' }}>
                        <label class="form-check-label">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sex" value="female" {{ old('sex') == 'female' ? 'checked' : '' }}>
                        <label class="form-check-label">Female</label>
                    </div>
                </div>
                @error('sex')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Mobile Phone -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="Mobile_Phone" class="form-label">Mobile Phone</label>
                    <input type="text" class="form-control" name="Mobile_Phone" id="Mobile_Phone" value="{{ old('Mobile_Phone') }}">
                    @error('Mobile_Phone')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Tel No. -->
                <div class="col-md-6">
                    <label for="Tel_No." class="form-label">Tel No.</label>
                    <input type="text" class="form-control" name="Tel_No." id="Tel_No." value="{{ old('Tel_No.') }}">
                    @error('Tel_No.')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Birth Date -->
            <div class="mb-3">
                <label for="Birth_date" class="form-label">Birth Date</label>
                <input type="date" class="form-control" name="Birth_date" id="Birth_date" value="{{ old('Birth_date') }}">
                @error('Birth_date')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Address -->
            <div class="mb-3">
                <label for="Address" class="form-label">Address</label>
                <input type="text" class="form-control" name="Address" id="Address" value="{{ old('Address') }}">
                @error('Address')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="Emails" class="form-label">Email</label>
                <input type="text" class="form-control" name="Emails" id="Emails" value="{{ old('Emails') }}">
                @error('Emails')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Website -->
            <div class="mb-3">
                <label for="Website" class="form-label">Website</label>
                <input type="text" class="form-control" name="Website" id="Website" value="{{ old('Website') }}">
                @error('Website')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>
</body>
</html>
