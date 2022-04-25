<?php

namespace App\Request;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class PostConverter implements ParamConverterInterface
{
    private SerializerInterface $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    public function apply(Request $request, ParamConverter $configuration)
    {
        if(! $request->isMethod(Request::METHOD_POST)){
            return;
        }

        $object = $this->serializer->deserialize($request->getContent(), $configuration->getClass(), 'json');

        
    }
}
