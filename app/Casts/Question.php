<?php

namespace App\Casts;

use App\Question as AppQuestion;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class Question implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return array
     */
    public function get($model, $key, $value, $attributes)
    {
        dd($attributes);
        return new AppQuestion(
            $attributes['number'],
            $attributes['image'],
            $attributes['type'],
            $attributes['answer'],
            $attributes['marks'],
            $attributes['negative']
        );
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  array  $value
     * @param  array  $attributes
     * @return string
     */
    public function set($model, $key, $value, $attributes)
    {
        return [
            'number' => $value->number,
            'image' => $value->image,
            'type' => $value->type,
            'answer' => $value->answer,
            'marks' => $value->marks,
            'negative' => $value->negative
        ];
    }
}
