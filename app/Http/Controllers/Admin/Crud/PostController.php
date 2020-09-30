<?php

namespace App\Http\Controllers\Admin\Crud;

use App\Post;
use App\Widgets\TinyMCEWidget;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Sanjab\Controllers\CrudController;
use Sanjab\Helpers\CrudProperties;
use Sanjab\Helpers\MaterialIcons;
use Sanjab\Widgets\IdWidget;
use Sanjab\Widgets\ShowWidget;
use Sanjab\Widgets\TagWidget;
use Sanjab\Widgets\TextWidget;

class PostController extends CrudController
{
    protected static function properties(): CrudProperties
    {
        return CrudProperties::create('posts')
            ->model(\App\Post::class)
            ->title('Blog Post')
            ->titles('Blog Posts')
            ->icon(MaterialIcons::INSERT_DRIVE_FILE);
    }

    protected function init(string $type, Model $item = null): void
    {
        $this->widgets[] = IdWidget::create();
        $this->widgets[] = TextWidget::create('title')->required();
        $this->widgets[] = TagWidget::create('tags')->nullable();
        $this->widgets[] = TinyMCEWidget::create('body')
            ->onIndex(false)
            ->required()
            ->customStore(function (Request $request, Post $post) {
                $post->body = $request->body;
                $post->user_id = auth('web')->id();
            })
            ->description('Body for the Blog Post');
        $this->widgets[] = ShowWidget::create('publish_date');
        $this->widgets[] = ShowWidget::create('edit_date');
        $this->widgets[] = ShowWidget::create('writer_name', 'Writer');
    }
}
