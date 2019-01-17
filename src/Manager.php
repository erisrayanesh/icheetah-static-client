<?php

namespace ErisRayanesh\ICheetahStaticClient;

use GuzzleHttp\Client;

class Manager
{
	protected $uri;

	protected $key;

	public function __construct($uri, $key)
	{
	}

	public function getFiles()
	{

	}

	public function getDirectories()
	{

	}

	public function browse()
	{

	}


	/**
	 * @return mixed
	 */
	public function getUri()
	{
		return $this->uri;
	}

	/**
	 * @param mixed $uri
	 */
	public function setUri($uri)
	{
		$this->uri = $uri;
	}

	/**
	 * @return mixed
	 */
	public function getKey()
	{
		return $this->key;
	}

	/**
	 * @param mixed $key
	 */
	public function setKey($key)
	{
		$this->key = $key;
	}


	protected function getGuzzel()
	{
		return new Client([
			'base_uri' => $this->uri,
		]);
	}


}