{{-- @extends('backend.layoute.app')
@section('content')

    <table>
        <tr>
            <td><select name="" id="select_tem" class="w-100 mt-5">
                <option value="">Select Team Name</option>
                @foreach ($tem as $tem)
                <option value="{{$tem->id}}">{{$tem->tem_name}}</option>
                @endforeach

            </select></td>
        </tr>

    </table>
<button >ok</button>
@endsection
@section('js_script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {

      $("#select_tem").change(function (e) {
          e.preventDefault();
          var id = $(this).val();
          console.log(id)
        //   alert(id)
        $.ajaxSetup({
        headers : {
        'CSRFToken' : getCSRFTokenValue()
        }
        });
        $.ajax({
            type: "post",
            url: "mass/select",
            data: {'id'=+id},
            dataType: "dataType",
            success: function (response) {

            }
        });

      });

    });
</script>


@endsection --}}






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 8 Country State City Dropdown</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container">
        <h2>Laravel 8 Country State City Dropdown</h2>
        <form>
            <div class="form-group">

                <select id="country" class="form-control">
                    <option value="">Select Country</option>
                   @foreach ($tem as $tem)
                    <option value="{{$tem->id}}">{{$tem->tem_name}}</option>
                    @endforeach
                </select>

                <br />
                <select id="state" class="form-control">
                    <option value="">Select State</option>
                </select>
                <br />

                <select id="city" class="form-control">
                    <option value="">Select City</option>
                </select>


            </div>
        </form>
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        jQuery(document).ready(function(){
            $('#country').change(function (e) {
                e.preventDefault();
                var id= $(this).val();
                // alert(id)

            //    $.ajaxSetup({
            // headers: {
            // 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            // }
            // });
                $.ajax({
                    type: "get",
                    url: "/getState/"+id,
                    // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id
                    },
                    // data: "data",
                    dataType: "json",
                    success: function (response) {
						// jQuery('#state').html(response.html);
                        // $('#state').html(response.html);
                        alert(response)
                        console.log(response)
                    }
                });
            });
			// jQuery('#country').change(function(){
				// var id= $(this).val();
				// jQuery('#city').html('<option value="">Select City</option>')
                // alert(id)
			// 	jQuery.ajax({
			// 		url:'/getState'+id,
			// 		type:'post',
			// 		data:{id = id},
			// 		success:function(result){
			// 			// jQuery('#state').html(result)
            //             console.log(result.TeamName);
            //             alert('ok')
			// 		}
			// 	});
			// });

			// jQuery('#state').change(function(){
			// 	let sid=jQuery(this).val();
			// 	jQuery.ajax({
			// 		url:'/getCity',
			// 		type:'post',
			// 		data:'sid='+sid+'&_token={{csrf_token()}}',
			// 		success:function(result){
			// 			jQuery('#city').html(result)
			// 		}
			// 	});
			// });

		});

    </script>
</body>

</html>
