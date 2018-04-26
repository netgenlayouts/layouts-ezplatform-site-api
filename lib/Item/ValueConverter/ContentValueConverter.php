<?php

namespace Netgen\BlockManager\SiteAPI\Item\ValueConverter;

use Netgen\BlockManager\Item\ValueConverterInterface;
use Netgen\EzPlatformSiteApi\API\LoadService;
use Netgen\EzPlatformSiteApi\API\Values\ContentInfo;

final class ContentValueConverter implements ValueConverterInterface
{
    /**
     * @var \Netgen\BlockManager\Item\ValueConverterInterface
     */
    private $innerConverter;

    /**
     * @var \Netgen\EzPlatformSiteApi\API\LoadService
     */
    private $loadService;

    public function __construct(ValueConverterInterface $innerConverter, LoadService $loadService)
    {
        $this->innerConverter = $innerConverter;
        $this->loadService = $loadService;
    }

    public function supports($object)
    {
        if ($object instanceof ContentInfo) {
            return true;
        }

        return $this->innerConverter->supports($object);
    }

    public function getValueType($object)
    {
        return 'ezcontent';
    }

    public function getId($object)
    {
        if ($object instanceof ContentInfo) {
            return $object->id;
        }

        return $this->innerConverter->getId($object);
    }

    public function getRemoteId($object)
    {
        if ($object instanceof ContentInfo) {
            return $object->remoteId;
        }

        return $this->innerConverter->getRemoteId($object);
    }

    public function getName($object)
    {
        if ($object instanceof ContentInfo) {
            return $object->name;
        }

        return $this->innerConverter->getName($object);
    }

    public function getIsVisible($object)
    {
        if ($object instanceof ContentInfo) {
            return $object->mainLocation && !$object->mainLocation->invisible;
        }

        return $this->innerConverter->getIsVisible($object);
    }

    public function getObject($object)
    {
        if ($object instanceof ContentInfo) {
            return $object;
        }

        return $this->loadService->loadContent($object->id)->contentInfo;
    }
}
