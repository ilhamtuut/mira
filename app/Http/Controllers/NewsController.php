<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $data = News::orderBy('title')->paginate(20);
        return view('backend.news.index', compact('data'));
    }

    public function add(Request $request)
    {
        return view('backend.news.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "title" => "required",
            "content" => "required",
            "image" => "required|image|mimes:jpeg,png,jpg|max:2048",
        ]);

        if(!is_null($request->image) && $request->hasFile('image')) {
            $file       = $request->file('image');
            $filename    = time().'.'.$file->getClientOriginalExtension();
            $extention = $file->getClientOriginalExtension();
            $mimesType = $file->getMimeType();
            $size = $file->getSize();
            $path = public_path('images/news/');
            $file->move($path,$filename);
            $slug = Str::slug($request->title, '-');
            News::create([
            	'title' => $request->title,
            	'slug' => $slug,
            	'content'=> $request->content,
                'image' => $filename
            ]);
            $request->session()->flash('success', 'Successfully, Add Data News');
        }else{
            $request->session()->flash('failed', 'Failed, add News');
        }
        return redirect()->route('news.index');
    }

    public function edit(Request $request,$id)
    {
        $data = News::find($id);
        return view('backend.news.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "title" => "required",
            "content" => "required",
            "image" => "nullable|image|mimes:jpeg,png,jpg|max:2048",
        ]);

        $data = News::find($id);
        $slug = Str::slug($request->title, '-');
        $dataUpdate = array(
            'title' => $request->title,
        	'slug' => $slug,
            'content' => $request->content,
        );
        if(!is_null($request->image) && $request->hasFile('image')) {
            $img = public_path('images/news/'.$data->image);
            if($data->image && file_exists($img)){ 
                unlink($img);
            } 
            $file       = $request->file('image');
            $filename    = time().'.'.$file->getClientOriginalExtension();
            $extention = $file->getClientOriginalExtension();
            $mimesType = $file->getMimeType();
            $size = $file->getSize();
            $path = public_path('images/news/');
            $file->move($path,$filename);
            $dataUpdate = array(
                'title' => $request->title,
            	'slug' => $slug,
            	'content' => $request->content,
                'image' => $filename
            );
        }
        $data->update($dataUpdate);
        $request->session()->flash('success', 'Successfully, Update Data News');
        return redirect()->route('news.index');
    }

    public function delete(Request $request, $id)
    {
        $data = News::find($id);
        if($data->image && !empty($data->image) && !is_null($data->image)){
            $img = public_path('images/news/'.$data->image);
            if(file_exists($img)){ 
                unlink($img);
            } 
        }
        $data->delete();
        $request->session()->flash('success', 'Successfully, Delete Data News');
        return redirect()->back();
    }
}
