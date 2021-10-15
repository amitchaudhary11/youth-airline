@extends('layouts.adminlayout')

@section('content')
<div class="container-fluid">
    <div class="col-md-9 ml-sm-auto col-lg-10 px-md-4">


        <div class="bg-light">
            <h3>Create Post</h3>
            <hr>
            <form action="/blog" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-row">
                    <div class="form-group col-md-6 mr-md-4">
                        <label for="title" class="text-secondary" style="font-size: 1.1rem;">Title</label>
                        <input id="title" type="text" class="form-control" name="title" placeholder="Title..." required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6 mr-md-4">
                        <label for="summary" class="text-secondary" style="font-size: 1.1rem;">Summary</label>
                        <input id="summary" type="text" class="form-control" name="summary" placeholder="Summary..." required>
                    </div>
                </div>

                <label class="text-secondary" style="font-size: 1.1rem;">Description</label> <br>
                <div class="form-row">

                    <div class="form-group col-md-6 mr-md-4">
                        <textarea name="description" class="form-control" placeholder="Description..." id="" cols="30" rows="10"></textarea>
                    </div>
                </div>

                <label class="text-secondary" style="font-size: 1.1rem;">Select Image</label> <br>

                <div class="custom-file form-row">
                    <div class="form-group col-md-6 mr-md-4">
                    <input type="file" name="image" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Select Image</label>
                    </div>
                  </div>

                  <div>
                      <button type="submit" class="btn btn-primary my-3">Submit</button>
                  </div>
            </form>
        </div>
</div>
</div>
@endsection
