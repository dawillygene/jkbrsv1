<x-admin>
    <x-slot:heading>
        List all Locations
    </x-slot:heading>
    <div class="app-content">
        <div class="container-fluid">
            <div class="row g-4">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">List of All Location</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">City</th>
                                        <th>Location</th>
                                        <th>description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($location  as $art)
                                        <tr class="align-middle">
                                            <td> {{ $art->city }}</td>
                                            <td>{{ $art->name }}</td>
                                            <td>
                                                <p>{{ $art->description }}</p>
                                            </td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="{{ route('locations.edit', $art->encrypted_id) }}"
                                                        class="btn btn-warning mb-2">Edit</a>

                                                    <form action="{{ route('locations.destroy', $art->encrypted_id) }}"
                                                        method="POST" class="d-inline"
                                                        onsubmit="return confirm('Are you sure you want to delete this location ?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-danger mb-2">Delete</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div>{{ $location->links() }}</div>

                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
</x-admin>