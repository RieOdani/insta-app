<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;//this class handles the authenrication of all users and request
use Illuminate\Http\Request;
use App\Models\Post; //This model represents the posts table
use App\Models\User; //

class HomeController extends Controller
{
    private $post;
    private $user;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Post $post , User $user)
    {
        $this->post = $post;
        $this->user = $user;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        # Retrieved all the posts we have in the posts table
        // $all_posts = $this->post->latest()->get();

        $home_posts = $this->getHomePosts();
        $all_users = $this->getSuggestedUsers();
        # Go to home page
        return view('users.home')
            ->with('home_posts', $home_posts)
            ->with('all_users', $all_users);
    }

    # Get the posts of the users that the AUTH USER is following
    private function getHomePosts()
    {
        $all_posts = $this->post->latest()->get(); //retrieved all the post and sort it in descending order
        $home_posts = []; //Initialized an empty array

        foreach ($all_posts as $post) {
            if ($post->user->isFollowed() || $post->user->id === Auth::user()->id) {
                $home_posts[] = $post;
            }
        }

        return $home_posts;
    }
    # Get all the users that the AUTH USER (The user who is logged in and authenticated) is not yet following
    private function getSuggestedUsers(){
        $all_users = $this->user->all()->except(Auth::user()->id);
        $suggested_users = []; //empty array, this will hold all the suggested user later on

        foreach ($all_users as $user) {
            if (!$user->isFollowed()) {
                $suggested_users[] = $user;
            }
        }
      # limit the output to 5 users only
      return array_slice($suggested_users, 0, 5);
      //array_slice(x, y, z)
      // x - name of the array
      // y - starting index/offset
      // z - length/how many?

    }

    
    public function search(Request $request)
    {
        $users = $this->user->where('name', 'like', '%' .$request->search. '%')->get();
        return view('users.search')->with('users', $users)->with('search', $request->search);
    }

}
