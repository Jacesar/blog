<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class CursoController extends Controller
{
    public function index(){

        $cursos = Curso::orderBy('id','desc')->paginate();
        
        return view('cursos.index',compact('cursos'));
    }

    public function create(){
        return view('cursos.create');
    }
    
    public function store(Request $request){
        $curso = new Curso();
        //return $request->all();
        $curso->name = $request->name;
        $curso->descripcion = $request->descripcion;
        $curso->categoria = $request->categoria;
        //return $curso;
        $curso->save();

        // redirecciona al curso que se creo , 
        //laravel toma esa iniciativa por deduccion
        return redirect()->route('cursos.show',$curso);
    }


    public function show($id){
        $curso = Curso::find($id);
        return view('cursos.show' , compact('curso'));
    }

    public function edit(Curso $curso){
        
        // $curso = Curso::find($id); // Esto es cuando solo se pone edit($id) en function
        // ahora eso se hace en un paso solo 
        
        return view('cursos.edit',compact('curso'));
    }

    public function update(Request $request , Curso $curso){
        
        $curso->name = $request->name;
        $curso->descripcion = $request->descripcion;
        $curso->categoria = $request->categoria;
        
        $curso->save();

        return redirect()->route('cursos.show',$curso);
        
        //return $request;
        //return view('cursos.edit',compact('curso'));
    }
}
