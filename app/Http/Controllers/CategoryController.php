<?php
namespace App\Http\Controllers;

use App\Models\Category;
Use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Carbon\Carbon;

class CategoryController extends Controller{


	public  function  insert( Request $request){
		
		$category = new Category;
		$date= Carbon::now();

		$fields = [
			'nameCategory'=> 'required',
			'descCategory'=> 'required',
			
			
		];

		$data=[
			"mesagge"=>"categoria actulizado  con exito"
		];
		$valid=$this->validate($request,$fields);
		
		try{
			
			$category->idcategory=strtoupper(uniqid());
			$category->namecategory=$request->input("nameCategory");
			$category->desccategory=$request->input("descCategory");	
			$category->active=1;
			$category->crateby=$request->input('userName');
			$category->createdt=$date;
			$category->updateby="";
			$category->save();

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
	public  function onSelect($id){
		
		
		try{
			$data = Category::find( $id);
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
		
			$data=Category::all();
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
			'nameCategory'=> 'required',
			'descCategory'=> 'required',
			'fk_id_product_category'=>'required'
			
		];
		$data=[
			"mesagge"=>"categoria actulizado  con exito"
		];
		$valid=$this->validate($request,$fields);
		
		try{
			
			$category->idcategory=strtoupper(uniqid());
			$category->namecategory=$request->input("nameCategory");
			$category->desccategory=$request->input("descCategory");	
			$category->fk_id_product_category=$request->input("fk_id_product_category");
			$category->active=1;
			$category->updateby=$request->input('userName');
			$category->updatedt=$date;
			$category->save();

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
			$$category = new Category;
			$category->find($id);
			$category = Category::where('idcategory',$id);
			$category->delete();

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