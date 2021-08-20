@extends('template')

@section('page-heading')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Caffe Menu</h3>
                    <p class="text-subtitle text-muted">Add New Menu</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('material/manage') }}">Caffe Menu</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-content')
    <section class="section">
        @include('components.message')
    </section>

    

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add New Menu</h4>
            </div>

            <div class="card-body">
                <form action="{{ url('menu/store') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Menu Name</label>
                                <input type="text" name="name" required class="form-control"
                                    value="{{ old('name') }}" required id="inputName"
                                    placeholder="Menu Name">
                            </div>

                            <div class="form-group">
                                <label for="formFile" class="form-label">Menu Photo</label>
                                <input name="photo" class="form-control" type="file" id="formFile">
                            </div>

                            <div class="form-group">
                              <label for="">Description</label>
                              <textarea class="form-control" name="description" id="" rows="13"></textarea>
                            </div>

                        </div>

                        <div class="col-md-6">

                            <h4>Preview Menu</h4>
              
                            <div class="card">
                                <div class="card-content">
                                    <img src="https://i.stack.imgur.com/y9DpT.jpg"  id="imgPreview" class="card-img-top img-fluid"
                                        alt="singleminded">
                                    <div class="card-body">
                                        <h5 class="card-title" id="previewName">Americano (Example)</h5>
                                        <p id="menuDescription" class="card-text">
                                            Chocolate sesame snaps apple pie danish cupcake sweet roll jujubes
                                            tiramisu.Gummies
                                            bonbon apple pie fruitcake icing biscuit apple pie jelly-o sweet roll.
                                        </p>
                                    </div>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Example Ingredients 1</li>
                                    <li class="list-group-item">Example Ingredients 2</li>
                                    <li class="list-group-item">Example Ingredients 3</li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Add Data</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </section>

@endsection


@push('script')
    <script>
        var el = document.getElementById('formFile');
        el.onchange = function() {
            var fileReader = new FileReader();
            fileReader.readAsDataURL(document.getElementById("formFile").files[0])
            fileReader.onload = function(oFREvent) {
                document.getElementById("imgPreview").src = oFREvent.target.result;
            };
        }


    
        $.preview = function() {
                $("#previewName").text($("#inputName").val());
                var title = $.trim($("#inputName").val())
                if (title == "") {
                    $("#previewName").text("Menu Name")
                }
            };

            $("#inputName").keyup(function() {
                $.preview();
            });
    </script>
@endpush
