<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reminder;
use Validator;

class ReminderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $reminders = Reminder::all();

        return view('reminders.index', compact('reminders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('reminders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $requestArray = $request->all();

        $validator = Validator::make($requestArray, [
            'name' => 'required',
            'email' => 'required',
            'date' => 'required',
            'time' => 'required',
            'company_id' => 'required'
        ]);

        if($validator->fails()){
            $errors = $validator->errors();
            return view('reminders.create', compact('errors'));     
        }

        $reminder = Reminder::create($requestArray);

        return redirect()->route('reminders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $reminder = Reminder::find($id);
        return view('reminders.show', compact('reminder'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $reminder = Reminder::find($id);
        return view('reminders.edit', compact('reminder'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $requestArray = $request->all();


        $validator = Validator::make($requestArray, [
            'name' => 'required',
            'email' => 'required',
            'date' => 'required',
            'time' => 'required',
            'company_id' => 'required'
        ]);

        $reminder = Reminder::find($id);

        if($validator->fails()){
            $errors = $validator->errors();
            return view('reminders.edit', compact(['reminder', 'errors']));     
        }

        $reminder->update($requestArray);

        return redirect()->route('reminders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $reminder = Reminder::find($id);
        $reminder->delete();
        return redirect()->route('reminders.index');
    }
}
