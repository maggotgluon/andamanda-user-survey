<?php

namespace App\Http\Livewire;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use Livewire\Component;

use WireUi\Traits\Actions;

class Servey extends Component
{
    use Actions ;

    public $question;
    public $udid;

    public function mount($question){

        $this->question=Question::find($question);

    }

    public function render()
    {
        // $this->udid = 1;
        return view('livewire.servey');
    }
    public function save($rate) :void{
        // dd(request()->ip());
        // $q = Question::find($this->question);
        $a = new Answer();
        $a->questions_id = $this->question->id;
        $a->socre = $rate;
        $a->Location = request()->ip();
        $a->deviceAgent = request()->userAgent();
        $a->user = $this->udid;
        // dd($a,$request->headers);
        $a->save();

        $n_title='Data Save';
        $n_description='Thank for your time';

        $this->dialog()->success(
            $title = $n_title,
            $description = $n_description
        );
        $this->notification()->success(
            $title = $n_title,
            $description = $n_description
        );
        $this->udid=null;
        $this->emit('change-focus');
    }
}
