<x-AdminHeader />
<main>
    <div class="mt-5">
        <div class="table-responsive">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Thumbnail</th>
                        <th scope="col">Title</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>
                                <img src="{{asset('assets/image/'.$data->thumbnail)}}" width="80" alt="thumbnail">
                            </td>
                            <td>{{ $data->title }}</td>
                            <td>DELETE</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>
<x-AdminFooter />
