<?php

namespace App\Http\Controllers\Api\Tweets;

use App\Http\Controllers\Controller;
use App\Tweet;
use App\TweetMedia;
use App\Tweets\TweetType;
use Illuminate\Http\Request;

class TweetReplyController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    public function store(Tweet $tweet, Request $request)
    {
        $reply = $request->user()
            ->tweets()
            ->create(array_merge($request->only('body'), [
                'type'      => TweetType::TWEET,
                'parent_id' => $tweet->id,
            ]));

        foreach($reply->media as $id) {
            $request->media()->save(TweetMedia::find($id));
        }
    }
}
