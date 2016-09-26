<?php

namespace Solvice\Entity;

/**
 * Class UnresolvedItem.
 */
class UnresolvedItem
{
    /**
     * @var
     */
    private $name;

    /**
     * @var
     */
    private $value;

    /**
     * @var
     */
    private $level;

    /**
     * @param $name
     * @param $value
     * @param $level
     *
     * @return static
     */
    public static function make($name, $value, $level)
    {
        return new static($name, $value, $level);
    }

    /**
     * @param $array
     *
     * @return mixed
     */
    public static function fromArray($array)
    {
        return new static($array['name'], $array['value'], $array['level']);
    }

    /**
     * UnresolvedItem constructor.
     *
     * @param $name
     * @param $value
     * @param $level
     */
    public function __construct($name, $value, $level)
    {
        $this->name = $name;
        $this->value = $value;
        $this->level = $level;
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
     * @return UnresolvedItem
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     *
     * @return UnresolvedItem
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param mixed $level
     *
     * @return UnresolvedItem
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'name' => $this->getName(),
            'value' => $this->getValue(),
            'level' => $this->getLevel(),
        ];
    }
}
