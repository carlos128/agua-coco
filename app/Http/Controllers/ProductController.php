<?php
namespace App\Http\Controllers;

use App\Models\Product;
Use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Carbon\carbon;

class ProductController extends Controller{


	public  function  insert( Request $request){
		
		$product = new Product;
		$date= Carbon::now();

		$fields = [
			'nameProduct'=> 'required',
			'desProduct'=> 'required',
			'priceProduc'=>'required',
			'imageProduc'=>'required'
		];

		$data=[
			"mesagge"=>"producto actulizado  con exito"
		];
		$valid=$this->validate($request,$fields);
		
		try{
			
			
			$product->idProduct=strtoupper(uniqid());
			$product->nameProduct=$request->input("nameProduct");
			$product->desProduct=$request->input("desProduct");	
			$product->priceProduc=$request->input("priceProduc");	
			$product->imageProduc=$request->input("imageProduc");
			$product->active=1;
			$product->crateBy=$request->input('userName');
			$product->createDt=$date;
			$product->updateBy="";
			$product->save();

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
		$id=$request->input("idProduct");
		
		try{
			$data = Product::find( $id);
			
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
		
			$data=Product::all();
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
		
		$date=Carbon::now();
		$fields = [
			'nameProduct'=> 'required',
			'desProduct'=> 'required',
			'priceProduc'=>'required',
			'imageProduc'=>'required'
		];

		$data=[
			"mesagge"=>"producto actulizado  con exito"
		];
		$valid=$this->validate($request,$fields);
		
		try{
			
			$product->nameProduct=$request->input("nameProduct");
			$product->desProduct=$request->input("desProduct");	
			$product->priceProduc=$request->input("priceProduc");	
			$product->imageProduc=$request->input("imageProduc");
			$product->active=1;
			$product->updateBy=$request->input('userName');
			$product->updateDt=$date;
			$product->save();

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
			$product = new Product;
			$product->find($id);
			$product = Product::where('idProduct',$id);
			$product->delete();

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