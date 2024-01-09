<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function showViewPosts()
    {
        return view('posts/viewPost');
    }

    public function showAllPosts()
    {
        return view('home', ['posts' => Post::all()]);
    }

    public function showPosts()
    {
        $user = Auth::user();
        $posts = Post::where('user_id', $user->id)->with('category')->get();
        return view('posts/viewAllPost', ['posts' => $posts]);
    }

    public function showPost($id)
    {
        return view('posts/viewPost', ['id' => $id, 'post' => Post::find($id)]);
    }

    public function editPostView($id)
    {
        $categories = Categorie::all();
        return view('posts/editPost', ['categories' => $categories, 'id' => $id, 'post' => Post::find($id)]);
    }

    // TO DO
    public function validateDataForm()
    {
    }

    public function updatePost(Request $request, $id)
    {
        $data = array(
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
            'extract' => $request->input('extract'),
            'body' => $request->input('body'),
            'status' => $request->input('status'),
            'category_id' => $request->input('category_id'),
        );

        if ($data['category_id'] == 'add-category') {
            $idCategory = $this->createCategory($request);
            $data['category_id'] = $idCategory;
        }

        $id = $request->input('id');

        $post = Post::find($id);

        $post->update($data);

        return view('posts/viewPost', ['id' => $id, 'post' => Post::find($id)]);
    }

    public function createCategory(Request $request)
    {
        $data = array(
            'name' => $request->input('name-category'),
            'slug' => $request->input('slug-category')
        );
        $categoryId = Categorie::create($data);

        return $categoryId->id;
    }

    public function createPost(Request $request)
    {
        $id = $request->input('id_user');
        $imageInput = new ImageController();

        $data = array(
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
            'extract' => $request->input('extract'),
            'body' => $request->input('body'),
            'status' => $request->input('status'),
            'user_id' => (int)$id,
            'category_id' => $request->input('category_id'),
            // 'image' =>  $imageInput->uploadImage($request)

        );


        if ($data['category_id'] == 'add-category') {
            $idCategory = $this->createCategory($request);
            $data['category_id'] = $idCategory;
        }
        $post = Post::create($data);
        $image = $imageInput->uploadImage($request);
        $post->image()->create(['url' => $image]);
        return $this->showPosts();
    }

    public function viewCreatePost()
    {
        $categories = Categorie::all();

        return view('posts/createPost', ['categories' => $categories]);
    }

    public function deletePost($id)
    {
        $post = Post::find($id);
        $post->delete();

        return $this->showPosts();
    }
    // TO DO: hacer las validaciones de los campos y mostrar mensaje de que se ha compleato la insercion
}
