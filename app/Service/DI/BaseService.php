<?php

namespace App\Service\DI;

class BaseService
{
//    private BaseInterface $baseClass;

    public function __construct(private readonly BaseInterface $baseClass)
    {
//        $this->baseClass = $baseClass;
    }

    public function service_static(): array
    {
        return $this->baseClass::static();
    }

    public function service_post():object
    {
//        return $this->baseClass = 10;
        return $this->baseClass->post();
    }

    public function service_category():object
    {
        return $this->baseClass->category();
    }

//    public function __construct(BaseInterface $baseClass)
//    {
//        $this->baseClass = $baseClass;
//    }
}
