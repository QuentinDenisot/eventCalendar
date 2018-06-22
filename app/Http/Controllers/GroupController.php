<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\Group;
use App\User;

class GroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $groups = Group::get();

        return view('groups', ['groups' => $groups]);
    }

    public function indexJoin()
    {
        $groups = Group::get();
        $myGroup = \Auth::user()->id_group;

        if($myGroup == 0)
        {
            $usersFromMyGroup = [];
        }
        else
        {
            $usersFromMyGroup = User::where('id_group', $myGroup)->get();
        }

        return view('joingroup', ['groups' => $groups, 'usersFromMyGroup' => $usersFromMyGroup, 'myGroup' => $myGroup]);
    }

    public function addGroup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        $group = new Group();
        $group->name = $request['name'];

        $group->save();

        return Redirect::to('/groups');
    }

    public function joinGroup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_group' => 'required'
        ]);

        $user = \Auth::user();
        $user->id_group = $request['id_group'];

        $user->save();

        return Redirect::to('/joinGroup');
    }
}
