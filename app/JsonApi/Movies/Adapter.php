<?php

namespace App\JsonApi\Movies;

use App\Models\Movie;
use CloudCreativity\LaravelJsonApi\Eloquent\AbstractAdapter;
use CloudCreativity\LaravelJsonApi\Pagination\StandardStrategy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class Adapter extends AbstractAdapter
{

    /**
     * Mapping of JSON API attribute field names to model keys.
     *
     * @var array
     */
    protected $attributes = [];

    /**
     * Mapping of JSON API filter names to model scopes.
     *
     * @var array
     */
    protected $filterScopes = [];

    /**
     * Adapter constructor.
     *
     * @param StandardStrategy $paging
     */
    public function __construct(StandardStrategy $strategy)
    {
        parent::__construct(new Movie(), $strategy);
        $strategy->withUnderscoredMetaKeys()->withMetaKey('pagination');
    }

    /**
     * @param Builder $query
     * @param Collection $filters
     * @return void
     */
    protected function filter($query, Collection $filters)
    {
        if ($title = $filters->get('q')) {
            $query->where('movies.name', 'like', "{$title}%");
            $query->orWhere('movies.description', 'like', "{$title}%");
        }
    }

    protected function actors()
    {
        return $this->hasMany();
    }

    protected function images()
    {
        return $this->hasMany();
    }
}
