<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Bid;
use Illuminate\Support\Facades\DB;

class BidsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $title = 'Ongoing Bids';

    public function index()
    {
        $title = $this->title;
        $bids = DB::table('bids')->orderBy('id', 'desc')->get();
        return view('bids.index', compact('title','bids'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $bids = Bid::all();
        $title = $this->title;
        return view('bids.create', compact('title', 'bids', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'date' => 'required|date',
            'value' => 'required|integer',
            'status' => 'required|string|max:50',
            'user_id' => 'required', // Probleem net als bij products, hij corespondeerd niet meer
        ]);

        $bid = Bid::create($request->all()); // Fout user_id heeft geen default value, is voorlopig niet erg.
        //$product->save();
        compact('bid');
        $request->session()->flash('alert-dark', 'Bid was successful added!');
        return redirect('/bids');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = $this->title;
        $bid = Bid::find($id);
        return view('bids.show', compact('bid', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bid = Bid::find($id);
        return view('bids.edit', compact('bid'));
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


        $bid = Bid::findOrFail($id);

        if ($bid) {
            $bid->date = $request->input('date');
            $bid->value = $request->input('value');
            $bid->status = $request->input('status');
            $bid->user_id = $request->input('offered_by');
        }

        $bid->save();

        compact('bid');
        $request->session()->flash('alert-dark', 'Bid was successful updated!');
        return redirect('/bids');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $bid = Bid::find($id);
        if($bid) {
            $bid->delete();
        }
        $request->session()->flash('alert-danger', 'Bid was successful deleted!');
        return redirect('/bids');
    }
}
