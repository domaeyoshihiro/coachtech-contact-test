<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index() 
    {
        return view('index');
    }
    public function confirm(ContactRequest $request) 
    {
        $inputs = $request->all();
        $gender = $request->gender;
        return view('confirm',['inputs' => $inputs, 'gender' => $gender]);
    }
    public function create(ContactRequest $request) 
    {
        $action = $request->input('action');
        $inputs = $request->except('action');
        if($action !== 'submit'){
            return redirect()
            ->route('index')
            ->withInput($inputs);
        } else {
            $param = [
                'fullname' => $request->lastname.$request->firstname,
                'gender' => $request->gender,
                'email' => $request->email,
                'postcode' => $request->postcode,
                'address' => $request->address,
                'building_name' => $request->building_name,
                'opinion' => $request->opinion,
            ];
            Contact::create($param);
            return redirect('/thanks');
        }
    }
    public function thanks() 
    {
        return view('thanks');
    }
    public function management()
    {
        $contacts = Contact::Paginate(4);
        return view('/management', ['contacts' => $contacts]);
    }
    public function search(Request $request)
    {
        $query = Contact::query();
        $fullname = $request->fullname;
        $gender = $request->gender;
        $email = $request->email;
        $from = $request->from;
        $to = $request->to;
        if (!empty($fullname)) {
            $query -> where('fullname', 'LIKE', "%{$fullname}%");
        }
        if ($gender == 1 || $gender == 2) {
            $query -> where('gender', $gender);
        }
        if (!empty($email)) {
            $query -> where('email', 'LIKE', "%{$email}%");
        }
        if (!empty($from)&&!empty($to)) {
            $query -> whereBetween('created_at', [$from, $to]);
        }
        $contacts = $query->paginate(4);
        return view('/management', ['contacts' => $contacts]);
    }
    public function delete(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect('/management');
    }
}
