<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slack extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index(){

	$provider = new League\OAuth2\Client\Provider\Slack([
		'clientId'          => '722479508582.722480900998',
		'clientSecret'      => 'c85b0066e5677f31d0f7eb866fe74082',
		'redirectUri'       => site_url('slack/index'),
	]);

	if (!isset($_GET['code'])) {
		// If we don't have an authorization code then get one
		$authUrl = $provider->getAuthorizationUrl();
		$_SESSION['oauth2state'] = $provider->getState();
		header('Location: '.$authUrl);
		exit;
		// Check given state against previously stored one to mitigate CSRF attack
	} elseif (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {
		unset($_SESSION['oauth2state']);
		exit('Invalid state');
	} else {
		// Try to get an access token (using the authorization code grant)
		$token = $provider->getAccessToken('authorization_code', [
		'code' => $_GET['code']
		]);
		// Optional: Now you have a token you can look up a users profile data
		try {
		// We got an access token, let's now get the user's details
		$user = $provider->getResourceOwner($token);
		// Use these details to create a new profile
		printf('Hello %s!', $user->getNickname());
	} catch (Exception $e) {
		// Failed to get user details
		exit('Oh dear...');
	}
		// Use this to interact with an API on the users behalf
		echo $token->getToken();
	}
    }
	
}
