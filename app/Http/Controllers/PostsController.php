<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Tag;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')
            ->paginate(5);

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $tags = Tag::all();

        return view('posts.create', compact('users', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validate_rules());

        $user_id = $request->input('user_id');
        $data = $request->all();

        // validate

        $data['slug'] = Str::slug($data['title'], '-');

        $new_post = new Post();
        $new_post->user_id = $user_id;
        $new_post->fill($data);

        $saved_post = $new_post->save();

        if ($saved_post) {
            if (!empty($data['tags'])) {
                $new_post->tags()->attach($data['tags']);
            }

            return redirect()->route('posts.show', $new_post->slug)->with('post_success', $new_post->title);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $users = User::all();
        $tags = Tag::all();


        return view('posts.edit', compact('post', 'users', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate($this->validate_rules());
        
        $data = $request->all();

        $updated_post = $post->update($data);

        if ($updated_post) {
            if (!empty($data['tags'])) {
                $post->tags()->sync($data['tags']);
            } else {
                $post->tags()->detach();
            }

            return redirect()->route('posts.show', $post->slug)->with('post_updated', $post->title);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $title = $post->title;

        $post->tags()->detach();
        $deleted_post = $post->delete();

        if ($deleted_post) {

            return redirect()->route('posts.index')->with('post_deleted', $title);
        }
    }

    /**
     * Validation rules
     */
    private function validate_rules()
    {
        return [
            'title' => 'required|max:100',
            'body' => 'required|max:250',
            'tags.*' => 'exists:tags,id'
        ];
    }
}
