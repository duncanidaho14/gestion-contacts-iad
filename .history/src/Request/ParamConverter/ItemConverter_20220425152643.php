<?php

namespace App\Request\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

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

    public function apply(Request $request, ParamConverter $configuration)
    {
        if (! $request->attributes->has("id")) {
            return;
        }

        $object = $this->manager->getRepository($configuration->getClass())
                                ->find($request->attributes->get("id"))
                    ;
        
        $request->attributes
    }
}
