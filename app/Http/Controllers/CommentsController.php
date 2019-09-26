<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Validation\Validator;
use App\Http\Resources\CommentResource;
use App\Reply;


class CommentsController extends Controller
{
 
//create comment
    public function store(Request $request)
    {
        $this->validate($request, [
            
            'body' => 'required',
        ]);
       
        $comment = new Comment;
        $comment->user_id = $request->input('user_id');
        $comment->post_id = $request->input('post_id');
        $comment->body = $request->input('body');
        $comment->save();

        return new CommentResource($comment);
    }

//delete comment
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
    }

//create reply
    public function reply(Request $request){
        $reply = new Reply;
        $reply->user_id = $request->input('user_id');
        $reply->comment_id = $request->input('comment_id');
        $reply->body = $request->input('body');
        $reply->save();

        return response()->json($reply);
    }

    public function deleteReply($id){
        $reply = Reply::find($id);
        $reply->delete();
    }


}
