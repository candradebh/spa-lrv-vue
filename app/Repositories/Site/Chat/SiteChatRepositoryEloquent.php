<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\SiteChatRepository;
use App\Models\SiteChat;
use App\Validators\SiteChatValidator;

/**
 * Class SiteChatRepositoryEloquent
 * @package namespace App\Repositories;
 */
class SiteChatRepositoryEloquent extends BaseRepository implements SiteChatRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return SiteChat::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
