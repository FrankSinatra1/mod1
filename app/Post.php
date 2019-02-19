<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	public $fillable = [
		"title",
		"anons",
		"text",
		"tags",
		"image",
		"datatime"
	];

	public $table = "posts";
	public $timestamps = false;

	public function comments() {
	    return $this->hasMany(Comment::class);
    }
}
