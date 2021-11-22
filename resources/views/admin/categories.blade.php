<x-AdminHeader />
<main>
    <div class="mt-5">
        <div class="container-fluid">
            <div class="row">
                @if (Session::get('msg'))
                    <span class="text-info text-center">{{ Session::get('msg') }}</span>
                @endif
                <div class="col-md-12 text-end">
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#formModal">Add
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
                                            <a href="{{ url('/admin/delete_category', $item->id) }}"
                                                class="dd-icon dd-delete text-danger fs-5"
                                                onclick="return confirm('Are you sure to delete?')"></a>
                                            <a href="javascript:void(0)" class="dd-icon dd-edit text-primary fs-5"
                                                onclick="showEditModal('{{ $item->id }}', '{{ $item->name }}')"></a>
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
                <h5 class="modal-title">Add Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="frm">
                <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Category Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter category name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary btn-sm">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="formEditModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
    aria-labelledby="formEditModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="frmEdit">
                <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                        <input type="hidden" name="id" id="category_id">
                        <label for="category" class="form-label">Category Name</label>
                        <input type="text" class="form-control" name="name" id="category">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary btn-sm">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    var notyf = new Notyf({
        position: {
            x: 'right',
            y: 'top'
        },
    });

    // var formModal = document.getElementById('formModal');
    // formModal.addEventListener('show.bs.modal', function(event) {

    //     var button = event.relatedTarget;
    //     var title = button.getAttribute('data-title');

    //     var modalTitle = formModal.querySelector('.modal-title');
    //     modalTitle.textContent = title + ' Category';
    // });

    document.getElementById('frm').addEventListener("submit", function(e) {
        e.preventDefault();

        let formData = new FormData(this);

        fetch('{{ url('admin/manage_category') }}', {
                method: 'POST',
                body: formData,
            })
            .then(response => response.json())
            .then(result => {
                if (result.hasOwnProperty('success')) {
                    notyf.success(result.success);
                    setTimeout(() => location.reload(), 1000);
                } else {
                    notyf.error(result.error[0]);
                }
            })
            .catch(error => {
                notyf.error(error);
            });
    });

    function showEditModal(id, name) {
        let modal = new bootstrap.Modal(document.getElementById('formEditModal'), {
            backdrop: 'static',
            keyboard: false,
            focus: true
        });
        modal.show();
        document.getElementById('category_id').value = id;
        document.getElementById('category').value = name;
    }

    document.getElementById('frmEdit').addEventListener("submit", function(e) {
        e.preventDefault();

        let formData = new FormData(this);

        fetch('{{ url('admin/manage_category') }}', {
                method: 'POST',
                body: formData,
            })
            .then(response => response.json())
            .then(result => {
                if (result.hasOwnProperty('success')) {
                    notyf.success(result.success);
                    setTimeout(() => location.reload(), 1000);
                } else {
                    notyf.error(result.error[0]);
                }
            })
            .catch(error => {
                notyf.error(error);
            });
    });
</script>
