@extends('backend.layoute.app')
@section('content')
    <div class="container">
        <div class=" ">
            <div class="">
                <div class="card-body">
                    {{-- <p class="bg-primary p-3 text-center text-white">add point</p> --}}
                    <form action="{{ url('/point/save') }}" method="post" autocomplete="off">
                    <p class=" p-3 text-center text-black" style="background-color: #b17a7a26;">add point</p>
                        @csrf
                        {{-- @if ($success->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($success->all() as $success)
                                        <li>{{ $success }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif --}}
                        <div class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
                            <div class="col-6 ">
                                <div class="form-group ">
                                    <label for="select2Single">Team</label>
                                    {{-- <option value="">select</option> --}}
                                    <select class="select2-single form-control " name="team" id="team" >
                                        <option value="">select</option>
                                        @foreach ($pointtable as $pointtable)
                                            {{-- <option value="">select</option> --}}
                                            <option value="{{  $pointtable->id }}">{{ $pointtable->tem_name }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="col-6 ">
                                <div class="form-group ">
                                    <label for="select2Single">match</label>
                                   <select name="match" class="form-control" id="match">
                                        <option value="">Match Select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6 ">
                                <div class="form-group ">
                                    <label for="select2Single">Mat</label>
                                    <input type="number" name="mat" id="mat" value="{{ old('mat') }}" class="form-control @error('mat') is-invalid @enderror">
                                </div>

                                {{-- @error('mat')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror --}}
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="select2Single">Won</label>
                                    <input type="number" name="won" id="won" value="{{ old('won') }}" class="form-control @error('won') is-invalid @enderror">
                                </div>
                                {{-- @error('won')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror --}}
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="select2Single">Lost</label>
                                    <input type="number" name="lost" id="lost" value="{{ old('lost') }}" class="form-control @error('lost') is-invalid @enderror">
                                </div>
                                {{-- @error('lost')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror --}}
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="select2Single">Nr</label>
                                    <input type="number" name="nr" id="nr" value="{{ old('nr') }}" class="form-control @error('nr') is-invalid @enderror">
                                </div>
                                {{-- @error('nr')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror --}}
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="select2Single">Pts</label>
                                    <input type="number" name="pts" id="pts" value="{{ old('pts') }}" class="form-control @error('pts') is-invalid @enderror">
                                </div>
                                {{-- @error('pts')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror --}}
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="select2Single">NRR</label>
                                    <input type="number" name="nrr" id="nrr" value="{{ old('nrr') }}" class="form-control @error('nrr') is-invalid @enderror">
                                </div>
                                {{-- @error('nrr')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror --}}
                            </div>

                            <div class="col-6  @error('mat') is-invalid @enderror">
                                <div class=" buttom-0">
                                    <label for="select2Single">image</label>

                                 <input type="file" name="img" id="img" value="{{ old('img') }}" class="form-control @error('img') is-invalid @enderror">
                                @error('img')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>

                            </div>
                            <div class="col-6 justify-content-center d-flex vh-auto align-items-center @error('mat') is-invalid @enderror">
                                <div class=" buttom-0">
                                <button class="btn btn-lg  btn-primary">save</button>
                                </div>

                            </div>
                        </div>








                    </form>
                </div>
            </div>
        </div>

    @endsection
    @section('js_script')
<script>
    jQuery(document).ready(function() {
            $('#team').change(function(e) {
                e.preventDefault();
                var id = $(this).val();
                // $('#match').show();
                // alert(id)

                $.ajax({
                    type: "get",
                    url: "/add/select/" + id,
                    // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id
                    },
                    // data: "data",
                    dataType: "json",
                    success: function(response) {
                        console.log(response);

                        $('select[name="match"]').html('<option  value="">Match Select</option>')
                        $.each(response, function(key, value) {
                            $('select[name="match"]').append('<option value="' + value.team_name +
                                '">' + value.team_name +  '</option>');

                        });

                    }
                });
            });



        });
</script>
    @endsection
