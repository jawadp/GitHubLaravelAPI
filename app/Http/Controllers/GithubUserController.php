<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class GithubUserController extends Controller
{
    
    /**
     * Show the search form.
     */
    public function index()
    {
        return view('github.index');
    }

    /**
     * Handle the search request.
     */
    public function search(Request $request)
    {
        $this->validate($request,[
            'username'=>'required|max:255',
         ]);


        $username = $request->input('username');

        if ($username) {
            $user = $this->getUserInfo($username);
            $followers = $this->getFollowers($username);

            return view('github.index', compact('user', 'followers'));
        }

        return redirect()->route('user.index'); // Redirect back to the search form
    }

    /**
     * Get user info from GitHub API.
     */
    private function getUserInfo($username)
    {
        $client = new Client();
        $response = $client->get("https://api.github.com/users/{$username}");
        return json_decode($response->getBody(), true);
    }

    /**
     * Get followers from GitHub API.
     */
    private function getFollowers($username)
    {
        $client = new Client();
        $response = $client->get("https://api.github.com/users/{$username}/followers");
        return json_decode($response->getBody(), true);
    }

    public function getMoreFollowers($username)
    {
        $client = new Client();
        $response = $client->get("https://api.github.com/users/{$username}/followers");
        return json_decode($response->getBody(), true);
    }
}
