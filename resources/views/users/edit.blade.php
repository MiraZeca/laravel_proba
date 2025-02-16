@section('title', 'Edit User')

@extends('home')

@section('main')
    <div class="container mt-4">
        <h1>Edit User</h1>

        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select name="role" id="role" class="form-select" required>
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}" {{ $user->role && $user->role->name === $role->name ? 'selected' : '' }}>
                            {{ ucfirst($role->name) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <button type="submit" class="btn btn-primary mt-3">Save</button>
                <a href="{{ route('users.index') }}" class="btn btn-primary mt-3">Back to Users</a>

            </div>

        </form>
    </div>
    <br><br>
@endsection
