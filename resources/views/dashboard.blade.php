<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-6 text-gray-900">
                    <livewire:dashboard/>
                </div>
            </div>

            <!-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-6 text-gray-900">
                    {{ __("Question Form") }}
                    <form method="post" action="{{ route('question.create') }}" class="mt-6 space-y-6">
                        @csrf
                        <x-input-label for="question" :value="__('Question')" />
                        <x-text-input id="question" name="question" type="text" class="mt-1 block w-full" :value="old('question')" required />
                        <x-input-error class="mt-2" :messages="$errors->get('question')" />

                        <x-toggle label="status" wire:model.defer="status"/>

                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                    </form>
                </div>
            </div> -->

            <!-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-6 text-gray-900">
                    {{ __("All Question") }}
                    <ul>
                        @foreach (App\Models\Question::all() as $question)
                        <li>{{$question->Question}} : status {{$question->status==1?'on':'off'}}

                            <x-toggle id="{{$question->id}}" label="status" wire:model.defer="$question->status"/>

                        </li>
                        @endforeach
                    </ul>

                </div>
            </div> -->

            <!-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-6 text-gray-900">
                    {{ __("Answer Summery") }}
                    <br>
                    total : {{App\Models\Answer::where('questions_id',2)->count()}}
                    <br>
                    avg : {{App\Models\Answer::where('questions_id',2)->avg('socre')}}
                    <br>
                </div>
            </div> -->
        </div>
    </div>
</x-app-layout>
