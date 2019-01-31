<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
Use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Carbon\Carbon;


class UserController extends Controller{

	public  function  signUp( Request $request){
		
		$user= new User();
		$date=Carbon::now();

		 $fields = [
			'userName'=> 'required',
			'userPassword'=> 'required'
		];
		$data=[
			"mesagge"=>"usuario registrado con exito"
		];
		$valid=$this->validate($request,$fields);
		
		try{
			
			$pass=Hash::make($request->input('userPassword'));
			$user->iduser=strtoupper(uniqid());
			$user->username= $request->input('userName');
			$user->userpassword=$pass;
			$user->islogin=1;
			$user->active=1;
			$user->crateby=$request->input('userName');
			$user->createdt=$date;
			$user->updateby="";
			$user->save();

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
		$id=$request->input("idUser");
		
		try{
			$data = User::find( $id);
			
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
		$data=[
			'mensage:'=>"Registro  fue  actualizado",
			'status_code:'=>"201"
		];
		$fields = [
			'userName'=> 'required',
			'userPassword'=> 'required'
		];
		$valid=$this->validate($request,$fields);
		
		try{
			
			$user = User::find($id);
			$pass=Hash::make($request->input('userPassword'));
			$user->idUser=$id;
			$user->userName= $request->input('userName');
			$user->userPassword=$pass;
			$user->isLogin=1;
			$user->active=1;
			$user->updateBy=$request->input('userName');
			$user->updateDt=$date;
			$user->save();

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
			$user = new User;
			$user->find($id);
			$users = User::where('idUser',$id);
			$users->delete();

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