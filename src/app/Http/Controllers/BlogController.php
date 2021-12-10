<?php

namespace App\Http\Controllers;

use App\Http\Requests\Blog\StoreRequest;
use App\Http\Requests\Blog\UpdateRequest;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class BlogController extends Controller
{
    /**
     * @var Blog
     */
    private $blog;

    /**
     * @param Blog $blog
     */
    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index(): \Inertia\Response
    {
        $blogs = $this->blog->all()->sortByDesc('id');

        return Inertia::render('Blog/Index',['blogs' => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response
     */
    public function create(): \Inertia\Response
    {
        return Inertia::render('Blog/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        $req = $request->validated();
        $this->blog->create($req);

        return Redirect::route('blog.index');
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
     * @param Blog $blog
     * @return \Inertia\Response
     */
    public function edit(Blog $blog): \Inertia\Response
    {
        return Inertia::render('Blog/Edit',['blog' => $blog]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Blog $blog
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRequest $request, Blog $blog): \Illuminate\Http\RedirectResponse
    {
        $req = $request->validated();
        $blog->update($req);

        return Redirect::route('blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Blog $blog
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Blog $blog): \Illuminate\Http\RedirectResponse
    {
        $blog->delete();

        return Redirect::route('blog.index');
    }
}
