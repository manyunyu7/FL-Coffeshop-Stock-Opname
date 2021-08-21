@extends('template')

@section('page-heading')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Stock Opname</h3>
                    <p class="text-subtitle text-muted">Input Daily</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('material/manage') }}">Stock Opname</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Input Daily</li>
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

    <form action="{{ url('stock-opname/daily-input/store') }}" enctype="multipart/form-data" method="post">

        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Input Daily Stock Opname</h4>
                </div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <div class="form-group">
                                    <label for="">Executors</label>
                                    <select class="form-control form-select" name="user_id" id="">
                                        @forelse ($users as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @empty
                                            <option value="1">Super Admin</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Input Date</label>
                                <input type="datetime-local" required class="form-control" name="date" id=""
                                    aria-describedby="helpId" placeholder="">
                                <small id="helpId" class="form-text text-muted">Input Date</small>
                            </div>

                            <div class="form-group">
                                <label for="formFile" class="form-label">Execture Staff Signature </label>
                                <input name="photo" required class="form-control" type="file" id="formFile">
                            </div>

                        </div>

                        <div class="col-md-6">

                            <h4>Preview Signature</h4>

                            <div class="card">
                                <div class="card-content">
                                    <img src="https://i.stack.imgur.com/y9DpT.jpg" id="imgPreview"
                                        class="card-img-top img-fluid" alt="singleminded">
                                </div>

                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </section>


        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Remaining Stock</h4>
                </div>

                <div class="card-body">
                    @csrf
                    <div class="row">
                        <div class="table-responsive col-12">
                            <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                                <div class="dataTable-container">
                                    <table class="table table-striped dataTable-table" id="table_data">
                                        <thead>
                                            <tr>
                                                <th data-sortable="">No</th>
                                                <th data-sortable="">Name</th>
                                                <th data-sortable="">Unit</th>
                                                <th data-sortable="">Current Stock</th>
                                                <th data-sortable="">Remain Stock</th>
                                                <th data-sortable="">Created at</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($datas as $data)
                                                <tr>

                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $data->name }}</td>
                                                    <td>{{ $data->unit }}</td>
                                                    <td>{{ $data->stock }}</td>

                                                    <td>
                                                        <div class="form-group">
                                                            <input type="number" min="0" class="form-control"
                                                                name="used[{{ $data->id }}]" id=""
                                                                aria-describedby="helpId" value="0">
                                                        </div>
                                                    </td>
                                                    <td>{{ $data->created_at }}</td>


                                                </tr>
                                            @empty

                                            @endforelse

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>

                        <div class="col-12 mt-5 col-23">
                            <button type="button" class="btn btn-primary btn-addz">Add Data</button>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary">
                                        <h5 class="modal-title white" id="myModalLabel120">
                                            Are you sure want to add this opname data ?
                                        </h5>
                                        <button type="button" class="close hide-modal" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Added Stock can't be deleted or edited ( one way only ). 
                                        <strong>Please double check the data</strong>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light-secondary hide-modal"
                                            data-dismiss="modal">
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


                    </div>

                </div>
            </div>
        </section>
    </form>

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
    </script>


@endpush
