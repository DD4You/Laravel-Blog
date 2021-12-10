<x-AdminHeader />
<main>
    <div class="my-5">
        <div class="container-fluid">
            <div class="row g-5">

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body p-2">
                            <h5 class="card-title">Total Post</h5>
                            <h1 class="text-primary text-end total_count">{{$data['posts']}}</h1>
                            <small><a href="{{ url('admin/posts') }}" class="text-success">Go To Posts</a></small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body p-2">
                            <h5 class="card-title">Total Category</h5>
                            <h1 class="text-primary text-end total_count">{{$data['categories']}}</h1>
                            <small><a href="{{ url('admin/categories') }}" class="text-success">Go To Categories</a></small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body p-2">
                            <h5 class="card-title">Total Comment</h5>
                            <h1 class="text-primary text-end total_count">{{$data['comments']}}</h1>
                            <small><a href="" class="text-success">&nbsp;</a></small>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>
<x-AdminFooter />
