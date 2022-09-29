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

	public static function getHeader() {
		$header	=  [
			"Content-Type:"  	. "application/json",
			"charset:"			. "utf-8",
			"wsc-api-key:"		. static::$apiKey,
			"wsc-access-key:"	. static::$accessKey,
		];
		return $header;
	}

}