<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\Connect;
use App\Http\Requests\StoreConnectRequest;
use App\Http\Requests\UpdateConnectRequest;
use Illuminate\Http\Request;

class ConnectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    public function entry(Request $request)
    {
        //
        $chk = Connect::firstOrNew(['url' => $request->url]);
        if(!$chk->exists){
            $result = Connect::create([
                "name" => $request->name,
                "relation" => 0,
                "serial" => $request->serial,
                "url" => $request->url,
                "token" => "",
                "approval" => 0
            ]);
            if($result){
                return response()->json([
                    'code' => 200,
                    'name' => config('app.name', 'Frura')
                ], 200);
            }else{
                return response()->json([
                    'code' => 400,
                    'result' => 'Bad Request'
                ], 400);
            }
        }else{
            return response()->json([
                'code' => 404,
                'result' => 'Bad Request'
            ], 404);
        }
    }

    public function check(Request $request)
    {
        if(Connect::where("serial",$request->serial)->exists())
        {
            $chk=Connect::where("serial",$request->serial)->first();
            if($chk->approval==1){
                return response()->json([
                    "code" => 200,
                    "token" => $chk->token
                ], 200);
            }else{
                return response()->json([
                    'code' => 400,
                    'result' => 'Bad Request'
                ], 400);
            }
        }else{
            return response()->json([
                'code' => 404,
                'result' => 'Bad Request'
            ], 404);
        }

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
     * @param  \App\Http\Requests\StoreConnectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreConnectRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Connect  $connect
     * @return \Illuminate\Http\Response
     */
    public function show(Connect $connect)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Connect  $connect
     * @return \Illuminate\Http\Response
     */
    public function edit(Connect $connect)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateConnectRequest  $request
     * @param  \App\Models\Connect  $connect
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateConnectRequest $request, Connect $connect)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Connect  $connect
     * @return \Illuminate\Http\Response
     */
    public function destroy(Connect $connect)
    {
        //
    }
}
