@extends('template')

@section('page-heading')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Caffe Menu</h3>
                    <p class="text-subtitle text-muted">Edit Menu</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('menu/manage') }}">Caffe Menu</a></li>
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
                <h3 class="">Edit Menu : {{ $datas->name }}</h3>
            </div>

            <div class="card-body">
                <form action="{{ url('menu/update') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $datas->id }}">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Menu Name</label>
                                <input type="text" name="name" required class="form-control"
                                    value="{{ old('name', $datas->name) }}" required id="basicInput"
                                    placeholder="Menu Name">
                            </div>

                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea class="form-control" name="description" id=""
                                    rows="13">{{ $datas->description }}</textarea>
                            </div>



                            <div class="col-12 mt-4">
                                <button type="submit" class="btn btn-primary btn-block">Save Data</button>
                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="formFile" class="form-label">Material Photo ( Left empty if you dont want to
                                    edit )</label>
                                <input name="photo" class="form-control" type="file" id="formFile">
                            </div>

                            <img src="{{ asset($datas->photo) }}" style="border-radius: 20px; width:100%; height:400px;"
                                id="imgPreview" class="img-fluid" alt="Responsive image">
                        </div>


                    </div>

                </form>

            </div>
        </div>
    </section>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h3 class="">Add Ingredients for {{ $datas->name }}</h3>
            </div>

            <div class="card-body">
                <form action="{{ url('ingredients/store') }}" method="post">
                    @csrf
                    <input type="hidden" name="menu_id" value="{{ $datas->id }}">
                    <div class="row">
                        <div class="col-md-6">

                            <div class="border p-4 mt-2 mb-4">
                                <div class="form-group">
                                    <label for="">Choose Ingredients</label>
                                    <select class="form-control form-select" name="material_id">
                                        <option value="">Choose Ingredient</option>
                                        @forelse ($materials as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @empty

                                        @endforelse
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="">Amount</label>
                                    <input type="number" min="0" max="99999" class="form-control" name="amount"
                                        aria-describedby="helpId" placeholder="Used Amount for 1 portion">
                                    <small id="helpId" class="form-text text-muted">Amount of used ingredients</small>
                                </div>

                                <button type="submit" class="btn btn-primary btn-block">Add Ingredients</button>

                            </div>

                        </div>

                    </div>

                </form>

            </div>
        </div>
    </section>



    <!-- Input Style start -->
    <section id="input-style">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Manage Ingredients on {{ $datas->name }}</h3>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                                <div class="dataTable-container">
                                    <table class="table table-striped dataTable-table" id="table_data">
                                        <thead>
                                            <tr>
                                                <th data-sortable="">No</th>
                                                <th data-sortable="">Ingredients Name</th>
                                                <th data-sortable="">Unit</th>
                                                <th data-sortable="">Used Composition</th>
                                                <th data-sortable="">Created at</th>
                                                <th data-sortable="">Edit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($materialUsed as $data)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $data->material->name }}</td>
                                                    <td>{{ $data->material->unit }}</td>
                                                    <td>{{ $data->amount }}</td>
                                                    {{-- <td>
                                                        <img height="200px" style="border-radius: 20px"
                                                            src='{{ asset("$data->photo") }}' alt="">
                                                    </td> --}}
                                                    <td>{{ $data->created_at }}</td>
                                                    <td>
                                                        <button id="{{ $data->id }}" data-toggle="modal" type="button"
                                                            class="btn btn-primary btn-delete">Delete Data</button>
                                                    </td>
                                                </tr>
                                            @empty

                                            @endforelse

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Modal -->
    <div class="modal fade" id="destroy-modal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title white" id="myModalLabel120">
                        Are You Sure want to delete this ingredients?
                    </h5>
                    <button type="button" class="close hide-modal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    This ingredients will be deleted from this recipe
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary hide-modal" data-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class=" d-sm-block">Close</span>
                    </button>

                    <a class="btn-destroy" href="">
                        <button type="button" class="btn btn-danger ml-1 hide-modal " data-dismiss="modal">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class=" d-sm-block">Delete</span>
                        </button>
                    </a>

                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/bs4-4.1.1/jszip-2.5.0/dt-1.10.23/b-1.6.5/b-colvis-1.6.5/b-flash-1.6.5/b-html5-1.6.5/b-print-1.6.5/cr-1.5.3/r-2.2.7/sb-1.0.1/sp-1.2.2/datatables.min.js">
    </script>
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js">
    </script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js">
    </script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js">
    </script>

    <script type="text/javascript">
        $(function() {
            var table = $('#table_data').DataTable({
                processing: true,
                serverSide: false,
                columnDefs: [{
                    orderable: true,
                    targets: 0
                }],
                dom: 'T<"clear">lfrtip<"bottom"B>',
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                buttons: [
                    'copyHtml5',
                    {
                        extend: 'excelHtml5',
                        title: 'Data Export {{ \Carbon\Carbon::now()->year }}'
                    },
                    'csvHtml5',
                ],
            });
        });

        $('body').on("click", ".btn-delete", function() {
            var id = $(this).attr("id")
            $(".btn-destroy").attr("href", window.location.origin + "/ingredients/" + id + "/delete")
            $("#destroy-modal").modal("show")
        });
    </script>


@endpush

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
