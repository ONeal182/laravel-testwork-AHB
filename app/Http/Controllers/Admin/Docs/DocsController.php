<?php

namespace App\Http\Controllers\Admin\Docs;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Utilities\ImportProduct\CsvImport;
use App\Utilities\ImportProduct\ImportContract;

class DocsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docs = Auth::user()->file()->get();
        
        foreach ($docs as $key => $doc) {
            $fileUrl = Storage::url($doc->file);
            $docs[$key]->path = $fileUrl;
        }

        return view('admin.docs.index', compact('docs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, File $files)
    {
        $file = $files::where('id', $id)->get()->first();
        // dd( 'App\Utilities\ImportProduct\\' . ucfirst($file->type) . 'Import');
        try {
            $className = 'App\Utilities\ImportProduct\\' . ucfirst($file->type) . 'Import';
            $items = (new $className)->parse($file->file, true);
            return view('admin.docs.show', compact('items'));
            
        } catch (\Exception $e) {
            abort(404, "Формат {$file->type} не поддерживается");
        }
        
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
