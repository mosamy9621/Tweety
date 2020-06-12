<?php

namespace App\Http\Controllers;

use App\tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $tweets=auth()->user()->timeLine();
        return view('tweets.index',compact('tweets'));
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
        $validated_data=['user_id'=>auth()->user()->id]+$request->validate(['body'=>['required','max:255']]);
      //  dd($validated_data);
      $tweet=new tweet();
      $tweet->body=$validated_data['body'];
      $tweet->user_id=$validated_data['user_id'];
      $tweet->save();
        return redirect(route('home'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function show(tweet $tweet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function edit(tweet $tweet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tweet $tweet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function destroy(tweet $tweet)
    {
        //
    }

    public  function like(tweet $tweet){

        $tweet->like(auth()->user());
        return back();
    }

    public  function dislike(tweet $tweet){

        $tweet->dislike(auth()->user());
        return back();
    }
}
