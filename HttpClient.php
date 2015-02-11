<?

require 'vendor/autoload.php';

class HttpClient {
	public $consumer_key;
	public $consumer_secret;
	public $base_url;
	public $options;
	public $access_token;

	public function __construct($consumer_key, $consumer_secret, $base_url) {
		$this->consumer_key = $consumer_key;
		$this->consumer_secret = $consumer_secret;
		$this->base_url = $base_url;

		$this->options = array(
		    'consumer_key' => $consumer_key,
		    'consumer_secret' => $consumer_secret,
		    'server_uri' => $base_url,
		    'authorize_uri' => $base_url . '/oauth/authorize',
		   	'access_token_uri' => $base_url . '/oauth/token'
		);

		OAuthStore::instance('Session', $options);
	}

	public function initClient($pin) {
		// get a request token
	    $tokenResultParams = OauthRequester::requestRequestToken($options['consumer_key'], $pin);
	 	$this->access_token = $tokenResultParams['oauth_token'];
	}

	public function getAuthUrl() {
		return $options['authorize_uri'];
	}

	public function delegateRequest($method, $uri, $payload_arg) {
		if ($method == "get") {
			return $this->get($uri, $payload_arg);
		}
	}

	public function get($url, $payload) {
		Requests::get($url, null, $payload);
	}
}

?>