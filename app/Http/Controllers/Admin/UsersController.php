<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;



class UsersController extends Controller
{
    private $user;

    public function __construct(User $user){
        $this->user = $user;
    }

    public function index(Request $request){
        //we will use the withrash
        $all_users = $this->user->withTrashed()->latest()->paginate(5);

        if($request->search){
            $all_users = $this->user->where('name' ,'like', '%'. $request->search.'%')->withTrashed()
            ->paginate(5)->appends(['search' => $request->search]);
          }

        return view('admin.users.index')
            ->with('all_users', $all_users)
            ->with('seach',$request->search);

    }

    public function deactivate($id){
        $this->user->destroy($id);
        return redirect()->back();
    }

    public function activate($id)
    {
        //the onlyTrashed() retrieved the soft deleted records only
        $this->user->onlyTrashed()->findOrFail($id)->restore();
        return redirect()->back();
     }
}




