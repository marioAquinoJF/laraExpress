<?php

namespace lara\Http\Controllers\pts;


use lara\Http\Controllers\Controller;
use lara\pts\Post;
use lara\pts\Tag;
use lara\Http\Requests\PostRequest;
class PostsAdminController extends Controller
{
    private $post;
    public function __construct(Post $post) {
        $this->post = $post;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->post->paginate(6);
        return view('admin.posts.index',  compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = $this->post->create($request->all()); 
        $post->tags()->sync($this->getTagsIds($request->get("tags")));
        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post= $this->post->find($id);
        return view('admin.posts.edit',  compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $this->post->find($id)->update($request->all());
        $post = Post::findOrNew($id);
        $post->tags()->sync($this->getTagsIds($request->tags));
        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->post->find($id)->delete();
        return redirect()->route('admin.posts.index');
    }
    
    private function getTagsIds($tags){
        $tgs = array_filter(array_map('trim',explode(',', $tags)));
        $tagsIDs = [];
        foreach ($tgs as $tag) {
            $tagsIDs[] = Tag::firstOrCreate(['name'=>$tag])->id;
        }
        return $tagsIDs;
    }
}
