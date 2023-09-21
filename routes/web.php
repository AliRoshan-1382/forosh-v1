<?php 
use App\core\Routing\Route;

Route::get($_ENV['SampleRoute'].'/','UserGroupController@index'); //صفحه داشبورد

Route::get($_ENV['SampleRoute'].'/Userform','UserGroupController@Userform'); // فرم ثبت کاربر
Route::get($_ENV['SampleRoute'].'/UserEdit/{id}','UserGroupController@UserEdit'); //فرم ادیت کاربر
Route::post($_ENV['SampleRoute'].'/AdduserEdit','UserGroupController@AdduserEdit'); //ثبت ادیت کاربر
Route::post($_ENV['SampleRoute'].'/user/add','UserGroupController@Useradd'); //اظافه کردن کاربر
Route::get($_ENV['SampleRoute'].'/user/delete/{id}','UserGroupController@Userdelete'); //پاک کردن کاربر

Route::get($_ENV['SampleRoute'].'/GroupsTable','UserGroupController@GroupsTable'); //جدول گروه های تعریف شده
Route::get($_ENV['SampleRoute'].'/Groupform','UserGroupController@Groupform'); // فرم ثبت اطلاعات گروه ها
Route::get($_ENV['SampleRoute'].'/GroupEdit/{id}','UserGroupController@GroupEdit'); // ادیت کردن گروه 
Route::post($_ENV['SampleRoute'].'/AddGroupEdit','UserGroupController@AddGroupEdit'); // ثبت ادیت گروه
Route::post($_ENV['SampleRoute'].'/group/add','UserGroupController@Groupadd'); //اظافه کردن گروه ها
Route::get($_ENV['SampleRoute'].'/group/delete/{id}','UserGroupController@Groupdelete'); //پاک کردن گروه 




   

