<?php

namespace App\Http\Controllers;

use App\Models\PoingTable;
use Illuminate\Http\Request;
use App\Models\CricketLeague;
use App\Models\CricketLeagueList;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
   public function league_view()
   {
        $list = PoingTable::get();
        // return $list;
        if ($list == '') {
           return response()->json(['status' => 'false', 'message' => 'no data found!']);
            // return $list;
        }else {
            return $list;
            // return 'no record found';

        }


   }
   public function league_find($id)
   {
        $find = PoingTable::find($id);
        // return $find;
        if ($find == '') {
            return response()->json(['status' => 'false', 'message' => 'no data found!']);

        } else {
            // return $find;
            return response()->json([$find]);

        }




   }

    public function league_delete($id)
    {
        $delet = PoingTable::find($id);

        if ($delet == '') {
           return response()->json(['status' => 'false', 'message' => 'no data found !']);
        } else {
            $delet->delete();
            return response()->json(['status' => 'true', 'message' => 'data delete successfully !']);

        }


    }
    public function league_edite(Request $Request, $id)
    {
        $validator = Validator::make($Request->all(), [

            'match' => 'required',
            'mat' => 'required',
            'won' => 'required',
            'lost' => 'required',

            'nr' => 'required',
            'pts' => 'required',
            'nrr' => 'required',

        ]);
        if ($validator->fails()) {
            if ($Request->ajax()) {
                return ['success' => 'data validat success '];
            } else {
                // return ['error' => 'data not updet '];
                return response()->json($validator->errors(), 500);
            }
        }
        $pointtable = PoingTable::find($id);
        $pointtable->team = $Request->match;
        $pointtable->mat = $Request->mat;
        $pointtable->won = $Request->won;
        $pointtable->lost = $Request->lost;
        $pointtable->nr = $Request->nr;
        $pointtable->pts = $Request->pts;
        $pointtable->nrr = $Request->nrr;
        $pointtable->img = $Request->img;
        if ($Request->hasFile('img')) {
            $file = $Request->file('img');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image'), $filename);
            $live_match['img'] = $filename;
        }
        // $pointtable->save();
        if ($pointtable == '') {
            return response()->json(['status' => 'false', 'message' => 'data not updet !']);
        } else {
            $pointtable->save();
            return response()->json(['status' => 'true', 'message' => 'data updet successfully !']);
        }


    }

// league add


public function league()
{
        $view = CricketLeague::get();
        return $view;
}
public function add()
{
        $view = new CricketLeague();
        return $view;
}



}