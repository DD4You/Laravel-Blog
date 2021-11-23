<x-AdminHeader />
<main>
    <div class="mt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ url('admin/update_post') }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="{{$data['post']['id']}}">
                        @csrf
                        <div class="row mb-3">
                            @if (Session::get('msg'))
                                <span class="text-info text-center">{{ Session::get('msg') }}</span>
                            @endif
                            <div class="col">
                                <label class="form-label">Category Name</label>
                                <select name="category_id" class="form-select">
                                    <option value="">Select Category</option>
                                    @foreach ($data['categories'] as $category)
                                        @if ($data['post']['category_id'] == $category->id)
                                            <option value="{{ $category->id }}" selected>{{ $category->name }}
                                            </option>
                                        @else
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <span class="text-danger">@error('category_id') {{ $message }} @enderror</span>
                            </div>
                            <div class="col">
                                <label class="form-label">Post Thumbnail</label>
                                <input type="file" class="form-control" name="thumbnail">
                                <span class="text-danger">@error('thumbnail') {{ $message }} @enderror</span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Post Titel</label>
                            <input type="text" class="form-control" name="title" placeholder="Enter category name"
                                value="{{ $data['post']['title'] }}">
                            <span class="text-danger">@error('title') {{ $message }} @enderror</span>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Post Description</label>
                            <textarea class="form-control" name="description" placeholder="description" cols="30"
                                rows="10">{{ $data['post']['description'] }}</textarea>
                            <span class="text-danger">@error('description') {{ $message }} @enderror</span>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<x-AdminFooter />
