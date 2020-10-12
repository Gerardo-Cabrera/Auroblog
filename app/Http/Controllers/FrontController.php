<?php

namespace App\Http\Controllers;

use App\Posts;
use Carbon\Carbon;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function home() {
        $recentPosts = Posts::with('user')->orderBy('created_at', 'DESC')->paginate(10);

        foreach ($recentPosts as $key => $value) {
            $recentPosts[$key]['date'] = Carbon::parse($value['created_at'])->formatLocalized('%d/%m/%Y');
            $recentPosts[$key]['content'] = Markdown::convertToHtml($recentPosts[$key]['content']);
        }

        return view('blog.home', compact('recentPosts'));
    }

    public function post($slug) {
        $post = Posts::with('user')->where('slug', $slug)->first();
        $post->date = Carbon::parse($post['created_at'])->formatLocalized('%d/%m/%Y');

        if ($post) {
            return view('blog.post', compact('post'));
        } else {
            return redirect('/');
        }
    }
}
