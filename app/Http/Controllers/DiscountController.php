<?php
namespace App\Http\Controllers;

use App\Models\Discount;
Use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Carbon\carbon;

class DiscountController extends Controller{


	public  function  insert( Request $request){
		
		$discount = new Discount;
		$date= Carbon::now();

		$fields = [
			'valuDiscount'=> 'required',
			'dateStart'=> 'required',
			'dateEnd'=>'required',
			'fk_id_product_discount'=>'required'
			
		];

		$data=[
			"mesagge"=>"Los descuentos fueron actulizado  con exito"
		];
		$valid=$this->validate($request,$fields);
		
		try{
			
			$discount->idDiscount=strtoupper(uniqid());
			$discount->dateStart=$request->input("dateStart");
			$discount->dateEnd=$request->input("dateEnd");	
			$discount->fk_id_product_discount=$request->input("fk_id_product_discount");	
			$discount->active=1;
			$discount->crateBy=$request->input('userName');
			$discount->createDt=$date;
			$discount->updateBy="";
			$discount->save();

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
		$id=$request->input("idDiscount");
		
		try{
			$data = Discount::find( $id);
			
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

	/* Obtine un producto */
	public  function allSelect(){
	
		try{
		
			$data=Discount::all();
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

	/** funcion que  atuliza  un producto */
	public  function  update( Request $request,$id){
		
		$date= Carbon::now();
		$fields = [
			'valuDiscount'=> 'required',
			'dateStart'=> 'required',
			'dateEnd'=>'required',
			'fk_id_product_discount'=>'required'
			
		];
		$data=[
			"mesagge"=>"Los descuentos fueron actulizado  con exito"
		];
		$valid=$this->validate($request,$fields);

		try{
			
			$discount->idDiscount=strtoupper(uniqid());
			$discount->dateStart=$request->input("dateStart");
			$discount->dateEnd=$request->input("dateEnd");	
			$discount->fk_id_product_discount=$request->input("fk_id_product_discount");	
			$discount->active=1;
			$discount->updateBy=$request->input('userName');
			$discount->updateDt=$date;
			$discount->save();

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

	/**  funcion que elimina un producto  */
	public  function  delete($id){

		$data=[
			'mensage:'=>"EL  registro  fue eliminado",
			'status_code:'=>"200"
		];
		try{
			$discount = new Discount;
			$discount->find($id);
			$discount = Discount::where('idProduct',$id);
			$discount->delete();

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