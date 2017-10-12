  <?php


	Route::group(['middleware' => 'web'], function() {

		Route::get('email/edit/{id}', ['as'=>'emails.edit','uses'=>'smartdata\Email\EmailController@editEmailTemplateById']);

		Route::get('emails/add', 'smartdata\Email\EmailController@create')->name("add");

		Route::get('emails', 'smartdata\Email\EmailController@selectAllEmailTemplateList')->name('emailt');

		
		Route::post('email', ['as'=>'emails.add','uses'=>'smartdata\Email\EmailController@addEmailTemplate']);

		Route::post('emails', ['as'=>'emails.update','uses'=>'smartdata\Email\EmailController@updateEmailTemplateById']);

		Route::delete('destroy', 'smartdata\Email\EmailController@destroyEmailTemplateById')->name('destroy');


	});