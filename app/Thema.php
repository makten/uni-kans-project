<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Elasticquent\ElasticquentTrait;


class Thema extends Model
{
    use ElasticquentTrait;


    protected $fillable = [
      'thema_name'
    ];

    protected $mappingProperties = array(
        '_parent' => [
            'type' => 'propositie',
        ],
        'pro_slug' => [
            'type' => 'string',
            'analyzer' => 'standard',
        ],


    );

    /**
     * Get proposities associated with this thema
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function proposities()
    {
        return $this->belongsToMany('App\Propositie');
    }
}
