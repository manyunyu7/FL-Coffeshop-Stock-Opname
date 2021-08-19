@extends('template')

@section('page-heading')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Supplier</h3>
                    <p class="text-subtitle text-muted">Edit Supplier</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('supplier/manage') }}">Supplier</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
                <h4 class="card-title">Edit Supplier :  {{$datas->name}}</h4>
            </div>

            <div class="card-body">
                <form action="{{ url('supplier/update') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$datas->id}}">
                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="basicInput">Supplier Name</label>
                                <input type="text" name="name" required class="form-control" value="{{ old('name',$datas->name) }}"
                                    required id="basicInput" placeholder="Supplier Name">
                            </div>

                            <div class="form-group">
                                <label for="basicInput">Supplier Contact</label>
                                <input type="number" name="contact" class="form-control" value="{{ old('contact',$datas->contact) }}"
                                    placeholder="Supplier Contact">
                            </div>

                            <div class="form-group">
                                <label for="">Supplier Address</label>
                                <textarea class="form-control" name="address" placeholder="Address" rows="5">{{$datas->address}}</textarea>
                            </div>



                        </div>

                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="formFile" class="form-label">Material Photo</label>
                                <input name="photo" class="form-control" type="file" id="formFile">
                            </div>

                            <img src='{{asset("$datas->photo")}}' style="border-radius: 20px" onerror="imgError('https://i.stack.imgur.com/y9DpT.jpg');" id="imgPreview"
                                class="img-fluid" alt="Responsive image">
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
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

