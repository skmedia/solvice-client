<?php

namespace Solvice\Entity;

/**
 * Class SolviceError.
 */
class SolviceError
{
    /**
     * @var
     */
    private $timestamp;

    /**
     * @var
     */
    private $status;

    /**
     * @var
     */
    private $error;

    /**
     * SolviceError constructor.
     *
     * @param $timestamp
     * @param $status
     * @param $error
     * @param $exception
     */
    public function __construct($timestamp, $status, $error, $exception)
    {
        $this->timestamp = $timestamp;
        $this->status = $status;
        $this->error = $error;
        $this->exception = $exception;
    }

    /**
     * @param $json
     *
     * @return static
     */
    public static function fromJson($json)
    {
        $array = json_decode($json);

        return new static(
            $array->timestamp,
            $array->status,
            $array->error,
            $array->exception
        );
    }

    /**
     * @return mixed
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @param mixed $timestamp
     *
     * @return SolviceError
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     *
     * @return SolviceError
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @param mixed $error
     *
     * @return SolviceError
     */
    public function setError($error)
    {
        $this->error = $error;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getException()
    {
        return $this->exception;
    }

    /**
     * @param mixed $exception
     *
     * @return SolviceError
     */
    public function setException($exception)
    {
        $this->exception = $exception;

        return $this;
    }

    /**
     * @var
     */
    private $exception;
}
