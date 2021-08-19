@extends('template')

@section('page-heading')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Material / Bahan</h3>
                    <p class="text-subtitle text-muted">Tambah Material/Bahan Baru</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('material/manage') }}">Material/Bahan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah</li>
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
                <h4 class="card-title">Add New Material</h4>
            </div>

            <div class="card-body">
                <form action="{{ url('material/store') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Material Name</label>
                                <input type="text" name="material_name" required class="form-control"
                                    value="{{ old('material_name') }}" required id="basicInput"
                                    placeholder="Material Name">
                            </div>

                            <div class="form-group">
                                <label for="basicInput">Material Size Unit</label>
                                <input type="text" name="material_unit" required class="form-control"
                                    value="{{ old('material_unit') }}" id=" basicInput"
                                    placeholder="Size Unit ( pcs,Kg,mg,ml,etc. )">
                            </div>

                            <div class="form-group">
                                <label for="basicInput">Stock</label>
                                <input type="number" name="stock" class="form-control" value="{{ old('stock') }}"
                                    placeholder="Initial Stock">
                            </div>
                        </div>

                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="formFile" class="form-label">Material Photo</label>
                                <input name="photo" class="form-control" type="file" id="formFile">
                            </div>

                            <img src="https://i.stack.imgur.com/y9DpT.jpg" style="border-radius: 20px" id="imgPreview" class="img-fluid" alt="Responsive image">
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


        $(document).ready(function() {
            $.myfunction = function() {
                $("#previewName").text($("#inputTitle").val());
                var title = $.trim($("#inputTitle").val())
                if (title == "") {
                    $("#previewName").text("Judul")
                }
            };

            $("#inputTitle").keyup(function() {
                $.myfunction();
            });

        });
    </script>
@endpush
