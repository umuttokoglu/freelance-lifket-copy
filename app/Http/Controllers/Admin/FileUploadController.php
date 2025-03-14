<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    public function process(Request $request): array
    {
        $paths = [];
dd($request->file('image'));
        if ($request->file('image')) {
            foreach ($request->file('image') as $file) {
                $paths[] = $file->store('tmp', 'public');
            }
        }

        return $paths;
    }

    public function revert(Request $request): void
    {
        Storage::disk('public')->delete($request->getContent());
    }
}
