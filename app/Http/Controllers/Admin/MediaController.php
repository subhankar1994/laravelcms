<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\Media;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medias = Media::all();
        return view('admin.media.show', compact('medias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.media.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('file');
        if($file){
            $media = new Media;
            $path = $request->file->store('public/media');
            $file_name = $request->file->getClientOriginalName();
            $file_extsn = $request->file->getClientOriginalExtension();
            $mime_type = $request->file->getClientMimeType();
            $media->path = $path;
            $media->title = str_replace($file_extsn, "", $file_name);
            $media->mime_type = $mime_type;
            $media->save();
        }
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
        $media = Media::find($id);
        return view('admin.media.edit', compact('media'));
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
        $this->validate($request, [
            'title' => 'required|string|max:255',

        ]);
        $media = Media::find($id);
        $media->title = $request->title;
        $media->save();
        return redirect(route('media.index'))->with('message', 'Page updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file_data = Media::find($id)->first();
        if(file_exists($file_data->path)){
            @unlink(public_path(), $file_data->path);
        }
        Media::where('id', $id)->delete();
        return redirect()->back()->with('message', 'Media deleted successfully!');
    }
}
