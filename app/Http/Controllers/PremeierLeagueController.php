<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\TeamName;
use Faker\Provider\Image;
use App\Models\PoingTable;
use Illuminate\Http\Request;
use App\Models\CricketLeague;
use App\Models\CricketLeagueList;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PremeierLeagueController extends Controller
{
    public function live_view()
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
        // return response()->json($TeamName);

        // $responc = '<option value="">Select State</option>';
        // foreach ($TeamName as $list) {
        //     $responc .= '<option value="' . $list->tem_id . '">' . $list->team_second_name . '</option>';
        // }
        // echo $responc;
        return $TeamName;
    }
    // CricketLeagueList
    public function leg_view()
    {
        $tem = CricketLeague::all();
        return view('backend.primierleague', compact('tem'));
    }
    public function let_select($id)
    {
        $TeamName = CricketLeagueList::where('tem_id', $id)->get();
        return $TeamName;


    }
    public function point_table()
    {
        $pointtable = CricketLeagueList::all();
        return view('backend.addpoint', compact('pointtable'));
    }
    public function point_save(Request $Request)
    {

        $validator = Validator::make($Request->all(), [

            'team' => 'required',
            'mat' => 'required',
            'won' => 'required',
            'lost' => 'required',

            'nr' => 'required',
            'pts' => 'required',
            'nrr' => 'required',
            // 'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',


        ]);
        if ($validator->fails()) {
            if ($Request->ajax()) {
                return response()->json(['result' => 'errors', 'message' => $validator->errors()->all()]);
            } else {
                return back()->withErrors($validator)->withInput();
            }
        }
        $pointtable = new PoingTable();
        $pointtable->team = $Request->team;
        $pointtable->mat = $Request->mat;
        $pointtable->won = $Request->won;
        $pointtable->lost = $Request->lost;
        $pointtable->nr = $Request->nr;
        $pointtable->pts = $Request->pts;
        $pointtable->nrr = $Request->nrr;
        $pointtable->img = $Request->img;

        // if ($Request->hasFile('img')) {
        //     $file = $Request->file('img');
        //     $filename = date('YmdHi') . $file->getClientOriginalName();
        //     $file->move(public_path('public/Image'), $filename);
        //     $pointtable['img'] = $filename;
        // }
        if ($Request->hasFile('img')) {
            $image = $Request->file('img');
            $ImageName = time() . '.' . $image->getClientOriginalExtension();
            \Image::make($image)->resize(300, 300)->save(base_path('public/uploads/images/users/') . $ImageName);
            $pointtable->pointtable = 'users/' . $ImageName;
        }
        $pointtable->save();



        if (!$Request->ajax()) {
            return redirect('/point/view')->with('success', 'Information has been added.');
        } else {
            return response()->json(['result' => 'error', 'redirect' => back(), 'message' => 'Information not added .']);
            // url('live_matches')
        }
    }
    public function point_view()
    {
        $point = PoingTable::get();
        return view('backend.point_view', compact('point'));
    }

}
// PoingTable 	img
// if ($request->hasFile('team_two_image')) {
//     $file = $request->file('team_two_image');
//     $filename = date('YmdHi') . $file->getClientOriginalName();
//     $file->move(public_path('public/Image'), $filename);
//     $live_match['team_two_image'] = $filename;
// }