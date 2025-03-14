<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    // Dosyayı geçici alana yükler
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // Dosyayı 'temp' klasörüne kaydediyoruz (storage/app/public/temp)
        $path = $request->file('file')->store('temp', 'public');

        // Basitçe dosya adını döndürüyoruz (örneğin "temp/abc123.jpg")
        return response()->json([
            'success' => true,
            'temp_file' => $path
        ]);
    }

    // Geçici alandan dosya silme işlemi
    public function delete(Request $request)
    {
        $request->validate([
            'file_name' => 'required|string'
        ]);

        $fileName = $request->input('file_name');
        if(Storage::disk('public')->exists($fileName)){
            Storage::disk('public')->delete($fileName);
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Dosya bulunamadı.'], 404);
    }
}
