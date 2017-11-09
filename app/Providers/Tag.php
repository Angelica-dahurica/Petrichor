<?php

namespace App\Providers;

class Tag extends \Faker\Provider\Base
{
    protected static $tagList = array('小清新', '欧美风', '美女');

    /**
     * @example 'Tag'
     * @return string
     */
    public static function tag()
    {
        return static::randomElement(static::$tagList);
    }
    /**
     * Generate an array of random tags
     *
     * @example array('欧美风', '小清新', '美女')
     * @param  integer      $nb     how many words to return
     * @param  bool         $asText if true the sentences are returned as one string
     * @return array|string
     */
    public function tags($nb = 3, $asText = true)
    {
        $tags = array();
        for ($i=0; $i < $nb; $i++) {
            $tags []= static::tag();
        }
        $tags = array_unique($tags);
        return $asText ? implode(';', $tags) : $tags;
    }
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
