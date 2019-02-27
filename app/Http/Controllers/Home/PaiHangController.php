<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class PaiHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $res = DB::table('music')
        ->orderby('hot','desc')->limit('10')
        ->get();
        //dd($res);
        $rr = 0;
        //dd($res);
        return view('/home/paihang/index',[
            'res'=>$res,
            'rr' =>$rr
        ] );
    } 
    public function xg(Request $request)
    {
        //
        $res = DB::table('music')
        ->orderby('mid','desc')->limit('10')
        ->get();
        //dd($res);
        $rr = 0;
        //dd($res);
        return view('/home/paihang/index',[
            'res'=>$res,
            'rr' =>$rr
        ] );
    } 
    public function lx(Request $request)
    {
        //
        $res = DB::table('music')
        ->where('styles',0)->orwhere('styles',1)
        ->orderby('hot','desc')->limit('10')
        ->get();
        //dd($res);
        $rr = 0;
        //dd($res);
        return view('/home/paihang/index',[
            'res'=>$res,
            'rr' =>$rr
        ] );
    } 
    public function jd(Request $request)
    {
        //
        $res = DB::table('music')
        ->where('styles',2)->orwhere('styles',5)
        ->orderby('hot','desc')->limit('10')
        ->get();
        //dd($res);
        $rr = 0;
        //dd($res);
        return view('/home/paihang/index',[
            'res'=>$res,
            'rr' =>$rr
        ] );
    }    
    public function qyy(Request $request)
    {
        //
        $res = DB::table('music')
        ->where('styles',4)->orwhere('styles',7)
        ->orderby('hot','desc')->limit('10')
        ->get();
        //dd($res);
        $rr = 0;
        //dd($res);
        return view('/home/paihang/index',[
            'res'=>$res,
            'rr' =>$rr
        ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
