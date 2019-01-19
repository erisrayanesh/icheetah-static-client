<?php

namespace ErisRayanesh\ICheetahStaticClient;

use GuzzleHttp\Client;

class Manager
{
	protected $uri;

	protected $key;

	public function __construct($uri, $key)
	{
		$this->setUri($uri);
		$this->setKey($key);
	}

	/**
	 * @param $uri
	 * @return \Psr\Http\Message\ResponseInterface
	 */
	public function getFiles($uri)
	{
		return $this->browse($uri, false, true);
	}

	/**
	 * @param $uri
	 * @return \Psr\Http\Message\ResponseInterface
	 */
	public function getDirectories($uri)
	{
		return $this->browse($uri, true, false);
	}

	/**
	 * @param $uri
	 * @param bool $directories
	 * @param bool $files
	 * @return \Psr\Http\Message\ResponseInterface
	 */
	public function browse($uri, $directories = true, $files = true)
	{
		return $this->getGuzzel()->get($uri, [
			'query' => $this->getQueryOptions($directories, $files),
			'headers' => [
				'Accept' => 'application/json',
				'App-Key' => $this->getKey(),
			]
		]);
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
	 * @return Manager
	 */
	public function setUri($uri)
	{
		$this->uri = $uri;
		return $this;
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
	 * @return Manager
	 */
	public function setKey($key)
	{
		$this->key = $key;
		return $this;
	}

	protected function getGuzzel()
	{
		return new Client([
			'base_uri' => $this->uri,
		]);
	}

	protected function getQueryOptions($directories = true, $files = true)
	{
		$opt = [];

		if (!$directories){
			$opt['dir'] = 0;
		}

		if (!$files){
			$opt['files'] = 0;
		}

		return $opt;
	}

}