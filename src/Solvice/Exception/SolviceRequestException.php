<?php

namespace Solvice\Exception;

use Solvice\Entity\SolviceError;

class SolviceRequestException extends \Exception
{
    /**
     * @var SolviceError
     */
    private $error;

    /**
     * @param $message
     *
     * @return $this
     */
    public function setError($message)
    {
        $this->parseMessage($message);

        return $this;
    }

    /**
     * @return SolviceError
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @param $message
     */
    private function parseMessage($message)
    {
        $this->error = SolviceError::fromJson($message);
    }

}