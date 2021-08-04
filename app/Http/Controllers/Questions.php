<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Questions extends Controller
{
    public function __constructor()
    {
        $this->middleware('auth');
    }
    public function add_comments($id, Request $request)
    {
        $request->validate(
            ['answer' => 'required']
        );
        DB::table('answers')->insert(['content' => $request->input('answer'), 'user_id' => Auth::id(), 'question_id' => $id]);

return back();
    }

    public function newQuestion()
    {
        return view('dashboard.add');
    }

    public function add(Request $request)
    {
        $id = Auth::id();
        $data = [];
        $request->validate(['title' => 'required|max:100', 'content' => 'required|max:255']);
        $data['title'] = $request->input('title');
        $data['content'] = $request->input('content');
        $data['user_id'] = $id;
        DB::table('questions')->insert($data);
        return redirect(route('dashboard'));
    }

    public function QuestionsUser($id)
    {
        $questions = DB::table('questions')->where("user_id", '=', $id)->get();
        return view('dashboard.questions', ['questions' => $questions]);
    }

    public function all()
    {
        $questions = DB::table('questions')
            ->join('users', 'questions.user_id', '=', 'users.id')
            ->select('*','questions.id as id_question')->get();

        return view('dashboard.main', ['questions' => $questions]);
    }

    public function question($id)
    {
        $question = DB::table('questions')->find($id);
        $userPublisher = DB::table('users')->find($question->user_id,['name','id','permission']);
        $questionComments = DB::table('answers')->join('users', 'answers.user_id', '=', 'users.id')->where
        ('question_id', '=', $id)
            ->get(['answers.content', 'users.name', 'users.id']);

        return view('dashboard.question', [
            'question' => $question,
            'userPublisher' => $userPublisher,
            'comments' => $questionComments
        ]);
    }
    public function deleteQuestion($id): \Illuminate\Http\RedirectResponse
    {
        if(Auth::user()->permission){
        DB::table('questions')->delete($id);
        }   
        return back();
    }
}
