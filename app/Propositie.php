<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Elasticquent\ElasticquentTrait;

class Propositie extends Model
{
    use ElasticquentTrait;

    protected $fillable = [
        'pro_name',
        'pro_slug',
        'pro_description',
        'pro_status',
        'user_id',
        'team_id',
        'pro_uniek',
        'pro_revenuen',
        'pro_themas',
        'pro_marktsegmenten',
        'pro_references',
        'pro_saleskit',
        'pro_marktinfo',
        'pro_technical_doc',
        'pro_avatar',
        'pro_avatarResized'
    ];

    protected $mappingProperties = array(
        'pro_name' => [
            'type' => 'string',
            'analyzer' => 'standard',
        ],
        'pro_slug' => [
            'type' => 'string',
            'analyzer' => 'standard',
        ],
        'pro_description' => [
            'type' => 'string',
            'analyzer' => 'standard',
        ],
        'pro_themas' => [
            'type' => 'string',
            'analyzer' => 'standard',
           // 'stopwords' => [',']
        ],
        'pro_marktensegmenten' => [
            'type' => 'string',
            'analyzer' => 'standard'
//            'stopwords' => [',']
        ],
        'pro_uniek' => [
            'type' => 'string',
            'analyzer' => 'standard'
//            'stopwords' => [',']
        ],
        'pro_revenuen' => [
            'type' => 'string',
            'analyzer' => 'standard'
//            'stopwords' => [',']
        ],
    );



    /**
     * Get user associated with a given content
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
//        $this->setIndex
        return $this->belongsTo('App\User');
    }

    /**
     * Get team associated with a given content
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team()
    {
        return $this->hasOne('App\Team');
    }

    /**
     * Get themas associated with this content
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function themas()
    {
        return $this->belongsToMany('App\Thema');
    }

    public function reacties()
    {
        return $this->hasMany('App\Reactie');
    }

    public function nestedReacties()
    {
        return $this->hasMany('App\Reactie')->where('comment_parent', 0);
    }
}
