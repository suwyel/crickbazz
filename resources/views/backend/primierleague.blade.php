



@extends('backend.layoute.app')
@section('content')
<!-- Row -->
<div class="row">
    <!-- Datatables -->

    <!-- DataTable with Hover -->
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">DataTables with Hover</h6>
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                        <tr>
                            <th>Img</th>
                            <th>Team</th>
                            <th>Mat</th>
                            <th>won</th>
                            <th>Lost</th>
                            <th>NR</th>
                            <th>Pts</th>
                            <th>NRR</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Img</th>
                            <th>Team</th>
                            <th>Mat</th>
                            <th>won</th>
                            <th>Lost</th>
                            <th>NR</th>
                            <th>Pts</th>
                            <th>NRR</th>
                        </tr>
                    </tfoot>
                    <tbody>


                        <tr>
                            <td>Michael Bruce</td>
                            <td>Javascript Developer</td>
                            <td>Singapore</td>
                            <td>29</td>
                            <td>2011/06/27</td>
                            <td>$183,000</td>
                            <td>$183,000</td>
                            <td>$183,000</td>
                        </tr>
                        <tr>
                            <td>Donna Snider</td>
                            <td>Customer Support</td>
                            <td>New York</td>
                            <td>27</td>
                            <td>2011/01/25</td>
                            <td>$112,000</td>
                            <td>$112,000</td>
                            <td>$112,000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!--Row-->
@endsection
