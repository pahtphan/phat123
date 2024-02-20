<?php 
use Cocur\Slugify\Slugify;
session_start();

require 'vendor/autoload.php';
$router = new AltoRouter();
$slugify = new Slugify();

// import config && connectDB
require 'config.php';
require ABSPATH . 'connectDB.php';

// import models
require ABSPATH . 'bootstrap.php';


// import controller
require ABSPATH_SITE . 'load.php';
// Trang chủ
// Tham số cuối cùng là tên route
$router->map( 'GET', '/', ['HomeController','index'],'home');

// Trang chính sản phẩm
$router->map( 'GET', '/san-pham.html',['ProductController','index'],'product');

// Trang chính sách đổi trả
$router->map( 'GET', '/chinh-sach-doi-tra.html',['InformationController','returnPolicy'],'returnPolicy');

// Trang chính sách thanh toán
$router->map( 'GET', '/chinh-sach-thanh-toan.html',['InformationController','paymentPolicy'],'paymentPolicy');

// Trang chính sách giao hàng
$router->map( 'GET', '/chinh-sach-giao-hang',['InformationController','deliveryPolicy'],'deliveryPolicy');

// Trang liên hệ
$router->map( 'GET', '/lien-he',['ContactController','form'],'contact');

// Trang chi tiết sản phẩm
// slug là name sản phẩm(Chỉ để làm đẹp)
// id là mã sản phẩm
// /san-pham/nuoc-tay-trang-tuoi-mat-l-oreal-3-in-1-danh-cho-da-dau-da-hon-hop-400ml-19325.html
$router->map( 'GET', '/san-pham/[*:slug]-[i:id].html', function ($slug,$id){
	call_user_func_array(['ProductController','detail'],[$id]);
},'productDetail');

// Trang danh mục sản phẩm
// danh-muc/kem-duong-da-2
$router->map( 'GET', '/danh-muc/[*:slug]-[i:categoryId]', function ($slug,$categoryId){
	call_user_func_array(['ProductController','index'],[$categoryId]);
},'category');

// Tìm kiếm sản phẩm
$router->map( 'GET', '/search',['ProductController','index'] ,'search');
// match current request url
$match = $router->match();
// var_dump($match);
$routeName = $match['name'];
// call closure or throw 404 status
if( is_array($match) && is_callable( $match['target'] ) ) {
	call_user_func_array( $match['target'], $match['params'] ); 
} else {
	// no route//router
// Bước lấy ra 2 tham số c và a để xác định chạy hàm nào trong controller nào
// c là controller
// a là action(hàm-function)
//Trường hợp không match bất kỳ route nào
$c = $_GET['c'] ?? 'home';
$a = $_GET['a'] ?? 'index';

//StudentController
$str = ucfirst($c).'Controller'; 


// new đối tượng để gọi hàm
$controller = new $str();

// gọi hàm chạy
$controller->$a();

}