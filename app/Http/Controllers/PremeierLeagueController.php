<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\TeamName;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PremeierLeagueController extends Controller
{
    public function line_view()
    {
        $tem = Team::all();
        return view('backend.temname', compact('tem'));
    }
    public function getState($id)
    {
        // $cid=$request->post('cid');
		// $state=DB::table('TeamName')->where('TeamName',$cid)->get();
		// $html='<option value="">Select State</option>';
		// foreach($state as $list){
		// 	$html.='<option value="'.$list->id.'">'.$list->state.'</option>';
		// }
		// echo $html;
        $TeamName = TeamName::where('tem_id',$id)->get();
        return response()->json($TeamName);

        $html = '<option value="">Select State</option>';
        foreach ($TeamName as $list) {
            $html .= '<option value="' . $list->tem_id . '">' . $list->team_second_name . '</option>';
        }
        echo $html;
        // return $TeamName;
    }

}