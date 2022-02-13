<?php

declare(strict_types=1);

namespace Admin\Controllers;

use Admin\Controllers\Controller as AdminController;

use Illuminate\Http\Request;
use Admin\Requests\Post\StorePostRequest;
use App\Models\Post;
use Admin\Contracts\PostService as PostServiceContract;
use Illuminate\Support\Facades\Storage;

class PostController extends AdminController
{
    protected $postService;

    public function __construct(PostServiceContract $postService)
    {
        parent::__construct();
        $this->postService = $postService;
    }

    public function create()
    {
        return view('admin::post.create');
    }

    function store(StorePostRequest $request)
    {
        if($this->postService->createPost($request)) {
            return redirect()->route('admin.post.index')->with('success', 'Thêm thành công!');
        } else {
            return redirect()->route('admin.post.index')->with('error', 'Thêm thất bại !');
        }
    }
}