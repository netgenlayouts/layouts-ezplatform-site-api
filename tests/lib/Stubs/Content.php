<?php

namespace Netgen\BlockManager\SiteAPI\Tests\Stubs;

use Netgen\EzPlatformSiteApi\API\Values\Content as APIContent;

final class Content extends APIContent
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var \Netgen\EzPlatformSiteApi\API\Values\ContentInfo
     */
    protected $contentInfo;

    public function hasField($identifier)
    {
    }

    public function getField($identifier)
    {
    }

    public function hasFieldById($id)
    {
    }

    public function getFieldById($id)
    {
    }

    public function getFieldValue($identifier)
    {
    }

    public function getFieldValueById($id)
    {
    }

    public function getLocations($limit = 25)
    {
    }

    public function filterLocations($maxPerPage = 25, $currentPage = 1)
    {
    }

    public function getFieldRelation($fieldDefinitionIdentifier)
    {
    }

    public function getFieldRelations($fieldDefinitionIdentifier, $limit = 25)
    {
    }

    public function filterFieldRelations(
        $fieldDefinitionIdentifier,
        array $contentTypeIdentifiers = array(),
        $maxPerPage = 25,
        $currentPage = 1
    ) {
    }
}
