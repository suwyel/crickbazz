


@extends('backend.layoute.app')
@section('content')
<div class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
            </div>
            <div class="table-responsive p-3">
                <a class="nav-link btn btn-danger mb-3" style="width: 80px"  href="{{url('/point/table')}}">
                         <span>add </span>
                    </a>
                <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th>id</th>
                            <th>img</th>
                            <th>team</th>
                            <th>nat</th>
                            <th>won</th>
                            <th>nr </th>
                            <th>pts</th>
                            <th>nrr</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                           <th>id</th>
                           <th>img</th>
                            <th>team</th>
                            <th>nat</th>
                            <th>won</th>
                            <th>nr </th>
                            <th>pts</th>
                            <th>nrr</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($point as $point )
                        <tr>
                            <td>{{$point->id}}</td>
                            <td><img src="{{ asset('public/uploads/images/users/'.$point->img) }}" alt=""></td>
                            <td>{{$point->team}}</td>
                            <td>{{$point->nat}}</td>
                            <td>{{$point->won}}</td>
                            <td>{{$point->nr}}</td>
                            <td>{{$point->pts}}</td>
                            <td>{{$point->nrr}}</td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js_script')
<script src="{{ asset('backend/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
</script>
@endsection
