@extends('layout')

@section('content')
<section class="d-flex justify-content-center align-items-center" style="min-height: 80vh; margin-top: 100px;">
    <div class="w-100" style="max-width: 500px;">
        <h1 class="text-center mb-4">Contact</h1>
        <form style="width: 100%; display: flex; flex-direction: column; gap: 20px;">
            <div class="mb-3">
                <label for="fullname" class="form-label">Full Name:</label>
                <input type="text" id="fullname" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" id="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-dark">Create Account</button>
        </form>
    </div>
</section>
@endsection
