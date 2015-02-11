<?

class BinderAPI {

	public $path;
	public $payload_type;
	public $method;
	public $query_params;
	public $payload_params;
	public $send_type;
	public $api;
	
	public function __construct($api, $config) {
		$this->api = $api;

		if (isset($config['path'])) {
			$this->path = $config['path'];
		} else {
			$this->path = "";
		}

		if (isset($config['payload_type'])) {
			$this->payload_type = $config['payload_type'];
		} else {
			$this->payload_type = "";
		}

		if (isset($config['method'])) {
			$this->method = $config['method'];
		} else {
			$this->method = "get";
		}

		if (isset($config['query_params'])) {
			$this->query_params = $config['query_params'];
		} else {
			$this->query_params = [];
		}

		if (isset($config['payload_params'])) {
			$this->payload_params = $config['payload_params'];
		} else {
			$this->payload_params = [];
		}

		if (isset($config['send_type'])) {
			$this->send_type = $config['send_type'];
		} else {
			$this->send_type = $this->payload_type;
		}
	}

	public function bind($args) {
		$tempDict = array();
		foreach ($this->query_params as $key => $value) {
			if (isset($args[$key])) {
				$tempDict[$key] = $value;
			}
		}

		$url_arg = $tempDict;
		$tempDict = array();
		foreach ($this->payload_params as $key => $value) {
			if (isset($args[$key])) {
				$tempDict[$key] = $value;
			}
		}

		if (count($tempDict) > 0) {
			$tempDictAux = $tempDict;
			$tempDict = array();
			if (isset($this->send_type)) {
				$tempDict[$this->send_type] = $tempDictAux;
			}
		}

		$this->payload_arg = json_encode($tempDict);

		$uri =
			join($this->api->base_url, join($this->path, http_build_query($url_arg)));

		if (!isset($method)) {
			throw new Exception("No method selected for request.");
		}

		$result = $this->api->client->delegateRequest($this->method, $this->payload_arg);

		if (isset($this->payload_type)) {
			$result = json_decode($result);
			$tipo = $this->api->model_factory[$this->payload_type];
			$retorno = new $tipo();

			if (is_array($result)) {
				$retorno = array();
				foreach ($result as $key => $value) {
					$elem = new $tipo();
					$elem.parse($value, $this->api->model_factory);
					array_push($retorno, $elem);
				}
			} else {
				$retorno.parse($result, $this->api->model_factory);
			}

			return $retorno;
		}
	}

}

?>