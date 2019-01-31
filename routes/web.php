<?php


$router->get('/', function () use ($router) {
	
});

$router->post( 'auth/login', [
	'uses' => 'AuthController@authenticate'
	]
);

$router->post( '/signup', [
	'uses' => 'UserController@signUp'
	]
);
//Rutas de acceso  usuario
$router->group(['prefix'=>'/v1/api/',
				'middleware' => 'jwt.auth'],function()  use ($router){

	
	 $router->get('usuario',[
		'uses'=>'UserController@onSelect'
	 ]);

	$router->put('usuario/{id}',[
		
		'uses'=>'UserController@update'
	]);

	$router->delete('usuario/{id}',[
		
		'uses'=>'UserController@delete'
	]);
});

//Rutas de acceso  usuario
$router->group(['prefix'=>'/v1/api/',
				'middleware' => 'jwt.auth'],function()  use ($router){

	$router->post('perfil',[
		'uses'=>'ProfileController@insert'
	 ]);

	$router->get('perfil',[
		'uses'=>'ProfileController@onSelect'
	 ]);

	$router->put('perfil/{id}',[
		
		'uses'=>'ProfileController@update'
	]);

	$router->delete('perfil/{id}',[
		
		'uses'=>'ProfileController@delete'
	]);
});

//Rutas de acceso  datos de facturacion
$router->group(['prefix'=>'/v1/api/',
				'middleware' => 'jwt.auth'],function()  use ($router){

	$router->post('datosFacturacion',[
		'uses'=>'BillinDataController@insert'
	 ]);

	$router->get('datosFacturacion/{id}',[
		'uses'=>'BillinDataController@onSelect'
	 ]);

	 $router->get('datosFacturacion',[
		'uses'=>'BillinDataController@allSelect'
	 ]);

	$router->put('datosFacturacion/{id}',[
		
		'uses'=>'BillinDataController@update'
	]);

	$router->delete('datosFacturacion/{id}',[
		
		'uses'=>'BillinDataController@delete'
	]);
});

//Rutas de productos
$router->group(['prefix'=>'/v1/api/'],function()  use ($router){
	$router->get( 'productos', [
		'uses' => 'ProductController@allSelect'
		]
	);

	$router->get( 'productos/{id}', [
		'uses' => 'ProductController@onSelect'
		]
	);
});

$router->group(['prefix'=>'/v1/api/','middleware' => 'jwt.auth'],function()  use ($router){
	$router->post('producto',[
		'uses'=>'ProductController@insert'
	 ]);

	$router->put( 'productos/{id}', [
		'uses' => 'ProductController@onSelect'
		]
	);

	$router->delete('productos/{id}',[
		
		'uses'=>'ProductController@delete'
	]);
});

//rutas categorias
$router->group(['prefix'=>'/v1/api/'],function()  use ($router){
	$router->get( 'categoria', [
		'uses' => 'CategoryController@allSelect'
		]
	);

	$router->get( 'categoria/{id}', [
		'uses' => 'CategoryController@onSelect'
		]
	);
});

$router->group(['prefix'=>'/v1/api/','middleware' => 'jwt.auth'],function()  use ($router){
	$router->post('categoria',[
		'uses'=>'CategoryController@insert'
	 ]);

	$router->put( 'categoria/{id}', [
		'uses' => 'CategoryController@update'
		]
	);

	$router->delete('categoria/{id}',[
		
		'uses'=>'CategoryController@delete'
	]);
});

 // detalle factura

 $router->group(['prefix'=>'/v1/api/'],function()  use ($router){
	$router->get( 'detalleFactura', [
		'uses' => 'SalesCheckController@allSelect'
		]
	);

	$router->get( 'detalleFactura/{id}', [
		'uses' => 'SalesCheckController@onSelect'
		]
	);
});

$router->group(['prefix'=>'/v1/api/','middleware' => 'jwt.auth'],function()  use ($router){
	$router->post('detalleFactura',[
		'uses'=>'SalesCheckController@insert'
	 ]);

	$router->put( 'detalleFactura/{id}', [
		'uses' => 'SalesCheckController@update'
		]
	);

	$router->delete('detalleFactura/{id}',[
		
		'uses'=>'SalesCheckController@delete'
	]);
});
 