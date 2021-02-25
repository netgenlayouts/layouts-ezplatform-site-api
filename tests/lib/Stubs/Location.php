<?php

declare(strict_types=1);

namespace Netgen\Layouts\Ez\SiteApi\Tests\Stubs;

use Netgen\EzPlatformSiteApi\API\Values\Location as APILocation;
use Pagerfanta\Pagerfanta;

final class Location extends APILocation
{
    protected int $id;

    protected string $remoteId;

    protected bool $invisible;

    protected ContentInfo $contentInfo;

    protected Location $innerLocation;

    public function getChildren(int $limit = 25): array
    {
        return [];
    }

    /**
     * @param array<mixed> $contentTypeIdentifiers
     */
    public function filterChildren(array $contentTypeIdentifiers = [], int $maxPerPage = 25, int $currentPage = 1): Pagerfanta
    {
        return new Pagerfanta(new Adapter());
    }

    public function getFirstChild(?string $contentTypeIdentifier = null): ?APILocation
    {
        return null;
    }

    public function getSiblings(int $limit = 25): array
    {
        return [];
    }

    /**
     * @param array<mixed> $contentTypeIdentifiers
     */
    public function filterSiblings(array $contentTypeIdentifiers = [], int $maxPerPage = 25, int $currentPage = 1): Pagerfanta
    {
        return new Pagerfanta(new Adapter());
    }
}
