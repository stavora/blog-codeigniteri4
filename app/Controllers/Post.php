<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Comment;
use App\Models\Post as ModelsPost;

class Post extends BaseController
{
    public function index(string $slug)
    {
        $post = new ModelsPost();
        $post = $post->select('posts.id,posts.title,posts.slug,posts.description,posts.visits,posts.created_at,
        categories.name as categoryName',)->where('posts.slug',$slug)->join('categories',
        'categories.id = posts.category_id')
        ->first();


        $comment = new Comment();
        $comments = $comment->select(
            'comments.id,comments.comment,users.firstName as userFirstName, users.lastName as userLastName, users.image as
            avatar,comments.created_at'
        )->join(
            'users',
            'users.id = comments.user_id',
        )->where(
            'post_id',
            $post->id
        )->findAll();

        // if(!$comments) {
        //   return [];

        // }

        $commentsIds = [];
        foreach ($comments as $key => $comment) {
          $commentsIds[] = $comment->id;
        }

        var_dump($commentsIds);
        die();

        return view('post', ['post' => $post, 'comments' => $comments]);
    }
}
