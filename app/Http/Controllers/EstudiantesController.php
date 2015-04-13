<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Response;
use Estudiante;
use DB;
use Validator;
use Input;
use Session;
use Redirect;

class EstudiantesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$estudiantes = Estudiante::all();

		//return Response::json(array('estudiantes' => $estudiantes));
		return view('index')->with('estudiantes', $estudiantes);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
            'nombre'       => 'required',
            'correo'      => 'required|email',
            'nivel' => 'required|numeric'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('nerds/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $estudiante = new Estudiante;
            $estudiante->nombre       = Input::get('nombre');
            $estudiante->correo      = Input::get('correo');
            $estudiante->nivel = Input::get('nivel');
            $estudiante->save();

            // redirect
            Session::flash('message', 'Estudiante creado');
            return Redirect::to('estudiantes');
        }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$estudiante = Estudiante::find($id);

        // show the view and pass the nerd to it
        return view('view')
            ->with('estudiante', $estudiante);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$estudiante = Estudiante::find($id);

        // show the edit form and pass the nerd
        return view('edit')
            ->with('estudiante', $estudiante);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = array(
            'nombre'       => 'required',
            'correo'      => 'required|email',
            'nivel' => 'required|numeric'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('nerds/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $estudiante = Estudiante::find($id);
            $estudiante->nombre       = Input::get('nombre');
            $estudiante->correo      = Input::get('correo');
            $estudiante->nivel = Input::get('nivel');
            $estudiante->save();

            // redirect
            Session::flash('message', 'Estudiante actualizado');
            return Redirect::to('estudiantes');
        }
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
