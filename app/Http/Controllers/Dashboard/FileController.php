<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\File;
use App\Models\Category;
use App\Models\FileHistory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    //

    public function index()
    {
        $files = File::with('category')->get(); // Fetch files from the database
        return view('dashboard.pages.fileList', compact('files')); // Ensure this points to the correct view
    }

    public function createPage()
    {
        $categories = Category::all(); // Fetch categories from the database

        return view('dashboard.pages.fileUploadPage', compact('categories')); // Ensure this points to the correct view
    }


    public function upload(Request $request)
    {

        if($request->file('file')) {
            $this->uploadHelper($request->file('file'), $request);
        }

        return redirect()->route('dashboard.files')->with('success', 'File uploaded successfully!');

    }




    public function download($id)
    {
        $file = File::findOrFail($id); // Find the file by ID

        if(!Storage::disk('public')->exists($file->path)) {
            return redirect()->back()->with('error', 'File not found.');
        }else{

            $this->addFileHistory($file, 'downloaded');

            return Storage::disk('public')->download($file->path);
        }

    }

    public function delete($id)
    {
        $file = File::findOrFail($id); // Find the file by ID

        if(Storage::disk('public')->exists($file->path)) {
            Storage::disk('public')->delete($file->path); // Delete the file from storage
        }

        $file->delete(); // Delete the file record from the database

        $this->addFileHistory($file, 'deleted');

        return redirect()->route('dashboard.files')->with('success', 'File deleted successfully!');
    }


    // ----------- Private funs

    private function uploadHelper($file, $request)
    {

        $request->validate([
            'file' => 'required|file',
        ]);

        $path = $this->getFileTypePath($file);

        $fileName = time() . '_' . $file->getClientOriginalName();
        $fileName = str_replace(' ', '_', $fileName);
        $file->storeAs($path, $fileName, 'public'); // Store the file


        $file = File::create([
            'name' => $request->name ??$fileName,
            'category_id' => $request->category_id,
            'path' => $path . $fileName,
            'size' => $file->getSize(),
            'user_id' => Auth::id(),
            'extension' => $file->getClientOriginalExtension(),
            'description' => $request->description ?? null,
            'type' => $file->getClientMimeType(),
            'status' => 1,
        ]);

        $this->addFileHistory($file, 'uploaded');

        return $file;

    }


    private function getFileTypePath($file){

        $extension = strtolower($file->getClientOriginalExtension());

        // Define the folder structure based on file extensions
        $extFolders = [
            'jpg' => 'images',
            'jpeg' => 'images',
            'png' => 'images',
            'pdf' => 'pdfs',
            'mp4' => 'videos',
            'mp3' => 'audios',
            'xls' => 'excels',
            'xlsx' => 'excels',
            'doc' => 'words',
            'docx' => 'words',
            'txt' => 'texts',
        ];

        $folder = $extFolders[$extension] ?? 'others';

        return $path = "uploads/$folder/";

    }


    private function addFileHistory($file, $action)
    {

        FileHistory::create([
            'file_id' => $file->id,
            'action' => $action,
            'user_id' => auth()->id(),
            'type' => $file->type,
            'path' => $file->path,
            'qr_code' => null, // Handle QR code generation if needed
        ]);
    }

}