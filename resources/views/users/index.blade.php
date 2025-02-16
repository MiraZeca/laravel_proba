@extends('home')

@section('title', 'Users List')

@section('main')
    <section id="users">
        <div class="container mt-3">
            <div class="row">
                <div class="col-6 offset-3">
                    @if (session('success'))
                        <div id="successAlert" class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('delete'))
                    <div id="deleteAlert" class="alert alert-danger" role="alert">
                        {{ session('delete') }}
                    </div>
                @endif
                </div>
            </div>
        </div>

        <div class="container mt-5">
            <h1 class="mb-4">Users</h1>

            <div class="table-responsive">
                <table class="table table-striped table-hover text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role ? $user->role->name : 'No Role Assigned' }}</td>
                                <td>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#deleteModal"
                                        onclick="setDeleteAction('{{ route('users.destroy', $user->id) }}')">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <a href="{{ route('admin') }}" class="btn btn-primary mt-3">Back to Products</a>
            <br><br>
        </div> <br><br>

        <!-- Modal Confirmation for Deletion -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirm Deletion</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this user?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <button type="button" class="btn btn-danger" id="confirmDelete"
                            onclick="submitDeleteForm()">Yes</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // Držanje URL-a za DELETE formu koja treba biti submitovana
            let deleteUrl = '';

            // Setovanje URL-a za brisanje
            function setDeleteAction(url) {
                deleteUrl = url;
            }

            // Funkcija za slanje DELETE zahteva
            function submitDeleteForm() {
                if (deleteUrl) {
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = deleteUrl;

                    // Dodavanje CSRF tokena
                    const csrfToken = document.createElement('input');
                    csrfToken.type = 'hidden';
                    csrfToken.name = '_token';
                    csrfToken.value = "{{ csrf_token() }}";

                    // Laravel koristi '_method' za emulaciju DELETE metode
                    const methodField = document.createElement('input');
                    methodField.type = 'hidden';
                    methodField.name = '_method';
                    methodField.value = 'DELETE';

                    form.appendChild(csrfToken);
                    form.appendChild(methodField);
                    document.body.appendChild(form);

                    // Slanje forme
                    form.submit();
                }
            }
        </script>

    </section>
@endsection
