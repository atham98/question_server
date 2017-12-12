<?php

namespace App\Http\Controllers;

use App\QuestionAnswer;
use App\Category;
use Illuminate\Http\Request;
use DB;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     * Главная страница
     * Если калонка boolean = 1 то публикуем
     */
    public function index()
    {
        $categories = Category::withCount('questions')->get();
        $questions = $this->whereColumnQuestion('boolean', 1);
//        $categories = Category::all();
        return view('index',
            compact('questions'),
            compact('categories'));
    }

    public function showFromCategory($id)
    {
        $questions = $this->whereColumnQuestion('id', $id);
        $categories = Category::all();
        return view('index',
            compact('questions'),
            compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('content.create',
            compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(), [
            'category_id' => 'required',
            'author' => 'required|max:255',
            'email' => 'required|max:255',
            'question' => 'required|max:255',
        ]);
        QuestionAnswer::query()->create(
            request(['author', 'email', 'question', 'category_id'])
        );
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $answer = $this->whereColumnQuestion('id', $id);
        return view('content.show',
            compact('answer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function edit($category_id,$id)
    {
        $this->validate(request(), [
            'author' => 'required|min:5|max:255',
            'question' => 'required|min:5|max:255',
            'answer' => 'required|min:5|max:255',
        ]);
        if (!empty($id)) {
            QuestionAnswer::query()
                ->where('id', $id)
                ->update([
                    'author' => \request('author'),
                    'question' => \request('question'),
                    'answer' => \request('answer'),
            ]);
        }
        return redirect("/admin/theme/$category_id");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function replyAnswer($category_id, $id)
    {
        $this->validate(request(), [
            'answer' => 'required|max:500',
            'status' => 'required'
        ]);
        QuestionAnswer::query()
            ->where('id', $id)
            ->update([
                'answer' => request('answer'),
                'boolean' => \request('status')
        ]);
        if($category_id === 'answer') {
            return redirect(route('withoutAnswer'));
        }else {
            return redirect("admin/theme/{$category_id}");
        }
//        return redirect("admin/theme/{$category_id}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($category_id,$id)
    {
            $question = QuestionAnswer::query()->where('id', $id);
            $question->delete();
        if($category_id === 'answer') {
            return redirect(route('withoutAnswer'));
        }else {
            return redirect("admin/theme/{$category_id}");
        }

    }
}
