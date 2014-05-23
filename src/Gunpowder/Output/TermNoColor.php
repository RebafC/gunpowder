<?php

namespace Gunpowder\Output;

final class TermNoColor implements Output
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
                $message = "## " . $message . "\n";
                break;

            case 'success':
                $message = "\t✔︎ " . $message . "\n";
                break;

            case 'failure':
                $message = "\t✘ " . $message . "\n";
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

