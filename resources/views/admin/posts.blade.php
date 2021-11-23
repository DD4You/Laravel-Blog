<x-AdminHeader />
<main>
    <div class="mt-5">
        <div class="container-fluid">
            <div class="row">
                @if (Session::get('msg'))
                    <span class="text-info text-center">{{ Session::get('msg') }}</span>
                @endif
                <div class="col-md-12 text-end">
                    <a href="{{ url('admin/add_post') }}" class="btn btn-primary btn-sm">New Post</a>
                </div>
                <div class="col-md-12">
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
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>
                                            <img src="{{ asset('uploads/post/' . $item->thumbnail) }}" width="80" height="56"
                                                alt="thumbnail">
                                        </td>
                                        <td>{{ $item->title }}</td>
                                        <td>
                                            <a href="{{ url('/admin/delete_post', $item->id) }}"
                                                class="dd-icon dd-delete text-danger fs-5"
                                                onclick="return confirm('Are you sure to delete?')"></a>
                                            <a href="{{url('admin/edit_post', $item->id)}}" class="dd-icon dd-edit text-primary fs-5"></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $data->links('vendor.pagination.admin-custom') }}
                </div>
            </div>
        </div>

    </div>
</main>
<x-AdminFooter />
