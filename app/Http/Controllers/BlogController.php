<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Doctor;
use App\Pasien;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Rules\Captcha;

class BlogController extends Controller
{

    public function register(){
        return view('auths.register');
    }

    public function postregister(Request $request){
        $this->validate($request, [
            'email' => 'required|unique:users',
            'password' => 'required|alpha_num|min:8',
            'g-recaptcha-response' => new Captcha(),
            
        ]);

        dd($request->all());
        $register = new User;
        $register->role = 'pasien';
        $register->name = $request->name;
        $register->email = $request->email;
        $register->password = bcrypt($request->password);
        $register->remember_token = Str::random(50);
        $register->save();

        $request->request->add(['user_id' => $register->id]);

        $reg = Pasien::create($request->all());

        return redirect('/user/login');
    }

    
    public function gantipassword($id){
        $users = User::find($id);
        return view('auths.gantipassword',compact('users'));
    }

    public function postpassword(Request $request, $id){

        $this->validate($request, [
           
            'password' => 'required|min:8',
            'new_password' => 'min:8|different:password', 
        ]);
        $data = $request->all();
        // dd($data);
        $user = auth()->user();
        if (!Hash::check($data['password'], $user->password)) {
            return back()->with('error','Password lama salah');
        } else {
            // write code to update password

            $user->update([
               
                'password' => bcrypt($request->new_password),
            ]);
            return redirect('/');
        }

    }

    public function index(){
        $doctors = Doctor::latest()->get()->random(4);
        $tags = Tag::all();
        $categories = Category::all();
        $category = Category::latest()->get()->random(3);
        $articlesrandom = Article::latest()->get()->random(3);
        $articles = Article::paginate(8);
        $articlesrecentblog = Article::latest()->get()->take(4);
        $articleslatest = Article::latest()->get()->take(3);
        return view('front.home',compact('doctors','articles','articlesrecentblog','articlesrandom','categories','articleslatest','tags','category'));
    }



    public function listcategory(Category $category){
        $articleslist = $category->article()->paginate(6);
        $tags = Tag::all();
        $category = Category::latest()->get()->random(3);
        $cat = Category::latest()->get()->random(3);
        $categories = Category::all();
        $articlesrandom = Article::latest()->get()->random(2);
        $articleslatest = Article::latest()->get()->take(3);
        return view('front.bloglist',compact('cat','articleslist','articlesrandom','categories','articleslatest','tags','category'));

    }

    public function listtag(Tag $tag){
        $articleslist = $tag->article()->paginate(6);
        $cat = Category::latest()->get()->random(3);
        $tags = Tag::all();
        $categories = Category::all();
        $articlesrandom = Article::latest()->get()->random(3);
        $articleslatest = Article::latest()->get()->take(3);
        return view('front.bloglist',compact('cat','articleslist','articlesrandom','categories','articleslatest','tags'));

    }

    public function search(Request $request){
        $articlesrandom = Article::latest()->get()->random(3);
        $cat = Category::latest()->get()->random(3);
        $articleslatest = Article::latest()->get()->take(3);
        $tags = Tag::all();
        $categories = Category::all();
        $articleslist = Article::where('title', $request->search)->orWhere('title','like','%'.$request->search.'%')->paginate(6);
        return view('front.bloglist',compact('cat','articleslist','categories','tags','articlesrandom','articleslatest'));
    }

    public function about(){
        $articlesrecentblog = Article::latest()->get()->take(4);
        return view('front.about',compact('articlesrecentblog'));
    }

    public function doctor(){
        return view('frontend.doctor');
    }

    public function blog(){
        $tags = Tag::all();
        $cat = Category::latest()->get()->random(3);
        $categories = Category::all();
        $articlesrandom = Article::latest()->get()->random(3);
        $articles = Article::paginate(4);
        $articlesrecentblog = Article::latest()->get()->take(4);
        $articleslatest = Article::latest()->get()->take(3);
        return view('front.blog',compact('cat','articles','articlesrecentblog','articlesrandom','categories','articleslatest','tags'));

    }

    public function blogsingle($slug){
        $articlesingle = Article::where('slug',$slug)->get();
        $tags = Tag::all();
        $cat = Category::latest()->get()->random(3);
        $categories = Category::all();
        $articlesrandom = Article::latest()->get()->random(3);
        $articleslatest = Article::latest()->get()->take(3);

        // views($articlesingle)->record();

        return view('front.blogsingle',compact('cat','articlesingle','articlesrandom','categories','articleslatest','tags'));

    }

}
