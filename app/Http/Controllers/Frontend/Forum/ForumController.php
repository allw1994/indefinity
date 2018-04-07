<?php

namespace App\Http\Controllers\Frontend\Forum;
use App\Models\Forum\Post;
use App\Models\Forum\Comment;
use App\Models\Forum\Response;
use App\Models\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use Purifier;
use App\Http\Controllers\Controller;


class ForumController extends Controller
{
  Public function get_index()
  {
    $posts = Post::with('user')->paginate(50);
    return view('frontend.forum.index', compact('posts'));
  }
  Public function get_create_post()
  {
    $user = Auth::user();
    return view('frontend.forum.create_post')->withuser($user);
  }
  Public function get_post(Post $post)
  {
    $post->load('comments.user.responses.user');
    return view('frontend.forum.show', compact('post'));
  }
  Public function create_post(Request $request, User $user)
  {
    $this->validate($request, [
      'title' => 'required|min:12',
      'body' => ''
    ]);
    $post = new Post;
    $post->title = Purifier::clean($request->input('title'), 'title');
    $post->body = Purifier::clean($request->input('body'), 'body');
    $user = Auth::user();
    $post->user_id = $user->id;
    $user->addPost($post);
    return redirect('/forum/posts/' . $post->id);
  }
  Public function newcomment(Request $request, Post $post)
  {
    $this->validate($request, [
      'commentbody' => 'required'
    ]);
    $comment = new Comment;
    $comment->body = $request->input('commentbody');
    $comment->user_id = Auth::id();
    $post->addComment($comment);
    return back();
  }
  Public function newresponse(Request $request, Comment $comment)
  {
    $this->validate($request, [
      'responsebody' => 'required'
    ]);
    $response = new Response;
    $response->body = $request->input('responsebody');
    $response->user_id = Auth::id();
    $comment->addResponse($response);
    return back();
  }
  Public function editresponse(Response $response) //display form
  {
    return view('forum.editresponse')->withresponse($response);
  }
  Public function updateresponse(Request $request, Response $response) //update the reponse with new data
  {
    $this->validate($request, [
      'body' => 'required'
    ]);
    $response->update($request->all());
    return back();
  }
  Public function deleteResponse(Response $response)
  {
    $response->delete();
    session()->flash('flash_danger','Response successfully deleted.');
    return Redirect::back();
  }
  Public function deleteComment(Comment $comment)
  {
    $comment->delete();
    session()->flash('flash_danger','Comment successfully deleted.');
    return Redirect::back();
  }
  Public function deletePost(Post $post)
  {
    $post->delete();
    session()->flash('flash_danger','Post successfully deleted.');
    return Redirect('/forum');
  }
}
