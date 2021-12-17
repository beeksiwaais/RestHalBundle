<?php

namespace Alterway\DemoBundle\Entity;

class User
{
    private int $id;
    private string $name;
    private int $age;

    public function __construct(int $id, ?string $name = 'Jeff', ?int $age = 34)
    {
        $this->id = $id;
        $this->name = $name;
        $this->age = $age;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge(int $age): void
    {
        $this->age = $age;
    }


}
