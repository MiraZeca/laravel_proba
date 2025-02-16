@section('title')
    Login
@endsection

@extends('home')

@section('main')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <form action="{{ route('login.submit') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" name="email" type="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input id="password" name="password" type="password" class="form-control" required>
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-primary">Login</button>
                    </div>
                    <br><br><br>
                </form>
            </div>
        </div>
    </div>
@endsection



