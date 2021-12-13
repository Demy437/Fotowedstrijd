<?php
  
namespace App\Http\Controllers;
   
use App\Models\Video;
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
        $videos = Video::latest()->paginate(5);
    
        return view('videos.index',compact('videos'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('videos.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'link' => 'required',
            'description' => 'required',
        ]);
    
        video::create($request->all());
     
        return redirect()->route('videos.index')
                        ->with('success','Video created successfully.');
    }
     
    /**
     * Display the specified resource.
     *
     * @param  \App\video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        return view('videos.show',compact('video'));
    } 
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        return view('videos.edit',compact('video'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        $request->validate([
            'link' => 'required',
            'description' => 'required',
        ]);
    
        $video->update($request->all());
    
        return redirect()->route('videos.index')
                        ->with('success','Video updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        $video->delete();
    
        return redirect()->route('videos.index')
                        ->with('success','video deleted successfully');
    }
}