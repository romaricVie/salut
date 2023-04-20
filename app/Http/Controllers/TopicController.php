<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;

class TopicController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // ->orderBy('start_at','DESC')
        $topics = Topic::latest()->get();
        return view('forums.index')->with('topics',$topics);
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

         $request->validate([
        'title' => ['required','string','max:100'],
        'content' =>  ['required','string','min:3'],
         'user_id' => ['exists:users,id'],
      ]);


    Topic::create([
        'title' => $request->title,
        'content' =>$request->content,
        'user_id' => auth()->user()->id,
    ]);

    return redirect()->back()->with('success','Sujet de discussion crée avec succès!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic)
    {
        //

        return view('forums.show')->with('topic',$topic);

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
    public function destroy(Topic $topic)
    {
        //
         $topic->delete();
        return redirect()->route('forum.index')->with('success','Sujet supprimé avec succès!');
    }
}
