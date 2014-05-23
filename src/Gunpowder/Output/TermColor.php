<?php

namespace Gunpowder\Output;

final class TermColor implements Output
{
	/**
	 * Send a message to the user
	 *
	 * @param string $message The message that we want to send
	 * @param string $type    The type of message
	 */
	public function message($message, $type = 'normal')
	{
		switch ($type) {
			case 'title':
				$message = "\033[36;1m" . $message . "\033[0m\n";
				break;

			case 'success':
				$message = "\033[32;1m\t✔︎ " . $message . "\033[0m\n";
				break;

			case 'failure':
				$message = "\033[31;1m\t✘ " . $message . "\033[0m\n";
				break;

			case 'normal':
			default:
				$message = $message . "\n";
				break;
		}

		echo $message;
	}

	/**
	 * Show a title to the user
	 *
	 * @param string $message The message that we want to send
	 */
	public function title($message)
	{
		$this->message($message, 'title');
	}

	/**
	 * Send a success message to the user
	 *
	 * @param string $message The message that we want to send
	 */
	public function success($message)
	{
		$this->message($message, 'success');
	}

	/**
	 * Send a failure message to the user
	 *
	 * @param string $message The message that we want to send
	 */
	public function failure($message)
	{
		$this->message($message, 'failure');
	}
}
