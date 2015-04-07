<?php

class squarelink_API {

	private static $API_URL = 'http://app.square-link.com/api';

	public function getWebsite($token,$format = 'json',$decode = true)
	{
		$url = '/websites/'.$token.'.'.$format;

		$response = $this->getCurlResponse($url);

		if($response != false) {

			if($decode === true) {
				$response = $this->getJsonDecode($response);
			}
			return $response;
		}

		return null;
	}

	public function getSpace($token,$format = 'json',$decode = true)
	{
		if($token != NULL) {
			$response = '<!-- Mobile footer fixe (300x50) squarelink_a070ead516b01a6690fadf5404ae2e0a -->
			<script>var squarelink_id = "'.$token.'";</script>
			<script type="text/javascript" src="//app.square-link.com/script.js"></script>';
		}

		return $response;
	}

	private function getCurlResponse($url) 
	{

		$url = $this->getApiUrl() . $url;

		$curl = curl_init();

		curl_setopt_array($curl, array(
		    CURLOPT_RETURNTRANSFER => 1,
		    CURLOPT_URL => $url,
		    CURLOPT_TIMEOUT => 3 //Timeout in seconds
		));

		$response = curl_exec($curl);

		curl_close($curl);

		return $response;
	}

	private function getJsonDecode($json)
	{
		$response = json_decode($json);
		return $response;
	}

    private function getApiUrl() 
    {
        return self::$API_URL;
    }

}