<?php

namespace App\Request\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;


class PutConverter implements ParamConverterInterface
{
    private SerializerInterface $serializer;

    /**
     * @param SerializerInterface $serializer
     */
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    public function apply(Request $request, ParamConverter $configuration)
    {
        if (! $request->isMethod(Request::METHOD_PUT)) {
            return;
        }

        $object = $request->attributes->get($configuration->getName());

        $this->serializer->deserialize($request->getContent(), $configuration->getClass(), 'json', [AbstractNormalizer::OBJECT_TO_POPULATE => $object]);

        $request->attributes->set($configuration->getName(), $object);
    }

    public function supports(ParamConverter)
}