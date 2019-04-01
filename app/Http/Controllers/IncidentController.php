<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Incident;
use App\User;
use Auth;
class IncidentController extends Controller
{
    public function index(Request $request){
        $current_page = 'create';
        $data = array(
            'current_page' => $current_page
        );
        return view('home', $data);
    }
    public function create(Request $request){
        $user = Auth::user();
        // $phone = $request->get('phone');
        $urgency = $request->get('urgency');
        $description = $request->get('description');

        Incident::create([
            'user_id' => $user->id,
            'urgency' => $urgency,
            'description' => $description,
        ]);

        return back()->with('success', 'Create Incident Successfully!');
    }

    public function search(Request $request){
        $user_mod = new User();
        $user_mod = $user_mod->select('id');
        $username = $firstname = $lastname = $phone = '';
        $urgency = "0";
        if ($request->has('username') && $request->has('username') != ""){
            $username = $request->get('username');
            $user_mod = $user_mod->where('name', 'like', "%$username%");
        }
        if ($request->has('firstname') && $request->has('firstname') != ""){
            $firstname = $request->get('firstname');
            $user_mod = $user_mod->where('firstname', 'like', "%$firstname%");
        }
        if ($request->has('lastname') && $request->has('lastname') != ""){
            $lastname = $request->get('lastname');
            $user_mod = $user_mod->where('lastname', 'like', "%$lastname%");
        }
        if ($request->has('phone') && $request->has('phone') != ""){
            $phone = $request->get('phone');
            $user_mod = $user_mod->where('phone', 'like', "%$phone%");
        }

        $users = $user_mod->get();
        $user_id_arrray = array();
        foreach ($users as $user) {
            array_push($user_id_arrray, $user->id);
        }
        $incident_mod = new Incident();
        $incident_mod = $incident_mod->whereIn('user_id', $user_id_arrray);
        if ($request->has('urgency')){
            $urgency = $request->get('urgency');
            $incident_mod = $incident_mod->where('urgency', $urgency);           
        }

        $incidents = $incident_mod->paginate(10);

        $current_page = 'search';
        if(null !== $request->get('page')){
            $page_number = $request->get('page');
        }else{
            $page_number = 1;
        }
        $data = array(
            'current_page' => $current_page,
            'page_number' => $page_number,
            'incidents' => $incidents,
            'username' => $username,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'urgency' => $urgency,
            'phone' => $phone
        );
        return view('search', $data);
    }
}
