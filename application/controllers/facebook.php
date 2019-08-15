<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
use Abraham\TwitterOAuth\TwitterOAuth;

class Facebook extends CI_Controller {

   

	public function index()
	{
		$fb = new \Facebook\Facebook([
		'app_id' => '510685499736374',
		'app_secret' => '8cc59ccd5539633d05af6643fcf64ae8',
		'default_graph_version' => 'v2.10',
		]);

		$helper = $fb->getRedirectLoginHelper();
		$permissions = ['email']; // Optional permissions
		$loginUrl = $helper->getLoginUrl('http://localhost/qa/facebook/callback', $permissions);
	        header('location:'.$loginUrl);
		
	}

        public function callback() 
        {
		$fb = new \Facebook\Facebook([
		'app_id' => '510685499736374',
		'app_secret' => '8cc59ccd5539633d05af6643fcf64ae8',
		'default_graph_version' => 'v2.10',
		]);

		$helper = $fb->getRedirectLoginHelper();

		try {
			$accessToken = $helper->getAccessToken();
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
			//When Graph returns an error
			header('HTTP/1.0 400 Bad Request');
			echo 'Bad request';
			exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
			//When validation fails or other local issues
			header('HTTP/1.0 400 Bad Request');
			echo 'Bad request';
                        exit;
		}

		if (! isset($accessToken)) {
			if ($helper->getError()) {
				header('HTTP/1.0 401 Unauthorized');
				echo "Error: " . $helper->getError() . "\n";
				echo "Error Code: " . $helper->getErrorCode() . "\n";
				echo "Error Reason: " . $helper->getErrorReason() . "\n";
				echo "Error Description: " . $helper->getErrorDescription() . "\n";
			} else {
				header('HTTP/1.0 400 Bad Request');
				echo 'Bad request';
			}
			exit;
		}

		$oAuth2Client = $fb->getOAuth2Client();
		$tokenMetadata = $oAuth2Client->debugToken($accessToken);
		$fb_id = $tokenMetadata->getUserId();
		
		if (isset($fb_id) && $fb_id !="") {
                    $name = 'USER-'.time();
                    //check if user alredy exists
                    $query = $this->db->query('SELECT * FROM users WHERE social_id="'.$fb_id.'" and social_platform = "facebook"');
        	    $user = $query->row();
                    if ($user) {
                            $_SESSION['id'] = $user->id;
                            $_SESSION['success'] = 'You have successfully logged in.';
			    redirect(site_url('my-account'));
                    } else {
                                //register user
                                $sql = "INSERT INTO users (name, email, password, status, created_at, link, everified, login_type, social_id, social_platform) VALUES ('".$name.
				"', '', '',1,'".date('Y-m-d H:i:s')."','',0,2,'".$fb_id."','facebook')";
				$this->db->query($sql);
				$id = $this->db->insert_id();
				$link = $id.time();
				$sql = "UPDATE users SET link ='".$link."' where id =".$id;
				$this->db->query($sql);
				$_SESSION['id'] = $id;
				$_SESSION['success'] = 'You have successfully registered and logged in.';
				redirect(site_url('my-account'));
                    } 
                } else {
                   $_SESSION['error'] = 'An unexpected error occurred. Please try again later.';
                   redirect(site_url('log-in'));
                }
		
        }


	public function twitter()
	{
	
		$connection = new TwitterOAuth('dKapQnA4c5QPY196NCHNKnpeA', 'P2xHa3maxh8gYkEX17JyQWJBjqPZRYBinK23isMGsNiW5cRimw');
		$request_token = $connection->oauth("oauth/request_token", array("oauth_callback" => 'http://localhost/qa/twitter/callback'));
		$_SESSION['oauth_token'] = $request_token['oauth_token'];
		$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
		$url = $connection->url("oauth/authorize", array("oauth_token" => $request_token['oauth_token']));
		header('Location: ' . $url);
	}

        public function twittercallback() 
        {

if($_GET['oauth_token'] || $_GET['oauth_verifier'])
{
	$connection = new TwitterOAuth('dKapQnA4c5QPY196NCHNKnpeA', 'P2xHa3maxh8gYkEX17JyQWJBjqPZRYBinK23isMGsNiW5cRimw', $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
	$access_token = $connection->oauth('oauth/access_token', array('oauth_verifier' => $_REQUEST['oauth_verifier'], 'oauth_token'=> $_GET['oauth_token']));
	$connection = new TwitterOAuth('dKapQnA4c5QPY196NCHNKnpeA', 'P2xHa3maxh8gYkEX17JyQWJBjqPZRYBinK23isMGsNiW5cRimw', $access_token['oauth_token'], $access_token['oauth_token_secret']);
	$user_info = $connection->get('account/verify_credentials');
	$oauth_token = $access_token['oauth_token'];
	$oauth_token_secret = $access_token['oauth_token_secret'];
	$user_id = $user_info->id;
	$user_name = $user_info->name;
	$fb_id = $user_id;
		
		if (isset($fb_id) && $fb_id !="") {
                    $name = $user_name;
                    //check if user alredy exists
                    $query = $this->db->query('SELECT * FROM users WHERE social_id="'.$fb_id.'" and social_platform = "twitter"');
        	    $user = $query->row();
                    if ($user) {
                            $_SESSION['id'] = $user->id;
                            $_SESSION['success'] = 'You have successfully logged in.';
			    redirect(site_url('my-account'));
                    } else {
                                //register user
                                $sql = "INSERT INTO users (name, email, password, status, created_at, link, everified, login_type, social_id, social_platform) VALUES ('".$name.
				"', '', '',1,'".date('Y-m-d H:i:s')."','',0,2,'".$fb_id."','twitter')";
				$this->db->query($sql);
				$id = $this->db->insert_id();
				$link = $id.time();
				$sql = "UPDATE users SET link ='".$link."' where id =".$id;
				$this->db->query($sql);
				$_SESSION['id'] = $id;
				$_SESSION['success'] = 'You have successfully registered and logged in.';
				redirect(site_url('my-account'));
                    } 
                } else {
                   $_SESSION['error'] = 'An unexpected error occurred. Please try again later.';
                   redirect(site_url('log-in'));
                }
	
} else {
$_SESSION['error'] = 'An unexpected error occurred. Please try again later.';
                   redirect(site_url('log-in'));
}
		
		
}



	
}
