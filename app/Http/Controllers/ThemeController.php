<?php

namespace App\Http\Controllers;

use App\Category;
use App\QuestionAnswer;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    /**
     * Страница со списком тем
     * */
    public function index(){
        $total = Category::withCount('questions')->get();
        return view('admin.controlAdmin.theme',compact('total'));
    }
    /**
     * Страница редактирование
     * вопрос и ответов
     * */
    public function settingsTheme($id){
        $total = $this->whereColumnQuestion('category_id',$id);
        $themes = Category::all();
        return view('admin.controlAdmin.themeControl',compact('total'),compact('themes'));
    }

    /**
     * Показать форму для созадания
     * нового темы
     * */

    public function themeForm(){
        return view('admin.controlAdmin.newTheme');
    }
    /**
     * Создать новую тему
     * */
    public function createTheme(){

        $this->validate(request(), [
            'theme' => 'required|min:5|max:255'
        ]);
        Category::query()->create(
            ['name' => request('theme')]
        );
        return redirect(route('showThemes'));
    }

    /**
        Опубликовать вопрос
     */

    public function publishQuestion($category_id,$id){
        $this->setStatus($id,1);
        return redirect("admin/theme/{$category_id}");
    }

    /**
       Скрыть  вопрос
     */

    public function hideQuestion($category_id,$id){
        $this->setStatus($id,2);
        return redirect("admin/theme/{$category_id}");
    }

    public function changeQuestion($category_id,$id){
        return view('admin.controlAdmin.editForm',compact('id'),compact('category_id'));
    }
    public function showFormReply($category_id,$id){
        return view('admin.controlAdmin.replyForm',compact('id'),compact('category_id'));
    }


    public function moveQuestion($id){
//        dd(request('theme_id'),$id);
        QuestionAnswer::query()
            ->where('id',$id)
            ->update([
               'category_id' => request('theme_id')
            ]);
        return redirect(route('showThemes'));
    }

    public function withoutAnswer(){
        $questions = QuestionAnswer::query()
            ->where('boolean',0)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('admin.controlAdmin.withoutAnswer',compact('questions'));
    }
    /**
        Удалить тему
     */
    public function deleteTheme($id){
        $theme = Category::query()->find($id);
        $category = QuestionAnswer::query()->where('category_id',$id);
        $theme->delete();
        $category->delete();
        return redirect(route('showThemes'));
    }
}
