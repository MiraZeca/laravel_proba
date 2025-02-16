@section('title')
    Admin
@endsection

@extends('home')

@section('main')
    <section>

        <div class="container mt-3">
            <div class="row">
                <div class="col-6 offset-3">
                    @if (session('success'))
                        <div id="successAlert" class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    @if (session('create'))
                    <div id="createAlert" class="alert alert-success" role="alert">
                        {{ session('create') }}
                    </div>
                @endif
                </div>
            </div>
        </div>

        <div class="container">
            <table class="table table-striped table-hover text-center p-3">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Images</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Discount Price</th>
                        <th>Actions</th>
                        <a href="{{ route('users.index') }}" class="btn-primary btn m-3 p-3">Add User / Admin</a>
                        <a href="{{ route('categories.create') }}" class="btn btn-primary m-3 p-3">Add Category</a>
                        <a href="{{ route('product.create') }}" class="btn btn-primary m-3 p-3">Add Product</a>
                        <a href="{{ route('contact.info') }}" class="btn btn-primary m-3 p-3">Contact - Info</a>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($allProducts as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>
                                @if ($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                        width="100" height="100">
                                @else
                                    <p>No image available</p>
                                @endif
                            </td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->discount_price }}</td>
                            <td>
                                <!-- Edit Button -->
                                <button class="btn btn-warning btnedit">
                                    <a href="{{ route('product.edit', $product->id) }}">Edit</a>
                                </button>

                                <!-- Delete Button -->
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal"
                                    onclick="setDeleteAction('{{ route('product.destroy', $product->id) }}')">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table><br><br>
        </div>

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
                        Are you sure you want to delete this product?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <button type="button" class="btn btn-danger" id="confirmDelete" onclick="submitDeleteForm()">Yes</button>
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

    </section> <br>
@endsection
