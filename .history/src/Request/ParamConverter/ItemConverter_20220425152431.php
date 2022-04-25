<?php

namespace App\Request\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Doctrine\ORM\EntityManagerInterface;

class ItemConverter implements ParamConverterInterface
{
    private EntityManagerInterface $manager;

    /**
     * 
     *
     * @param EntityManagerInterface $manager
     */
    public function __construct(EntityManagerInterface $manager)
    {
        $this->manager = $manager;
    }

    public function apply(Request $request, P)
}
