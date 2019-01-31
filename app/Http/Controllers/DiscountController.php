<?php
namespace App\Http\Controllers;

use App\Models\Discount;
Use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Carbon\Carbon;

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
			
			$discount->iddiscount=strtoupper(uniqid());
			$discount->datestart=$request->input("dateStart");
			$discount->dateend=$request->input("dateEnd");	
			$discount->fk_id_product_discount=$request->input("fk_id_product_discount");	
			$discount->active=1;
			$discount->crateby=$request->input('userName');
			$discount->createdt=$date;
			$discount->updateby="";
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
		$id=$request->input("iddiscount");
		
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
			
			$discount->iddiscount=strtoupper(uniqid());
			$discount->datestart=$request->input("dateStart");
			$discount->dateend=$request->input("dateEnd");	
			$discount->fk_id_product_discount=$request->input("fk_id_product_discount");	
			$discount->active=1;
			$discount->updateby=$request->input('userName');
			$discount->updatedt=$date;
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
			$discount = Discount::where('iddiscount',$id);
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