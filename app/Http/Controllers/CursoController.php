<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

use App\Http\Requests\StoreCurso;

class CursoController extends Controller
{
    public function index(){

        $cursos = Curso::orderBy('id','desc')->paginate();
        
        return view('cursos.index',compact('cursos'));
    }

    public function create(){
        return view('cursos.create');
    }
    
    public function store(StoreCurso $request){
        /*
        $curso = new Curso();
        $curso->name = $request->name;
        $curso->descripcion = $request->descripcion;
        $curso->categoria = $request->categoria;
       
        $curso->save();
        */
       
        $curso = Curso::create($request->all());
        //return $request->all();
        //return $curso;

        // redirecciona al curso que se creo , 
        //laravel toma esa iniciativa por deduccion
        return redirect()->route('cursos.show',$curso);
    }


    public function show(Curso $curso){
      
        return view('cursos.show' , compact('curso'));
    }

    public function edit(Curso $curso){
        
        // $curso = Curso::find($id); // Esto es cuando solo se pone edit($id) en function
        // ahora eso se hace en un paso solo 
        
        return view('cursos.edit',compact('curso'));
    }

    public function update(Request $request , Curso $curso){
        $request->validate([
            'name' => 'required',
            'descripcion' => 'required',
            'categoria' => 'required'
        ]);
        /*
        $curso->name = $request->name;
        $curso->descripcion = $request->descripcion;
        $curso->categoria = $request->categoria;
        $curso->save();
        */

        $curso->update($request->all());

        return redirect()->route('cursos.show',$curso);
        
        //return $request;
        //return view('cursos.edit',compact('curso'));
    }

    public function destroy(Curso $curso){
        $curso->delete();
        return redirect()->route('cursos.index');
    }
}
