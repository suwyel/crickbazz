@extends('backend.layoute.app')
@section('content')
<div class="container">
    <h2>INDEAN PREMIER LEAGUE 2022</h2>

    <div class="form-group">
        <label for="title">Team Name</label>
        <select id="country" class="form-control">
            <option id="hide" value="0">Team Select</option>
            @foreach ($tem as $tem)
            <option value="{{ $tem->id }}">{{ $tem->tem_name }}</option>
            @endforeach
        </select>

        <br />


        <div class="form-group" id="match" style="display: none">
            <label for="title">Match Select</label>
            <select name="city" class="form-control">
                <option value="">Match Select</option>
            </select>

            <br />

            {{-- <select id="city" class="form-control">
                <option value="">Select City</option>
            </select> --}}

        </div>

    </div>
</div>
@endsection
@section('js_script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    jQuery(document).ready(function() {
            $('#country').change(function(e) {
                e.preventDefault();
                var id = $(this).val();
                $('#match').show();
                // alert(id)

                $.ajax({
                    type: "get",
                    url: "/leg/select/" + id,
                    // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id
                    },
                    // data: "data",
                    dataType: "json",
                    success: function(response) {
                        // console.log(response);

                        $('select[name="city"]').html('<option  value="">Match Select</option>')
                        $.each(response, function(key, value) {
                            $('select[name="city"]').append('<option value="' + key.id +
                                '">' + value.team_name +  '</option>');

                        });

                    }
                });
            });



        });
</script>
@endsection
