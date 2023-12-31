<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use League\OAuth2\Client\Provider\GenericProvider;



class LoginController extends Controller
{

    public GenericProvider $provider;
    public $scopes = 'users-infos read-assos read-memberships';

    public function __construct() {
        $this->provider = new GenericProvider([
            'clientId'                => env('CLIENT_ID'),
            'clientSecret'            => env('CLIENT_SECRET'),
            "redirectUri"             => env('APP_URL').'/login',
            "urlAuthorize"            => "https://auth.assos.utc.fr/oauth/authorize",
            "urlAccessToken"          => "https://auth.assos.utc.fr/oauth/token",
            "urlResourceOwnerDetails" => "https://auth.assos.utc.fr/api/user",
            'scopes'                  => $this->scopes
        ]);
    }

    /**
     * @throws IdentityProviderException
     */
    public function login(Request $request){
        // if there is a code in url
        if ($request->code) {
            $accessToken = $this->provider->getAccessToken('authorization_code', [
                'code' => $_GET['code']
            ]);

            $resourceOwner = $this->provider->getResourceOwner($accessToken);
            $user = $resourceOwner->toArray();
            // fetch user associations at /user/assos/current
            $request = $this->provider->getAuthenticatedRequest(
                'GET',
                'https://auth.assos.utc.fr/api/user/associations/current',
                $accessToken
            );
            $response = $this->provider->getResponse($request);
            $body = json_decode($response->getBody(), true);
            $user['assos'] = $body;
            $user['current_asso'] = $body[0];            // save user in session
            session(['user' => $user]);
            // redirect to home
            return redirect('/');
        } else {
            $authorizationUrl = $this->provider->getAuthorizationUrl();
            session(['oauth2state' => $this->provider->getState()]);
            return redirect($authorizationUrl);
        }
    }

    public function logout(Request $request){
        $request->session()->forget('user');
        return redirect('/');
    }
}
