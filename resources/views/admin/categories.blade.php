<x-AdminHeader />
<main>
    <div class="mt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 text-end">
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#formModal"
                        data-title="Add">Add
                        Category</button>
                </div>
                <div class="col-md-12">
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
                                        <td>
                                            <span>Delete</span>
                                            <span data-bs-toggle="modal" data-bs-target="#formModal"
                                            data-title="Edit">Edit</span>
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
<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
    aria-labelledby="formModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="categoryInput" class="form-label">Category Name</label>
                        <input type="text" class="form-control" name="name" id="categoryInput">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    var formModal = document.getElementById('formModal')
    formModal.addEventListener('show.bs.modal', function(event) {

        var button = event.relatedTarget
        var title = button.getAttribute('data-title')

        var modalTitle = formModal.querySelector('.modal-title')

        modalTitle.textContent = title + ' Category'
    })
</script>
