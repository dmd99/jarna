<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class OauthController extends Controller
{
    //
    protected $providers = ["google", "facebook"];

    public function redirect(Request $request)
    {
        $provider = $request->provider; // On récupere le provider depuis l'url
        // On verifie si le provider est en régle
        if (in_array($provider, $this->providers)) { 
            return Socialite::driver($provider)->redirect(); // On ce dernier vers le callback
        }
        abort('404');
    }

    public function callback(Request $request)
    {
        $provider = $request->provider;
        // On verifie si le provider est en régle
        if (in_array($provider, $this->providers)) {
            //On procede a l'enregistrement de l'utilisateur
            try {
                //code...
                $user = Socialite::driver($provider)->user();
                $isUser = User::where('provider_id', $user->id)->first();
                if($isUser){
                    Auth::login($isUser);
                    $address =   $isUser::with('address')->get(); 
                    return redirect('/')->with('logedInStatus', 'Connecté(e) avec avec success en tant que '.$user->name);
                }else{
                    $email = $user->getEmail();
                    $avatar = $user-> getAvatar();
                    $id = $user->getId();
                    $createUser = User::create([
                        'name' => $user->name,
                        'email' => $email,
                        'avatar' => $avatar,
                        'password' => encrypt('2503*Mab*@2002'),
                        'provider_id' => $id,
                    ]);
                    Auth::login($createUser);
                    return redirect('/')->with('logedInStatus', 'Connecté(e) avec avec success en tant que '.$user->name);
                }
            } catch (Exception $exeption) {
                dd($exeption->getMessage());
            }
        }
    }
}
