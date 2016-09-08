<?php

namespace Solvice\Entity;

class Keyword
{
    /**
     * @var
     */
    private $name;

    /**
     * @var
     */
    private $priority = 0;

    /**
     * @param                   $name
     * @param                   $priority
     *
     * @return static
     */
    public static function make($name, $priority = 0)
    {
        return new static($name, $priority);
    }

    /**
     * Entity constructor.
     *
     * @param                   $name
     * @param                   $priority
     */
    public function __construct($name, $priority = 0)
    {
        $this->name = $name;
        $this->priority = $priority;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     *
     * @return Keyword
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @param mixed $priority
     *
     * @return Keyword
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'name' => $this->getName(),
            'priority' => $this->getPriority(),
        ];
    }
}