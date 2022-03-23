<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;

class docController extends Controller
{
    //

    public function showDoc()
    {
        $show = Document::all();
        return view('client.document.index', ['shows' => $show]);
    }
    public function detailDoc($id)
    {

        $show = Document::find($id);
        return view('client.document.detail', ['show' => $show]);

    }
    public function deleteDoc($id)
    {

        $show = Document::find($id)->delete();
        return redirect()->route('showDoc');

    }
    public function editDoc($id)
    {

        $show = Document::find($id);
        return view('client.document.documentAdd');

    }
    public function accset($id)
    {

        $show = Document::find($id)->update(['action' => 2]);
        return redirect()->route('showDoc');

    }
    public function addlDoc()
    {
        return view('client.document.documentAdd');
    }
    public function storeAdd(Request $request)
    {
        if ($request->file) {
            $file = $request->file('file')->store('images');
        } else {
            $file = null;
        }
        if ($request->video) {
            $video = $request->file('video')->store('images');
        } else {
            $video = null;
        }
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'file' => $file,
            'video' => $video,
        ];
        Document::create($data);
        return redirect()->route('showDoc');

    }
}
