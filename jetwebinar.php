<?
class  JetWebinar {
	var $api_key = '';
	var $domain = '';
	
	public function post($url, $fields)
	{
	    try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_REFERER, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields));

            $result = curl_exec($ch);
            curl_close($ch);
        } catch (Exception $exception) {
            error_log("New Registrant Error - ".$exception->getTraceAsString());
        }

		return $result;
	}
	
	public function __construct($domain,$key) {
		$this->domain = $domain;
		$this->api_key = $key;
	}
	
	public function new_registrant($fields) {
		$fields["key"] = $this->api_key;

		return $this->post("https://".$this->domain."/papi/new_registrant",$fields);
	}
	
	public function list_webinars($fields) {
		$fields["key"] = $this->api_key;
		
		return $this->post("https://".$this->domain."/papi/list_webinars",$fields);
	}
	
	public function list_attendee_webinars($fields) {
		$fields["key"] = $this->api_key;
		return $this->post("https://".$this->domain."/papi/list_attendee_webinars",$fields);
	}
	
	
}
?>