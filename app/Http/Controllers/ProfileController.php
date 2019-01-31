<?php
namespace App\Http\Controllers;

use App\Models\Profile;
Use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Carbon\carbon;

class ProfileController extends Controller{


	public  function  insert( Request $request){
		
		$profile= new Profile;
		$date= Carbon::now();

		$fields = [
			'firstName'=> 'required',
			'lastName'=> 'required',
			'identification'=>'required',
			'fk_id_users_profile'=>'required'
		];
		$data=[
			"mesagge"=>"Perfil actulizado  con exito"
		];
		$valid=$this->validate($request,$fields);
		
		try{
			
			
			$profile->idProfile=strtoupper(uniqid());
			$profile->firstName=$request->input("firstName");
			$profile->lastName=$request->input("lastName");	
			$profile->identification=$request->input("identification");	
			$profile->fk_id_users_profile=$request->input("fk_id_users_profile");	
			$profile->active=1;
			$profile->crateBy=$request->input('userName');
			$profile->createDt=$date;
			$profile->updateBy="";
			$profile->save();

			return response()->json(
				$data,
				'200',
				['Content-type'=>'application/json; charset=utf8'],
				JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT
			);

		}catch( Exception $e ){
			return response()->json(
				$data,
				'200',
				['Content-type'=>'application/json; charset=utf8'],
				JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT
			);
		}

	}/* fin  funcion  signUp*/

	/* Obtine un usuario */
	public  function onSelect(Request $request){
		$id=$request->input("fk_id_users_profile");
		
		try{
			$data = Profile::find( $id);
			
			return response()->json(
				$data,
				'200',
				['Content-type'=>'application/json; charset=utf8'],
				JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT
			);
		}catch( Exception  $e){
			return $e;
		}

	}/** fin funcion onSelect  */

	/** funcion que atulisa un update */
	public  function  update( Request $request,$id){
		
		$date=Carbon::now();
		$fields = [
			'firstName'=> 'required',
			'lastName'=> 'required',
			'identification'=>'required',

		];
		$data=[
			"mesagge"=>"Perfil actulizado  con exito"
		];
		$valid=$this->validate($request,$fields);
		
		try{
			
			$profile = Profile::find($id);
			$profile->firstName=$request->input("firstName");
			$profile->lastName=$request->input("lastName");	
			$profile->identification=$request->input("identification");	
			$profile->active=1;
			$profile->updateBy=$request->input('userName');
			$profile->updateDt=$date;
			$profile->save();

			return response()->json(
				$data,
				'201',
				['Content-type'=>'application/json; charset=utf8'],
				JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT
			);

		}catch( Exception  $e){
			return $e;
		}
		
	}/** fin  funcion  update  */

	/**  funcion que elimina un usuario  */
	public  function  delete($id){

		$data=[
			'mensage:'=>"EL  registro  fue eliminado",
			'status_code:'=>"200"
		];
		try{
			$profile = new Profile;
			$profile->find($id);
			$profile = Profile::where('idProfile',$id);
			$profile->delete();

			return response()->json(
				$data,
				'200',
				['Content-type'=>'application/json; charset=utf8'],
				JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT
			);

		}catch( Exception  $e ){
			return $e;
		}

	}/**  fin funcion  delete */

	}