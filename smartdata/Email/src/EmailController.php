<?php

namespace smartdata\Email;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Input;


class EmailController extends Controller
{

	/**
     * Update the specified resource in email Template.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return String
     */
    public function updateEmailTemplateById(Request $request)
    {
		$this->validate($request, [
		    		
		    		'name' => 'required',
		    		'subject' => 'required',
		    		'message' => 'required'
		    	]);

        Emails::find($request->id)->update($request->all());

        return redirect()->route('emailt')
                        ->with('success','Email Template update successfully!!');
    }   

 	/**
     *  Show the form for creating a new Email Template.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('AddEmail::create');
             
    }

 	/**
     * Display a listing of the email Template resources.
     *@param  \Illuminate\Http\Request  $request
     * @return Array
     */
	public function selectAllEmailTemplateList(Request $request)
	{
		$items = Emails::orderBy('id','DESC')->paginate(15);

		return view('email::list',compact('items'))
		->with('i', ($request->input('page', 1) - 1) * 15);
	}


	/**
     * add a new resource in email template.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return String
     */
	public function addEmailTemplate(Request $request)
    {
		$this->validate($request, [
				
				'name' => 'required',
				'subject' => 'required',
				'message' => 'required'
			]);

		Emails::create($request->all());

		return redirect()->route('emailt')
                        ->with('success','Email Template added successfully!');


	}

	/**
     * Remove the specified resource from email template.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return String
     */
    public function destroyEmailTemplateById(Request $request)
    {
        Emails::find($request->id)->delete();
        return back()->with('success', 'Email Template delete successfully!');

    }


	/**
	 * Show the Email template  for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Array
	 */
	public function editEmailTemplateById($id){

		$item = Emails::find($id);
	  
		return view('update::edit',compact('item'));

	}
}
