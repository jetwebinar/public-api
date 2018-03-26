<?
class JetWebinar {
	var $api_key = '';
	var $domain = '';
	
	function api($method, $url, $data = false)
	{
	    $curl = curl_init();
	
	    switch ($method)
	    {
	        case "POST":
	            curl_setopt($curl, CURLOPT_POST, 1);
	
	            if ($data)
	                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
	            break;
	        case "PUT":
	            curl_setopt($curl, CURLOPT_PUT, 1);
	            break;
	        default:
	            if ($data)
	                $url = sprintf("%s?%s", $url, http_build_query($data));
	    }
	
	    // Optional Authentication:
	    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	
	    curl_setopt($curl, CURLOPT_URL, $url);
	    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	
	    $result = curl_exec($curl);
	
	    curl_close($curl);
	
	    return $result;
	}
	
	public function __construct($domain,$key) {
		$this->domain = $domain;
		$this->api_key = $key;
	}
	
	public function new_registrant($fields) {
		$fields["key"] = $this->api_key;
		return $this->api("POST","https://".$this->domain."/papi/new_registrant",$fields);
	}
	
	
}
?>