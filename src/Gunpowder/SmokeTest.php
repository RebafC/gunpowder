<?php

namespace Gunpowder;

use GuzzleHttp\Client;
use Gunpowder\Output\Output;

class SmokeTest
{
	/**
	 * @var GuzzleHttp\Client $client The guzzle client
	 */
	private $client;

	/**
	 * @var GuzzleHttp\Message\Response $response The current Guzzle Response
	 */
	private $response;

	/**
	 * @var Gunpowder\Output\Output $output The output handler
	 */
	private $output;

	/**
	 * @var bool $testStatus The status of all tests. If one test failes, it's set to false
	 */
	private $testStatus = true;

	/**
	 * Constructor
	 *
	 * @param GuzzleHttp\Client       $client The guzzle client
	 * @param Gunpowder\Output\Output $output The output handler
	 */
	final public function __construct(Client $client, Output $output)
	{
		$this->client = $client;
		$this->output = $output;
	}

	/**
	 * Visit an url, optionally checking http response code
	 *
	 * @param string $url The url we need to visit
	 *
	 * @return GuzzleHttp\Message\Response The response
	 */
	public function visit($url, $responseCode = false)
	{
		$this->output->message('> ' . $url);

		$this->response = $this->client->get($url);
		
		if ($responseCode !== false) {
			$this->assertResponseCode(200);
		}

		return $this->response;
	}

	/**
	 * Assert a response code for the current response
	 *
	 * @param int $responseCode The response code that we want to assert on
	 *
	 * @return bool Did the assertion succeed?
	 */
	public function assertResponseCode($responseCode)
	{
		$message = 'Response code is ' . $responseCode;

		if ((int) $this->response->getStatusCode() === $responseCode) {
			$this->output->success($message);

			return true;
		} else {
			// Fail the test
			$this->testStatus = false;

			$this->output->failure($message . ' [got ' . $this->response->getStatusCode() . ']');

			return false;
		}
	}

	/**
	 * Assert that the body contains a certain string
	 *
	 * @param string $text The text that we want to look for in the body
	 *
	 * @return bool Did the assertion succeed?
	 */
	public function assertBodyContains($text)
	{
		$message = 'Body contains "' . $text . '"';

		if (stristr($this->response->getBody(), $text)) {
			$this->output->success($message);

			return true;
		} else {
			// Fail the test
			$this->testStatus = false;

			$this->output->failure($message . ' [not found]');

			return false;
		}
	}

	/**
	 * Run the tests
	 */
	public function run()
	{
		$classMethods = get_class_methods($this);

		foreach ($classMethods as $classMethod) {
			if (preg_match('/^test_(.*$)/i', $classMethod)) {
				$this->output->title(str_replace('_', ' ', $classMethod));

				$this->$classMethod();
			}
		}
	}

	/**
	 * Get the correct exit status for our test suite
	 *
	 * @return int The exit status
	 */
	public function getExitStatus()
	{
		return ($this->testStatus === true) ? 0 : 1;
	}
}

