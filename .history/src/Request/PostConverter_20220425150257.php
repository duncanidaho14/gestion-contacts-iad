<?php

namespace App\Request;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Symfony\Component\Serializer\SerializerInterface;

class PostConverter implements ParamConverterInterface
{
    private SerializerInterface $serializer;

    
}
