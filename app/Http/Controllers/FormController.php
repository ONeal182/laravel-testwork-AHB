<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use App\Http\Requests\FileRequest;
use Illuminate\Support\Facades\Auth;


class FormController extends Controller
{
    public function index()
    {

        $success = session('success');
        if($success !==''){
            session()->forget('success');
        }
        
        return view('form', compact('success'));
    }

    public function store(FileRequest $request)
    {
        // dd($request);
        $id =  Auth::user()->id;


        if ($request->has('file')) {

            $path = $request->file('file')->store('csv');
            $content = $request->file('file')->getContent();
            $params['name'] = $request->file('file')->getClientOriginalName();
            $params['user_id'] = $id;
            $params['file'] = $path;
            $params['type'] = $request->file('file')->getClientOriginalExtension();
        }
        
        try {
            $query = File::create($params);
            $className = 'App\Utilities\ImportProduct\\' . ucfirst($params['type']) . 'Import';
            $items = (new $className);
            $parse = $items->parse($params['file']);
            $insert = $items->insertDb($parse);
            if ($query->exists) {
                session(['success' => 'Файл успешно загружен, перейдите в ваш личный кабинет. Колличество новых товаров '.$insert['create'].' колличество обновлённыйх '.$insert['update'].'']);
            }
            
    
            return redirect('/form');
            
        } catch (\Exception $e) {
            dd($e);
            abort(404, "Формат {$params['type']} не поддерживается");
        }
        
    }
}
