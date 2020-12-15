<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//use Illuminate\Support\Facades\URL;


Route::get('/', function () {
    return view('welcome');
});

//  Auth::routes();

//  Route::get('/home', 'HomeController@index')->name('home');

// //Create
// Route::get('insert', function () {
//     DB::insert('insert into categories (name, description) values (?, ?)', ['PHP', 'Personal Home Page']);
// });

// //Read
// Route::get('select',function(){
// 	$results = DB::table('categories')->distinct()->get();
// 	return $results;
// });

// //Update
// Route::get('update',function(){
// 	$results = DB::update('update categories set description="Hypertext Preprossor" where id = ?', [1]);

// });

// //Delete
// Route::get('delete',function(){
// 	DB::delete('delete from categories where id=1');
// });
use App\Post;
use App\Cat;

//Category
Auth::routes();
Route::get('category', 'CategoryController@index')->name('category');
Route::get('category/create', 'CategoryController@create');
Route::post('category', 'CategoryController@store');
Route::get('category/{id}/edit', 'CategoryController@edit');
Route::post('category/{id}/update', 'CategoryController@update');
Route::get('category/{id}/destory', 'CategoryController@destory');


//Stuent
Route::get('student','StudentController@index');
Route::get('student/create',"StudentController@create");
Route::post('student','StudentController@store');
Route::get('student/{id}/edit','StudentController@edit');
Route::post('student/{id}/update','StudentController@update');
Route::get('student/{id}/destory','StudentController@destory');

Route::get('student/{id}/download','StudentController@download');


//aritcle
Route::get('article','ArticleController@index');
Route::get('article/create',"ArticleController@create");
Route::post('article','ArticleController@store');
Route::get('article/{id}/edit','ArticleController@edit');
Route::post('article/{id}/update','ArticleController@update');
Route::get('article/{id}/destory','ArticleController@destory');

//cost
Route::get('cost','CostController@index');
Route::get('cost/create','CostController@create');
Route::post('cost','CostController@store');
Route::get('cost/{id}/edit','CostController@edit');
Route::post('cost/{id}/update','CostController@update');
Route::get('cost/{id}/destory','CostController@destroy');
Route::get('cost/record','CostController@record');
Route::get('cost/{date}/detail','CostController@detail');
Route::get('cost/{date}/print','CostController@print');
Route::post('cost/record/search','CostController@search_record');

//Multiple image
Route::get('form','FormController@create');
Route::post('form','FormController@store');


//eloquent
Route::get('eloquent','CatController@index');
Route::get('eloquent/cat','CatController@cat_create');
Route::post('eloquent','CatController@store');

//admin
Route::get('eloquent/admin',function(){
	return view('eloquent/admin');
}
);
Route::get('eloquent/admin/category','CatController@index');
Route::get('eloquent/admin/add_category','CatController@cat_create');
Route::post('eloquent/admin/category','CatController@store');
Route::get('eloquent/admin/{id}/edit','CatController@edit');
Route::post('eloquent/admin/{id}/update','CatController@update');
Route::get('eloquent/admin/{id}/destory','CatController@destory');

Route::get('eloquent/admin/post','PostController@index');
Route::get('eloquent/admin/add_post','PostController@post_create');
Route::post('eloquent/admin/post','PostController@store');
Route::get('eloquent/admin/{id}/p_edit','PostController@edit');
Route::post('eloquent/admin/{id}/p_update','PostController@update');



use App\Book;
use App\Author;
use App\City;
use App\Stuff;
use App\Role;
//one to many
Route::get('author/{id}/book',function($id){
	$author = Author::find($id);
	//echo $author->name;
	foreach ($author->books as $book) {
		echo $book->name;
		echo "<br>";
	}
});
//one to one
Route::get('author/{id}/city',function($id){
	$author = Author::find($id);
	echo $author->name."<br>";
	echo $author->city->name;

});

//many to many
Route::get('stuff/{id}/role',function($id){
	$stuff = Stuff::find($id);
	foreach ($stuff->role as $role) {
		echo $role->rank."<br>";
	}
});

Route::get('role/{id}/stuff',function($id){
	$role = Role::find($id);
	foreach ($role->stuffs as $stuff) {
		echo $stuff->name."<br>";
	}
		
});

//has many through
use App\Town;
Route::get('town/{id}/post',function($id){
	$town = Town::find($id);
	//echo $town->name;
	foreach($town->blogs as $blog){
		echo $blog->title."<br>";
	}
});

//sendemail
Route::get('sendemail','MailController@index');
Route::post('sendemail/send','MailController@send');

Route::get('send','MailController@basic_email');

//adminlte
Route::get('admin', function () {
    return view('admin_template');
});
Route::get('test', 'TestController@index');

//paginate employee
Route::get('/employees','EmployeesController@index');
Route::get('/employees/getEmployees/','EmployeesController@getEmployees')->name('employees.getEmployees');

//paginate
Route::get('paginate/pagination', 'PaginationController@index');
Route::get('paginate/pagination/fetch_data', 'PaginationController@fetch_data');

//sweet alert
Route::get('my-notification/{type}', 'HomeController@myNotification');

//drag and drop
Route::get('/','UsersController@index');
Route::post('/users/fileupload/','UsersController@fileupload')->name('users.fileupload');

//excel
Route::get('import-export-view', 'ExcelController@importExportView')->name('import.export.view');

Route::post('import-file', 'ExcelController@importFile')->name('import.file');
Route::get('export-file/{type}', 'ExcelController@exportFile')->name('export.file');

//larave ajax insert
Route::resource('/userData','UserDataController');

//ckeditor
Route::get('/ck',function(){
	return view('ckeditor');
});

//ckeditor image
Route::get('ckeditor', 'CkeditorController@index');
Route::post('ckeditor/upload', 'CkeditorController@upload')->name('ckeditor.upload');

//user status with ajax
Route::get('users', 'UserController@index');
Route::get('changeStatus', 'UserController@changeStatus');

//ajax crud
Route::resource('ajaxproducts','ProductAjaxController');

// detect desktop or mobile or tablet
Route::get('detect', function()
{
    $agent = new \Jenssegers\Agent\Agent;
   
    //$result = $agent->isDesktop();
    //$result = $agent->isMobile();
    //$result = $agent->isTablet();

    if($agent->isDesktop()){
    	$result = $agent->isDesktop();
    }elseif ($agent->isMobile()) {
    	$result = $agent->isMobile();
    }else{
    	$result = $agent->isTablet();
    }
    dd($result);
});



//follow and unfollow
Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

Route::get('users', 'HomeController@users')->name('users');
Route::get('user/{id}', 'HomeController@user')->name('user.view');
//Route::post('ajaxRequest', 'HomeController@ajaxRequest')->name('ajaxRequest');

//like and unlike
Route::get('/home', 'HomeController@index')->name('home');


Route::get('likes', 'LikeController@posts')->name('posts');
Route::post('ajaxRequest', 'LikeController@ajaxRequest')->name('ajaxRequest');

//chart
Route::get('chart-line', 'ChartController@chartLine');
Route::get('chart-line-ajax', 'ChartController@chartLineAjax');

//chatbot
Route::get('/chatbot', function () {
    return view('chatbot');
});
Route::match(['get', 'post'], '/botman', 'BotManController@handle');

//crop image
Route::get('image-crop', 'ImageController@imageCrop');
Route::post('image-crop', 'ImageController@imageCropPost');