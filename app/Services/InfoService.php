<?php

namespace App\Services;

use App\Repositories\InfoRepository;

class InfoService
{
    /** @var InfoRepository */
    protected $info;

    /**
     * @param InfoRepository $info
     */
    public function __construct(
        InfoRepository $info
    ) {
        $this->info = $info;
    }

    /**
     * @param String $app_id
     * @param String $lang
     *
     * @return mixed
     */
    public function getInfo($app_id, $lang)
    {
        if (strlen($app_id) === 0 ){
            $result = new \stdClass();
            $result->count = 0;
            return $result;
        }
        if (strlen($lang) === 0 ){
            $lang = 'ja';
        }

        return $this->info->get($app_id, $lang);
    }
}
