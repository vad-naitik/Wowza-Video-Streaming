<?php

namespace VadNaitik\WowzaStreaming;

class StreamingServices {

	/** @var string The Stripe API key to be used for requests. */
    public static $apiKey;

    /** @var string The Stripe client_id to be used for Connect requests. */
    public static $accessKey;

    /** @var string The base URL for the Stripe API. */
    public static $apiBase = 'https://api.video.wowza.com/api/v1.8';

	/**
	 * Create a new Skeleton Instance
	 */
	public function __construct() {

	}

	/**
	 * Friendly welcome
	 *
	 * @param string $phrase Phrase to return
	 *
	 * @return string Returns the phrase passed in
	 */
	public static function echoPhrase($phrase) {
		static::getHeader();

		return static::$apiKey . " = " . static::$accessKey ;
	}

/* =
/* ============================================================================ */
	public static function setApiKey($apiKey) {
		self::$apiKey = $apiKey;
	}

	public static function setAccessKey($accessKey) {
		self::$accessKey = $accessKey;
	}

	public static function getHeader() {
		$header	=  [
			"Content-Type:"  	. "application/json",
			"charset:"			. "utf-8",
			"wsc-api-key:"		. static::$apiKey,
			"wsc-access-key:"	. static::$accessKey,
		];
		return $header;
	}

	/* ============================================================================ */
/* Wowza's FUNCTIONS */
/* ============================================================================ */
	public static function CreateLiveStreaming($streamingData) {
		$url	= "https://api.video.wowza.com/api/v1.8/live_streams";
		$header = static::getHeader();

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST , "POST");
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $streamingData);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

		$server_output = curl_exec($ch);
		$err = curl_error($ch);
		curl_close ($ch);
		$output = json_decode($server_output);
		return $output;
	}

	public static function GetLiveStreaming($streamingId) {
		$url	= "https://api.video.wowza.com/api/v1.8/live_streams/$streamingId";
		$header = static::getHeader();

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST , "GET");
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

		$server_output = curl_exec($ch);
		$err = curl_error($ch);
		curl_close ($ch);
		$output = json_decode($server_output);
		return $output;
	}

	public static function LiveStreamingStatus($streamingId) {
		$url = "https://api.video.wowza.com/api/v1.8/live_streams/$streamingId/state";
		$header = static::getHeader();

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST , "GET");
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

		$server_output = curl_exec($ch);
		$err = curl_error($ch);
		curl_close ($ch);
		$output = json_decode($server_output);
		return $output;
	}

	public static function LiveStreamingStart($streamingId) {
		$url = "https://api.video.wowza.com/api/v1.8/live_streams/$streamingId/start";
		$header = static::getHeader();

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST , "PUT");
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

		$server_output = curl_exec($ch);
		$err = curl_error($ch);
		curl_close ($ch);
		$output = json_decode($server_output);
		return $output;
	}

	public static function LiveStreamingStop($streamingId) {
		$url = "https://api.video.wowza.com/api/v1.8/live_streams/$streamingId/stop";
		$header = static::getHeader();

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST , "PUT");
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

		$server_output = curl_exec($ch);
		$err = curl_error($ch);
		curl_close ($ch);
		$output = json_decode($server_output);
		return $output;
	}

	public static function DeleteLiveStreaming($streamingId) {
		$url = "https://api.video.wowza.com/api/v1.8/live_streams/$streamingId";
		$header = static::getHeader();

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST , "DELETE");
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

		$server_output = curl_exec($ch);
		$err = curl_error($ch);
		curl_close ($ch);
		$output = json_decode($server_output);
		return $output;
	}
/* ============================================================================ */

/* ============================================================================ */
/* Wowza's Get Streaming Publish Status */
/* ============================================================================ */
	public static function LiveStreamingPlayingStatus($streamingId) {
		$url = "https://api.video.wowza.com/api/v1.8/live_streams/$streamingId/stats";
		$header = static::getHeader();

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST , "GET");
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

		$server_output = curl_exec($ch);
		$err = curl_error($ch);
		curl_close ($ch);
		$output = json_decode($server_output);
		return $output;
	}
/* ============================================================================ */

/* ============================================================================ */
/* Wowza's PLAYER */
/* ============================================================================ */
	public static function LiveStreamingPlayer($streamingId) {
		$url = "https://api.video.wowza.com/api/v1.8/players/$streamingId";
		$header = static::getHeader();

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST , "GET");
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

		$server_output = curl_exec($ch);
		$err = curl_error($ch);
		curl_close ($ch);
		$output = json_decode($server_output);
		return $output;
	}

/* ============================================================================ */
/* Wowza's PLAYER */
/* ============================================================================ */

/* ============================================================================ */
/* Wowza's HLS MulitBitrate URL */
/* ============================================================================ */
	public static function GetHlsBitrateUrls($hlsURL) {
		$playurl	= array();
		$playurls	= array();

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $hlsURL);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		$result = curl_exec($ch);
		if (curl_errno($ch)) {
			// return curl_error($ch);
			return $playurl;
		}
		curl_close($ch);

		$bitraturl = $result;
		$pieces = explode("\n", $bitraturl);
		unset($pieces[0],$pieces[1]); // remove #EXTM3U
		$pieces = array_map('trim', $pieces); // remove unnecessary space
		$pieces = array_filter($pieces);
		$pieces = array_chunk($pieces, 2); // group them by two's

		$playRootUrl =  strstr($hlsURL, '/live', true);		
		foreach($pieces as $key => $value){
			$value[0] = explode(',', $value[0]);
			foreach($value[0] as $index => $element) {
				if(stripos($element, 'RESOLUTION') !== false) {
					$resolutionElement = str_replace('RESOLUTION=', '', $element);
					$resolutionElement = explode('x', $resolutionElement);
					$resolution = (String)$resolutionElement[1].'p';
					$quality = '';
					if($resolutionElement[1] >= '720'){
						$quality = 'HD';
					}

				}
			}
			$playurl[$key]['resolution']	= $resolution;
			$playurl[$key]['quality']		= $quality;
			$playurl[$key]['url']			= str_replace('../', $playRootUrl.'/', $value[1]);
		}
		$defaultPlayurl[0]['resolution']	= 'auto';
		$defaultPlayurl[0]['url']			= $hlsURL;
		$defaultPlayurl[0]['quality']		= '';
		$playurls = array_merge($defaultPlayurl,$playurl);
		return $playurls;
	}
/* ============================================================================ */
/* Wowza's CronJob */
/* ============================================================================ */
	public static function GetLivestreamStatus($streamingId='') {
		$streamdata = $this->GetLiveStreaming($streamingId);
		echo "<pre>";
		print_r($streamdata);
		echo "</pre>";
	}
/* ============================================================================ */

}