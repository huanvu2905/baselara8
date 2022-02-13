<?php

namespace Admin\Services;

use Illuminate\Http\Request;
use App\Models\Post;
use Admin\Contracts\PostService as PostServiceContract;
use DB;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class PostService extends Service implements PostServiceContract
{
    public function createPost($request)
    {
        DB::beginTransaction();
        try {
            $name = $request->input('name.vi');
            $post = Post::create([
                'slug'                  => Str::slug($name, '-'),
                'meta_title'            => $request->input('meta_title'),
                'meta_description'      => $request->input('meta_description'),
                'meta_keyword'          => $request->input('meta_keyword'),
            ]);

            foreach (config('setting.locale') as $key => $locale) {
                $post->postTranslations()->create([
                    'lang' => $locale,
                    'name' => $request->input('name.'. $locale) ?? '',
                    'description' => $request->input('description.'. $locale) ?? '',
                    'content' => htmlspecialchars($request->input('content.'. $locale)) ?? '',
                ]);
            }
            
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return false;
        }
    }
}
