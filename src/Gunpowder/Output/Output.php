<?php

namespace Gunpowder\Output;

interface Output
{
    /**
     * Send a message to the user
     *
     * @param string $message The message that we want to send
     * @param string $type    The type of message
     */
    public function message($message, $type);

    /**
     * Show a title to the user
     *
     * @param string $message The message that we want to send
     */
    public function title($message);

    /**
     * Send a success message to the user
     *
     * @param string $message The message that we want to send
     */
    public function success($message);

    /**
     * Send a failure message to the user
     *
     * @param string $message The message that we want to send
     */
    public function failure($message);
}
