<?php 
use App\core\Routing\Route;

Route::get($_ENV['SampleRoute'].'/','adminController@dashboard'); //صفحه داشبورد
Route::post($_ENV['SampleRoute'] . '/admin/login', 'adminController@login'); //صفحه لاگین
Route::get($_ENV['SampleRoute'] . '/admin/logout', 'adminController@logout'); //صفحه خروج
Route::get($_ENV['SampleRoute'] . '/admin/customerForm', 'adminController@customerForm'); //صفحه تعریف مشتری
Route::get($_ENV['SampleRoute'] . '/admin/categoryForm', 'adminController@categoryForm'); //صفحه تعریف دسته بندی
Route::get($_ENV['SampleRoute'] . '/admin/productForm', 'adminController@productForm'); //صفحه تعریف محصول
Route::post($_ENV['SampleRoute'] . '/admin/addCustomer', 'adminController@addCustomer'); // ثبت مشتری
Route::post($_ENV['SampleRoute'] . '/admin/addcategory', 'adminController@addcategory'); // ثبت دسته بندی
Route::post($_ENV['SampleRoute'] . '/admin/addproduct', 'adminController@addproduct'); //محصول ثبت 
Route::get($_ENV['SampleRoute'] . '/admin/productsTable', 'adminController@productsTable'); // جدول محصولات
Route::get($_ENV['SampleRoute'] . '/admin/customersTable', 'adminController@customersTable'); // جدول مشتریان
Route::get($_ENV['SampleRoute'] . '/admin/reportsTable', 'adminController@reportsTable'); // جدول گزارشات
Route::get($_ENV['SampleRoute'] . '/admin/categoriesTable', 'adminController@categoriesTable'); // جدول دسته بندی ها
Route::get($_ENV['SampleRoute'] . '/admin/ProductDelete/{id}', 'adminController@ProductDelete'); // جدول دسته بندی ها

 









// Route::get($_ENV['SampleRoute'].'/Userform','UserGroupController@Userform'); // فرم ثبت کاربر
// Route::get($_ENV['SampleRoute'].'/UserEdit/{id}','UserGroupController@UserEdit'); //فرم ادیت کاربر
// Route::post($_ENV['SampleRoute'].'/AdduserEdit','UserGroupController@AdduserEdit'); //ثبت ادیت کاربر
// Route::post($_ENV['SampleRoute'].'/user/add','UserGroupController@Useradd'); //اظافه کردن کاربر
// Route::get($_ENV['SampleRoute'].'/user/delete/{id}','UserGroupController@Userdelete'); //پاک کردن کاربر

// Route::get($_ENV['SampleRoute'].'/GroupsTable','UserGroupController@GroupsTable'); //جدول گروه های تعریف شده
// Route::get($_ENV['SampleRoute'].'/Groupform','UserGroupController@Groupform'); // فرم ثبت اطلاعات گروه ها
// Route::get($_ENV['SampleRoute'].'/GroupEdit/{id}','UserGroupController@GroupEdit'); // ادیت کردن گروه 
// Route::post($_ENV['SampleRoute'].'/AddGroupEdit','UserGroupController@AddGroupEdit'); // ثبت ادیت گروه
// Route::post($_ENV['SampleRoute'].'/group/add','UserGroupController@Groupadd'); //اظافه کردن گروه ها
// Route::get($_ENV['SampleRoute'].'/group/delete/{id}','UserGroupController@Groupdelete'); //پاک کردن گروه 




   

