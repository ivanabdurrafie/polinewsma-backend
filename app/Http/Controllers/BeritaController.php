<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;


class BeritaController  extends Controller{
    public function index()
    {
        return response()->json(Berita::all());
    }

    public function getNewsByTopic($id)
    {
        $news = Berita::where('topic',$id)->get();

        return response()->json($news);

    }

    public function getOneNews($id)
    {
        return response()->json(Berita::find($id));
    }
    
    public function createNews(Request $request)
    {
        $news = Berita::create($request->all());
        
        return response()->json($news,201);
    }

    public function updateNews(Request $request, $id){
        $news = Berita::findOrFail($id);
        $news->update($request->all());

        return response()->json($news,200);
    }

    public function deleteNews($id)
    {
        Berita::findOrFail($id)->delete();
        return response('Deleted Successfully',200);
    }
}