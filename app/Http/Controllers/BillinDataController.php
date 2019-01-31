<?php
namespace App\Http\Controllers;

use App\Models\BillinData;
Use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Carbon\carbon;

class BillinDataController extends Controller{


	public  function  insert( Request $request){
		
		$billinData= new BillinData;
		$date= Carbon::now();

		$fields = [
			'addrres'=> 'required',
			'phone'=> 'required',
			'country'=>'required',
			'city'=>'required',
			'fk_id_profile_billin'=>'required'
		];

		$data=[
			"mesagge"=>"Datos de facturacion  actulizado  con exito"
		];
		$valid=$this->validate($request,$fields);
		
		try{
			
			
			$billinData->idBillinData=strtoupper(uniqid());
			$billinData->addrres=$request->input("addrres");
			$billinData->phone=$request->input("phone");	
			$billinData->country=$request->input("country");	
			$billinData->city=$request->input("city");
			$billinData->fk_id_profile_billin=$request->input("fk_id_profile_billin");
			$billinData->active=1;
			$billinData->crateBy=$request->input('userName');
			$billinData->createDt=$date;
			$billinData->updateBy="";
			$billinData->save();

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
		$id=$request->input("idBillinData");
		
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

	/* Obtine un usuario */
	public  function allSelect(){
	
		try{
		
			$data=BillinData::all();
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
			'addrres'=> 'required',
			'phone'=> 'required',
			'country'=>'required',
			'city'=>'required',
			
		];

		$data=[
			"mesagge"=>"Perfil actulizado  con exito"
		];
		$valid=$this->validate($request,$fields);
		
		try{
			$billinData = BillinData::find($id);
			$billinData->addrres=$request->input("addrres");
			$billinData->phone=$request->input("phone");	
			$billinData->country=$request->input("country");	
			$billinData->city=$request->input("city");
			$billinData->active=1;
			$billinData->updateBy=$request->input('userName');
			$billinData->updateDt=$date;
			$billinData->save();

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
			$billinData = new BillinData;
			$billinData->find($id);
			$billinData = BillinData::where('idBillinData',$id);
			$billinData->delete();

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