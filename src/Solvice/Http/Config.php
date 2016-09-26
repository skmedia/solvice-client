<?php

namespace Solvice\Http;

/**
 * Class Config.
 */
class Config
{
    /**
     * @var
     */
    private $apiEndpoint;

    /**
     * @var
     */
    private $username;

    /**
     * @var
     */
    private $password;

    /**
     * Config constructor.
     *
     * @param $apiEndpoint
     * @param $username
     * @param $password
     */
    public function __construct($apiEndpoint, $username, $password)
    {
        $this->apiEndpoint = $apiEndpoint;
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * @return array
     */
    public function getAuth()
    {
        return [
            $this->getUsername(),
            $this->getPassword(),
        ];
    }

    /**
     * @return mixed
     */
    public function getApiEndpoint()
    {
        return $this->apiEndpoint;
    }

    /**
     * @param mixed $apiEndpoint
     *
     * @return Config
     */
    public function setApiEndpoint($apiEndpoint)
    {
        $this->apiEndpoint = $apiEndpoint;

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
     * @return Config
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     *
     * @return Config
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
}
