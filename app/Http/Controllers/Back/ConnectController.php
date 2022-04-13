<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Connect;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class ConnectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $connects = Connect::latest('id')->paginate(20);
        return view('back.connects.index', compact('connects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('back.connects.create');
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
        $server_name = config('app.name', 'Frura');
        $server_serial = config('app.server_serial', '');
        $server_url = config('app.url', '');
        $url = $request->url;
        $res = Http::get($url,[
            'name' => $server_name,
            'serial' => $server_serial,
            'url' => $server_url
        ]);
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
        if($request->get('approval')){
            $connect = Connect::where('id',$id)->first();
            if($connect->approval != 1){
                $connect->approval = 1;
                $connect->token = (string) Str::orderedUuid();
                $connect->save();
            }
        }
        if($request->get('rejection')){
            $connect = Connect::where('id',$id)->first();
            $connect->approval = 0;
            // $connect->token = (string) Str::orderedUuid();
            $connect->save();
        }
        
        $connects = Connect::latest('id')->paginate(20);
        return view('back.connects.index', compact('connects'));
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

    public function approval(Connect $connect)
    {
        var_dump($connect);
        $connects = Connect::latest('id')->paginate(20);
        return view('back.connects.index', compact('connects'));
    }

    public function rejection(Connect $connect, $id)
    {
        $connects = Connect::latest('id')->paginate(20);
        return view('back.connects.index', compact('connects'));
    }

}
