<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Pelicula;
 
class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $peliculas=Pelicula::orderBy('id','DESC')->paginate(3);
        return view('dashboard.Pelicula.index',compact('peliculas'));
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.Pelicula.create');
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
        $this->validate($request,[ 'nombre'=>'required', 'resumen'=>'required', 'director'=>'required', 'duracion'=>'required', 'genero'=>'required']);
        Pelicula::create($request->all());
        return redirect()->route('pelicula.index')->with('success','Pelicula registrada correctamente');
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $peliculas=Pelicula::find($id);
        return  view('dashboard.pelicula.show',compact('peliculas'));
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
        $pelicula=Pelicula::find($id);
        return view('dashboard.pelicula.edit',compact('pelicula'));
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)    {
        //
        $this->validate($request,[ 'nombre'=>'required', 'resumen'=>'required','director'=>'required', 'duracion'=>'required', 'genero'=>'required']);
 
        Pelicula::find($id)->update($request->all());
        return redirect()->route('pelicula.index')->with('success','Pelicula actualizada correctamente');
 
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
         Pelicula::find($id)->delete();
        return redirect()->route('pelicula.index')->with('success','Pelicula eliminada correctamente');
    }
}