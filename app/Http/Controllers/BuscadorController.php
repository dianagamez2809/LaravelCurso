<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Input;
use DB;
use Response;

class BuscadorController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		return view('buscar');
	}

	public function jtableFunctions($action){
		switch ($action) 
		{
			case 'list':
				$nombre	= 	Input::get('nombre');
				$correo		= 	Input::get('correo');
				$rows = DB::table('estudiantes')->count();
				$data = DB::table('estudiantes');
				if($nombre != ''){
					$data->where('nombre', 'LIKE', $nombre . '%');
				}
				if($correo != ''){
					$data->where('correo', 'LIKE', $correo . '%');
				}
				if(Input::get("jtSorting"))
				{
					$search = explode(" ", Input::get("jtSorting"));
					$result = $data->skip(Input::get("jtStartIndex"))
						->take(Input::get("jtPageSize"))
						->orderBy($search[0], $search[1])
						->select('id', 'nombre', 'correo')
						->get();
				}
				else
				{
					$result = $data->skip(Input::get("jtStartIndex"))
						->take(Input::get("jtPageSize"))
						->select('id', 'nombre', 'correo')
						->get();
				}
				return Response::json(
					array(
						"Result"			=>		"OK",
						"TotalRecordCount"	=>		$rows,
						"Records"			=>		$result,
						//"Usuario" 			=>		$usuario
					)
				);
				break;
		}
	}

	

}
