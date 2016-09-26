<?php

namespace Solvice\Solver;

/**
 * Class Response.
 */
class Response
{
    /**
     * @var
     */
    private $id;

    /**
     * @var
     */
    private $status;

    /**
     * @var
     */
    private $username;

    /**
     * @var Solver
     */
    private $solver;

    /**
     * Response constructor.
     *
     * @param             $id
     * @param             $status
     * @param             $username
     * @param Solver|null $solver
     */
    public function __construct($id, $status, $username, Solver $solver = null)
    {
        $this->id = $id;
        $this->status = $status;
        $this->username = $username;
        $this->solver = $solver;
    }

    /**
     * @param        $json
     * @param Solver $solver
     *
     * @return static
     */
    public static function fromJson($json, Solver $solver)
    {
        $data = json_decode($json);

        return new static(
            $data->id,
            $data->status,
            $data->username,
            $solver
        );
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return Response
     */
    public function setId($id)
    {
        $this->id = $id;

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
     * @return Response
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     *
     * @return Response
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }
}
