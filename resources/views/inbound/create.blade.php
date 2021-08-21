@extends('template')

@section('page-heading')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Inbound Logistics</h3>
                    <p class="text-subtitle text-muted">Add New Materials from Suppliers</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('inbound/manage') }}">Inbound Logistics</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create</li>
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
                <h4 class="card-title">Create New Inbound Logistics</h4>
            </div>

            <div class="card-body">
                <form action="{{ url('inbound/store') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="">Invoice Number ( Optional ) </label>
                                <input type="text" class="form-control" name="transaction_number"
                                    placeholder="Invoice Number (Optional)">
                                <small id="helpId" class="form-text text-muted">Invoice Number</small>
                            </div>

                            <div class="form-group">
                                <label for="">Material That restocked</label>
                                <select class="form-control form-select" name="material_id" id="">
                                    @forelse ($materials as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @empty

                                    @endforelse
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Restocked From : </label>
                                <select class="form-control form-select" name="supplier_id" id="">
                                    @forelse ($suppliers as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @empty

                                    @endforelse
                                </select>
                            </div>



                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Material Amount</label>
                                <input type="number" name="amount" required class="form-control"
                                    value="{{ old('amount') }}" id=" basicInput"
                                    placeholder="Amount of material that supplied">
                            </div>

                            <div class="form-group">
                                <label for="formFile" class="form-label">Invoice Photo</label>
                                <input name="photo" required class="form-control" type="file" id="formFile">
                            </div>

                            <img src="https://i.stack.imgur.com/y9DpT.jpg" style="border-radius: 20px" id="imgPreview"
                                class="img-fluid" alt="Responsive image">

                        </div>

                        <div class="col-12">
                            <button type="button" class="btn btn-primary btn-addz">Add Data</button>
                        </div>

                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <h5 class="modal-title white" id="myModalLabel120">
                                        Are you sure want to add this inbound data ?
                                    </h5>
                                    <button type="button" class="close hide-modal" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Added Stock can't be deleted or edited ( one way only )
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-secondary hide-modal" data-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class=" d-sm-block">Close</span>
                                    </button>

                                    <button type="submit" class="btn btn-primary ml-1 hide-modal " data-dismiss="modal">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class=" d-sm-block">Submit Data</span>
                                    </button>

                                </div>
                            </div>
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

        $('body').on("click", ".btn-addz", function() {
            var id = $(this).attr("id")
            $("#add-modal").modal("show")
        });


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
