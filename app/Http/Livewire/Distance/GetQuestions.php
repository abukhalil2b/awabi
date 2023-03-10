<?php

namespace App\Http\Livewire\Distance;

use App\Models\Answer;
use App\Models\Cate;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class GetQuestions extends Component
{
    public $questions = [];

    public $answers = [];

    public function getUserAnswer($ans)
    {
        $user = Auth::user();

        $cate = Cate::where(['status' => 'active', 'app' => 'distance'])
            ->latest('id')
            ->first();

        $answered = Answer::where(['user_id' => $user->id, 'cate_id' => $cate->id])->first();

        if (!$answered) {

            $correct = 1;

            $decodedAns = json_decode($ans);

            $questions = $cate->questions;

            foreach ($decodedAns as $decodedAns) {

                $question = $questions->find($decodedAns->questionId);

                if ($question->ans !== $decodedAns->userAnswerOption) {
                    $correct = 0;
                }
            }

            Answer::create([
                'app' => 'distance',
                'user_id' => $user->id,
                'phone' => $user->phone,
                'cate_id' => $cate->id,
                'ans' => $ans,
                'correct' => $correct,
            ]);

            return json_encode('success');
        }
    }

    public function mount()
    {
        $cate = Cate::where(['status' => 'active', 'app' => 'distance'])
            ->latest('id')
            ->first();

        if ($cate) {

            $user = Auth::user();

            $answered = Answer::where(['user_id' => $user->id, 'cate_id' => $cate->id])->first();

            if ( ! $answered) {

                $this->questions = Question::where('cate_id', $cate->id)->get([
                    'id', 'A', 'B', 'C', 'D', 'type', 'app', 'content'
                ]);

            } else {

                $this->answers = json_decode($answered->ans);

                $this->questions = $this->questions;

            }
        }
    }

    public function render()
    {

        return view('livewire.distance.get-questions', ['questions' => $this->questions , 'answers' => $this->answers]);
    }
}
