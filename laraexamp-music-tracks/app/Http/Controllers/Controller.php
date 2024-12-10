<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

abstract class Controller
{
    //
    public function index(){
        return view('search');
    }
    
    public function search(Request $request){
        // получить данные из поля ввода
        $searchTerm = $request->input('search');
 
        // получить все столбцы и искать в них ключевое слово через foreach()
        $columns = ['sound_name', 'source'];
         $query = DB::table('sounds');
         
         foreach($columns as $column){
            $query->orWhere($column, 'LIKE', '%'. $searchTerm . '%');
         }
         // получить результат запроса
         $searchData = $query->get();
         //dump($searchData);
         //die();
          return view('search', ['searchData' => $searchData]);
     }
}
