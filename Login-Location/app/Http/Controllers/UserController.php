<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Return_;

class UserController extends Controller
{

    public function register(Request $request){
        $data =$request->validate([
            'name' =>'required',
            'email' =>'required | email',
            'password' =>'required | confirmed',
        ]);

        $user = User::create($data);
        
        if($user){
            return redirect()->route('login');
        }
    }


    public function login(Request $request)
    {
        try {
            // Validate the request data
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);
    
            // Extract latitude and longitude from the request
            $latitude = $request->input('latitude');
            $longitude = $request->input('longitude');
    
            // Attempt to authenticate the user
            if (Auth::attempt($credentials)) {
                if ($latitude !== null && $longitude !== null) {
                    session(['latitude' => $latitude]);
                    session(['longitude' => $longitude]);
    
                    // Convert latitude and longitude to a place name
                    $client = new Client();
                    try {
                        $response = $client->get('https://nominatim.openstreetmap.org/reverse', [
                            'query' => [
                                'format' => 'jsonv2',
                                'lat' => $latitude,
                                'lon' => $longitude,
                            ]
                        ]);

                      
                        $data = json_decode($response->getBody(), true);

                        $location = $data['display_name'] ?? 'unknown';

                       
                        session(['location' => $location]);

    
                        Log::info('User location: ' . $location);
                    } catch (\Exception $e) {
                        Log::error('Geocoding API request failed: ' . $e->getMessage());
                        return back()->withErrors(['location' => 'Unable to determine location.']);
                    }
                }
    
                // Redirect to the dashboard upon successful login
                return redirect()->route('dashboard');
            }
    
            // Redirect back with an error message if authentication fails
            return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
        } catch (\Exception $e) {
            Log::error('Login process failed: ' . $e->getMessage());
            return back()->withErrors(['error' => 'An unexpected error occurred during login.']);
        }
    }


    public function dashboardPage(){

        if(Auth::check()){
              // Retrieve the location data from the session
            //   $latitude = session('latitude');
            //   $longitude = session('longitude');
              $location = session('location', 'unknown');
  
            //   return dd($location);
         return view('dashboard',['location'=>  $location]);
            // return view('dashboard');
        }else{
            return redirect()->route('login');
        }
    }

    public function innerPage(){
        if(Auth::check()){
            
            return view('inner');
        }else{
            return redirect()->route('login');
        }
    }

    public function logout(){
        Auth::logout();
        return view('login');
    }



}
