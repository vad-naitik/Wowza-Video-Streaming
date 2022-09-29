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

		$this->header	= [
			"Content-Type:"  	. "application/json",
			"charset:"			. "utf-8",
			"wsc-api-key:"		. "",
			"wsc-access-key:"	. "",
		];

	}

	/**
	 * Friendly welcome
	 *
	 * @param string $phrase Phrase to return
	 *
	 * @return string Returns the phrase passed in
	 */
	public static function echoPhrase($phrase) {
		return $apiKey . " = " . $accessKey ;
	}

/* =
/* ============================================================================ */
	public static function setApiKey($apiKey) {
		self::$apiKey = $apiKey;
	}

	public static function setAccessKey($accessKey) {
		self::$accessKey = $accessKey;
	}


}