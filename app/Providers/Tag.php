<?php

namespace App\Providers;

class Tag extends \Faker\Provider\Base
{
    protected static $tagList = array(
        '风光', '人像', '城市', '旅行', '纪实',
        '街拍', '人文', '美女', '建筑', '自然',
        '秋天', '静物', '光影', '夜景', '少女',
        '儿童', '植物', '生活', '花卉', '动物',
        '校园', '私房', '夕阳', '美食'
    );

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
