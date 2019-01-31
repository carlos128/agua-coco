<?php
namespace App\Http\Controllers;

use App\Models\SalesCheck;
Use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Carbon\carbon;

class SalesCheckController extends Controller{


	public  function  insert( Request $request){
		
		$salesCheck = new SalesCheck;
		$date= Carbon::now();

		$fields = [
			'valuDiscount'=> 'required',
			'fk_id_product_sales'=> 'required',
			'fk_id_profile_sales'=>'required',
			'fk_id_bill_sales'=>'required'
			
		];

		$data=[
			"mesagge"=>"La factura fue actulizado  con exito"
		];
		$valid=$this->validate($request,$fields);
		
		try{
			
			$salesCheck->idSalesCheck=strtoupper(uniqid());
			$salesCheck->valuDiscount=$request->input("valuDiscount");
			$salesCheck->fk_id_product_sales=$request->input("fk_id_product_sales");	
            $salesCheck->fk_id_profile_sales=$request->input("fk_id_profile_sales");
            $salesCheck->fk_id_bill_sales=$request->input("fk_id_bill_sales");	
			$salesCheck->active=1;
			$salesCheck->crateBy=$request->input('userName');
			$salesCheck->createDt=$date;
			$salesCheck->save();

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
		$id=$request->input("idSalesCheck");
		
		try{
			$data = SalesCheck::find( $id);
			
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
		
		$salesCheck = new SalesCheck;
		$date= Carbon::now();
		$fields = [
			'valuDiscount'=> 'required',
			'fk_id_product_sales'=> 'required',
			'fk_id_profile_sales'=>'required',
			'fk_id_bill_sales'=>'required'
			
		];

		$data=[
            "mesagge"=>"La factura fue actulizado  con exito"
		];

		try{
			
	
			$salesCheck->fk_id_product_sales=$request->input("fk_id_product_sales");	
            $salesCheck->fk_id_profile_sales=$request->input("fk_id_profile_sales");
            $salesCheck->fk_id_bill_sales=$request->input("fk_id_bill_sales");
			$salesCheck->active=1;
			$salesCheck->save();

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
			$salesCheck = new SalesCheck;
			$salesCheck->find($id);
			$salesCheck = Discount::where('idSalesCheck',$id);
			$salesCheck->SalesCheck();

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