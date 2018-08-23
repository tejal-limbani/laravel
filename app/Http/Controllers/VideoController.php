<?php

namespace App\Http\Controllers;

use Log;
use App\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $videos = Video::orderBy('id','DESC')->paginate(5);
        return view('video.index',compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('video.create');
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
        $this->validate($request, [
            'video_title' => 'required',
            'video_url' => 'required',
        ]);

        Video::create($request->all());
        return redirect()->route('video.index')->with('success','Video created successfully');
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
        $video = Video::find($id);
        return view('video.show',compact('video'));
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
        $video = Video::find($id);
        return view('video.edit',compact('video'));
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
        $this->validate($request, [
            'video_title' => 'required',
            'video_url' => 'required',
        ]);

        Video::find($id)->update($request->all());
        return redirect()->route('video.index')->with('success','Video updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video =Video::where('id',$id)->first();

        if ($video != null) {
            Log::info('Delete');
            $video->delete();
            Log::info($video->delete());
            return redirect()->route('video.index')->with(['message'=> 'Video deleted successfully']);
        }
    
        return redirect()->route('video.index')->with(['message'=> 'Wrong ID!!']);
        //
        // Log::info('Delete');
        // Video::find($id)->delete();
        // Log::info(Video::find($id)->delete());
        // return redirect()->route('video.index')->with('success','Video deleted successfully');
    }
}
