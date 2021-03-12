<?php

namespace App\JsonApi\Movies;

use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{

    /**
     * @var string
     */
    protected $resourceType = 'movies';

    /**
     * @param \App\Models\Movie $resource
     *      the domain record being serialized.
     * @return string
     */
    public function getId($resource)
    {
        return (string) $resource->getRouteKey();
    }

    /**
     * @param \App\Models\Movie $resource
     *      the domain record being serialized.
     * @return array
     */
    public function getAttributes($resource)
    {
        return [
            'name' => $resource->name,
            'description' => $resource->description,
            'created-at' => $resource->created_at->toAtomString(),
            'updated-at' => $resource->updated_at->toAtomString()
        ];
    }

    public function getRelationships($resource, $isPrimary = true, array $includeRelationships)
    {
        return [
            'actors' => [
                self::SHOW_RELATED => true,
            ],
            'images' => [
                self::SHOW_RELATED => true,
            ],
        ];
    }
}
