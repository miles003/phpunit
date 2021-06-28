<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;
/**
 * Parses and verifies the doc comments for files.
 *
 * PHP version 7.4
 *
 * @category  PHP
 * @package   None
 * @author    Miles Selim <milesbalata@gmail.com>
 * @copyright 2021-2021 Laravel Mock
 * @license   BSD Licence
 * @link      /Posts
 */
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() 
    {
        $this->middleware('auth:sanctum', ['except' => 'index']);
    }
    /**
     * Displaying List view for guest in public
     *
     * @return view posts/lists blade file
     */
    public function index()
    {
        $data = Post::latest()->get();
        return view('posts/list', array('data' => $data));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Form page
     */
    public function create()
    {
        return inertia('Posts/Form');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request request from form
     * 
     * @return Form page with session message
     */
    public function store(PostRequest $request)
    {
        Post::create($request->all());
        return redirect()->back()->with('success', 'Post Created Successfully !');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Post $post data of selected id
     * 
     * @return Form page with session message
     */
    public function edit(Post $post)
    {
        return inertia(
            'Posts/Form',
            [
                'postData' => [
                    'id' => $post->id,
                    'title' => $post->title,
                    'content' => $post->content
                ]
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request request from form
     * @param \App\Models\Post         $post    data of selected id
     * 
     * @return Form page with session message
     */
    public function update(PostRequest $request, Post $post)
    {
        $post->update($request->validated());
        $message = '"'.ucwords($post->title).'" has been updated successfully';
        return redirect()->back()->with('success', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Post $post data of selected id
     * 
     * @return Form page with session message
     */
    public function destroy(Post $post)
    {
        $title = $post->content;
        $post->delete();
        $message = '"'.ucwords($title).'" has been deleted successfully';
        return redirect()->back()->with('success', $message);
    }
}
