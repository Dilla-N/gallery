<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\GalerImage;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index(){
        return view('buat-album');
    }
    public function delete(){
        $album = Album::all();
        
        return view('delete-album',['album' => $album]);
    }

    public function storealbum(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
        ]);
    
        $existingAlbum = Album::where('nama', $request->nama)
                              ->first();
    
        if ($existingAlbum) {
            return redirect()->back()->with('error', 'Album with the same name already exists.');
        }
    
        Album::create([
            'user_id' => auth()->id(),
            'nama' => $request->nama,
        ]);
        $query = GalerImage::where('user_id', auth()->id());
        $albums = Album::all(); // Fetch all albums
        $data['images'] = $query->paginate(2);
        return redirect()->action([HomeController::class, 'index'])->with(array_merge($data, ['albums' => $albums]))->with('success', 'Foto Berhasil di Tambahkan.');    }

        public function deletes($id)
        {
            $album = Album::where('id', $id)->first();
            $album = Album::find($id);
        
            if ($album) {
                $images = GalerImage::where('album', $id)->get();
        
                foreach ($images as $image) {
                    $image->delete();
                }
        
                $album->delete();
        
                return redirect()->action([HomeController::class, 'index'])->with('success', 'Album and associated photos have been deleted successfully.');
            } else {
                return redirect()->back()->with('error', 'Album not found.');
            }
        }
    }