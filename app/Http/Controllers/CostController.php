<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cost;
use Redirect;
use Illuminate\Support\Facades\DB;

class CostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$costs = Cost::all();
        $date = date('Y-m-d');
        $costs = DB::select("select * from costs where date = '$date'");
        return view('cost.index', compact('costs'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cost/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form = $request->all();
        Cost::create($form);
        return redirect('cost');
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
        $cost = Cost::find($id);
        return view('cost.edit', compact('cost'));
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
        $form = $request->all();
        $form = Cost::find($id)->update($form);
        return redirect('cost');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cost::find($id)->delete();
        return redirect('cost');
    }
    public function record(Request $request){
        $fdate = $request->fdate;
        $tdate = $request->tdate;
        //return $fdate;

        $costs = Cost::groupBy('date')->selectRaw('SUM(qty *price) as total,date')->get();
        return view('cost.record', compact('costs','fdate','tdate'));
    }

    public function search_record(Request $request){
        //if($request->input('submit')){
            $fdate = $request->fdate;
            $tdate = $request->tdate;
        //return $fdate;

            $costs = Cost::groupBy('date')->selectRaw('SUM(qty *price) as total,date')->get();
            return view('cost.record', compact('costs','fdate','tdate'));
        //}
        
        //$costs = Cost::groupBy('date')->selectRaw('SUM(qty *price) as total,date')->get();
        //return view('cost.record', compact('costs'));
    }

    public function detail($date){
        $costs = DB::select("select * from costs where date = '$date'");
        return view('cost.detail', compact('costs'));
    }
    public function print($date){
        $costs = DB::select("select * from costs where date = '$date'");
        return view('cost.detail', compact('costs'));
    }
}
