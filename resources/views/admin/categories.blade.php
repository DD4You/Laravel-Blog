<x-AdminHeader />
<main>
    <div class="mt-5">
        <div class="table-responsive">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>DELETE</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $data->links('vendor.pagination.admin-custom') }}
    </div>
</main>
<x-AdminFooter />
