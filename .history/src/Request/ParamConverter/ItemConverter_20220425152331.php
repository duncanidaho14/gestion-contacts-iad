<?php

namespace App\Request\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Doctrine\ORM\EntityManagerInterface;

class ItemConverter implements ParamConverterInterface
{
    private EntityManagerInterface $manager;

    public function __construct()
}
