<?php

namespace App\Http\Livewire;

use App\Models\Answer;
use App\Models\Question;
use Livewire\Component;

use WireUi\Traits\Actions;

class Servey extends Component
{
    use Actions ;

    public $question;
    public $udid;

    public function mount($question){

        $this->question=Question::find($question);

        // dd($this->question->id);

    }
    public function updated(){
        // $this->udid .='-'.request()->ip().'-'.today()->format('Ymd');
        // dd($this->udid,request()->ip());
        // dd(Answer::where('user',$this->udid)
        //          ->where('location',request()->ip())
        //          ->whereBetween('created_at',[today(),now()])
        //          ->count() ,today(),now());
        if(Answer::where('user',$this->udid)
                    ->where('location',request()->ip())
                    ->where('questions_id',$this->question->id)
                    ->whereBetween('created_at',[today(),now()])
                    ->count()>0){
            $this->udid=null;
            // $this->dialog()->error(
            //     $title = 'Error',
            //     $description = "this wrist band already regis"
            // );
            $this->notification()->error(
                $title = 'Error',
                $description = "this wrist band already regis"
            );
            $this->emit('change-focus');
        }

    }
    public function render()
    {
        // $this->udid = 1;
        if($this->udid==null){
            $this->emit('change-focus');
        }

        return view('livewire.servey');
    }
    public function save($rate) :void{
        // $this->udid .='-'.request()->ip().'-'.today()->format('Ymd');
        if(Answer::where('user',$this->udid)
            ->where('location',request()->ip())
            ->where('questions_id',$this->question->id)
            ->whereBetween('created_at',[today(),now()])
            ->count()>0){
            dd($this->udid);
            $this->dialog()->error(
                $title = 'Error',
                $description = "this wrist band already regis"
            );
            $this->notification()->error(
                $title = 'Error',
                $description = "this wrist band already regis"
            );
            $this->udid=null;
            $this->emit('change-focus');
        }
        // $validate = $this->validate([
        //     'udid'=>'unique:answers,user'
        // ]);

        // dd($this->udid);
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

        $n_title='Success';
        $n_description='Thank for your time';

        // $this->dialog()->success(
        //     $title = $n_title,
        //     $description = $n_description
        // );
        $this->notification()->success(
            $title = $n_title,
            $description = $n_description
        );
        $this->udid=null;
        $this->emit('change-focus');
    }
}
