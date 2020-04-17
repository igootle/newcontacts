<?php

namespace App\Http\Controllers;

use App\Company;
use App\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index()
    {

        // $contacts = Contact::all();
        // $contacts = Contact::orderBy('first_name', 'asc')->get();
        // $companies = Company::orderBy('name')->pluck('name', 'id')->prepend('All Companies', ' ');
        $companies = Company::userCompanies();
        // \DB::enableQueryLog();
        // $contacts = Contact::latestFirst()->filter()->paginate(10);
        $contacts = auth()->user()->contacts()->latestFirst()->paginate(10);
        // dd(\DB::getQueryLog());

        return view('contacts.index', compact('contacts', 'companies'));
    }

    public function create()
    {
        $contact = new Contact();
        $companies = Company::userCompanies();
        return view('contacts.create', compact('companies', 'contact'));
    }



    public function store(ContactRequest $request)
    {
        // dd($request->all());
        // dd($request->only('first_name', 'last_name'));

        // $request->validate($this->validationRules());
        // dd($request->except('first_name', 'last_name'));

        // Contact::create($request->all() + ['user_id' => auth()->id()]);
        $request->user()->contacts()->create($request->all());

        return redirect()->route('contacts.index')->with('message', "Contact has been added successfully");
    }

    // protected function validationRules()
    // {
    //   return [

    //   ];
    // }

    public function edit(Contact $contact)
    {
        // $contact = Contact::findOrFail($id);
        $companies = Company::userCompanies();
        return view('contacts.edit', compact('companies', 'contact'));
    }

    public function update(Contact $contact, ContactRequest $request)
    {
        // $request->validate($this->validationRules());
        // dd($request->except('first_name', 'last_name'));

        // $contact = Contact::findOrFail($id);
        $contact->update($request->all());

        return redirect()->route('contacts.index')->with('message', "Contact has been updated successfully");
    }

    public function show(Contact $contact)
    {
        // $contact = $id;
        // $contact =  Contact::findOrFail($id);
      return view('contacts.show', compact('contact')); // ['contact'=> $contact]
    }

    public function destroy(Contact $contact)
    {
        // $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('contacts.index')->with('message', "Contact has been deleted successfully");
    }
}
