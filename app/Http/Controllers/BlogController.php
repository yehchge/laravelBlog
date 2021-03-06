<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::latest()->paginate(5);

        return view('blogs.index', compact('blogs'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }
    
    public function create(Request $request, Blog $blog)
    {
        $blog->create($request);
        return redirect()->route('blogs.note');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Blog::create($request->all());

        return redirect()->route('blogs.index')
            ->with('success', 'Blog created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view('blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog, $id)
    {
        $blogRow = $blog->edit($id);
        return view('blogs.edit', compact('blogRow'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $blog->update($request->all());

        return redirect()->route('blogs.index')
            ->with('success', 'Blog updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->route('blogs.index')
            ->with('success','Blog deleted successfully.');
    }

    public function help(){
        return view('blogs.help');
    }

    public function login(){
        return view('blogs.login');
    }

    public function run(Request $request, Blog $blog){
        $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);

        $blog->run($request);
        if ($request->session()->get('loggedIn')){
            return redirect()->route('blogs.dashboard')
                ->with('success', 'login successfully.');
        }else{
            return redirect()->route('blogs.login')
                ->with('fail', 'login failed.');
        }
    }

    public function dashboard(Request $request){
        $logged = $request->session()->get('loggedIn');

        if ($logged == false) {
            $request->session()->flush();
            return redirect()->route('blogs.login');
        }
        return view('blogs.dashboard');
    }

    public function xhrInsert(Request $request, Blog $blog){
        $logged = $request->session()->get('loggedIn');

        if ($logged == false) {
            $request->session()->flush();
            return redirect()->route('blogs.login');
        }
        $blog->xhrInsert($request);
    }

    public function xhrGetListings(Blog $blog){
        $blog->xhrGetListings();
    }

    public function xhrDeleteListing(Blog $blog){
        $blog->xhrDeleteListing();
    }

    public function user(Request $request, Blog $blog){
        $userList = $blog->userList($request);
        return view('blogs.user', compact('userList'));
    }

    public function user_add(Blog $blog){
        $blog->user_add();
        return redirect()->route('blogs.user');
    }

    public function user_del(Blog $blog, $id){
        $blog->user_del($id);
        return redirect()->route('blogs.user');
    }

    public function user_edit(Blog $blog, $id){
        if(!$_POST){
            $userRow = $blog->user_edit($id);
            return view('blogs.user_edit', compact('userRow'));
        }else{
            $blog->userEditSave($id);
            return redirect()->route('blogs.user');
        }
    }

    public function note(Request $request, Blog $blog){
        $noteList = $blog->noteList($request);
        return view('blogs.note', compact('noteList'));
    }

    public function logout(Request $request){
        $request->session()->flush();

        setcookie('username', '', 0, '/');
        return redirect()->route('blogs.login');
    }

    public function editSave(Blog $blog, $id){
        $blog->editSave($id);
        return redirect()->route('blogs.note');
    }


    public function delete(Blog $blog, $id){
        $blog->deleteNote($id);
        return redirect()->route('blogs.note');
    }


}
