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
                <h4 class="card-title">Edit Material : {{ $datas->name }}</h4>
            </div>

            <div class="card-body">
                <form action="{{ url('material/update') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$datas->id}}">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Material Name</label>
                                <input type="text" name="material_name" required class="form-control"
                                    value="{{ old('material_name', $datas->name) }}" required id="basicInput"
                                    placeholder="Material Name">
                            </div>

                            <div class="form-group">
                                <label for="basicInput">Material Size Unit</label>
                                <input type="text" name="material_unit" required class="form-control"
                                    value="{{ old('material_unit', $datas->unit) }}" id=" basicInput"
                                    placeholder="Size Unit ( pcs,Kg,mg,ml,etc. )">
                            </div>

                            <div class="form-group">
                                <label for="basicInput">Stock</label>
                                <input type="number" name="stock" class="form-control"
                                    value="{{ old('stock', $datas->stock) }}" placeholder="Initial Stock">
                            </div>

                            <div class="border p-4 mt-2">
                                <h4>Edit Stock</h4>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal"
                                    data-target="#add-stock-modal">
                                    Add Stock
                                </button>
                                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal"
                                    data-target="#add-stock-modal">
                                    Reduce Stock
                                </button>
                            </div>

                            <div class="col-12 mt-4">
                                <button type="submit" class="btn btn-primary btn-block">Save Data</button>
                            </div>



                            <!-- Modal -->
                            <div class="modal fade" id="add-stock-modal" tabindex="-1" role="dialog"
                                aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Body
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="formFile" class="form-label">Material Photo ( Left empty if you dont want to
                                    edit )</label>
                                <input name="photo" class="form-control" type="file" id="formFile">
                            </div>

                            <img src="{{ asset($datas->photo) }}" style="border-radius: 20px" id="imgPreview"
                                class="img-fluid" alt="Responsive image">
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
