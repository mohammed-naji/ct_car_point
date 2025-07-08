@extends('dashboard.layout.app')

@section('title', 'Dashboard | ' . env('APP_NAME'))

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">All Admins</h1>

    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr class="bg-dark text-white">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($admins as $c)
                        <tr>
                            <td>{{ $c->id }}</td>
                            <td>{{ $c->name }}</td>
                            <td>{{ $c->email }}</td>
                            <td>
                                <select class="form-control" name="role_id" onchange="edit_role(event, {{ $c->id }})">
                                    <option value="">Select Role</option>
                                    @foreach ($roles as $role)
                                        <option @selected($c->role_id == $role->id) value="{{ $role->id }}">
                                            {{ $role->trans_name }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No Data Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $admins->links() }}
        </div>
    </div>
@endsection

@section('js')

    <script>
        function edit_role(e, id) {
            let data = new FormData()
            data.append('role_id', e.target.value)
            data.append('user_id', id)
            // console.log(e.target.value, id);
            fetch('{{ route('dashboard.admins') }}/' + id, {
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: data,
                })
                .then((result) => {
                    alert('Success')
                }).catch((err) => {

                });
        }
    </script>

@endsection
