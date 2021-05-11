<?php

namespace Morsapt\Changelog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use League\CommonMark\GithubFlavoredMarkdownConverter;
use Morsapt\Changelog\Scopes\OrderScope;
use Morsapt\Changelog\Scopes\PerPageScope;

class Changelog extends Model
{
    use SoftDeletes;

    protected $table = "mpt_changelogs";

    protected $fillable = ["changelog", "is_public", "is_visible"];

    protected $casts = [
        'is_public' => 'boolean',
        'is_visible' => 'boolean'
    ];

    protected $appends = ['html'];

    protected static function booted()
    {
        static::addGlobalScope(new PerPageScope());
        static::addGlobalScope(new OrderScope());
    }

    /**
     * Returns the parsed markdown html
     * @return string
     */
    public function getHtmlAttribute(){

        $converter = new GithubFlavoredMarkdownConverter([
            'html_input' => 'strip',
            'allow_unsafe_links' => true,
        ]);

        return str_replace("\n","", $converter->convertToHtml($this->changelog));
    }
}

