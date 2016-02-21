<?php

namespace App\Repositories;

use Goutte\Client;

class InfoRepository
{
    protected $pg = "https://play.google.com/store/apps/details";
    
    protected $client;

    /**
     * @param InfoRepository $info
     */
    public function __construct(
    ) {
        $this->client = new Client();
    }

    public function get($app_id, $lang)
    {
        $url = $this->pg . "?id=" . $app_id . "&hl=" . $lang;
        $obj = new \stdClass;

        try {
            $crawler = $this->client->request('GET', $url);

            $app_name = implode("\n", $crawler->filter('div.id-app-title')->each(function ($node) {
                return trim($node->text());
            }));
            if (strlen($app_name) > 0) {
                $obj->count = 1;
                $obj->app_name = $app_name;
                $obj->description = implode("\n", $crawler->filter('div.text-body[itemprop=description]')->each(function ($node) {
                    return trim($node->text());
                }));
                $obj->release_note = implode("\n", $crawler->filter('div.recent-change')->each(function ($node) {
                    return trim($node->text());
                }));
                $obj->version = implode("\n", $crawler->filter('div.content[itemprop=softwareVersion]')->each(function ($node) {
                    return trim($node->text());
                }));
                $obj->score = implode("\n", $crawler->filter('div.score')->each(function ($node) {
                    return trim($node->text());
                }));
            }
            else {
                $obj->count = 0;
            }

        }
        catch(Exception $e) {
            $obj->message = $e->getMessage();
            $obj->count = 0;
        }
        
        return $obj;
    }
}
