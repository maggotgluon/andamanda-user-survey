<div class="text-white">
    <x-notifications />
    <x-dialog />
    <img src="{{asset('/assets/images/logo.png')}}" class="w-64 m-auto"/>
    <h2 class="text-5xl font-bold text-center">
        {{$question->Question}}
    </h2>

    <div class="{{$udid?'opacity-0':'opacity-100'}} mx-32 my-10">
        <x-input wire:model="udid" id="udid" label="Scan Wrist Band"
                class="text-center bg-transparent border-transparent  
                focus:ring-transparent focus:outline-none focus:border-transparent"
                placeholder="Please, scan your wrist band" autofocus/>
    </div>

    @if ($udid)
    <div class="w-full h-80 flex justify-around items-center my-16">
        <x-button  wire:click="save(1)" spinner="save" loading-delay="longest"
        class="servey-btn">
            <img src="/assets/images/score-1.png" alt="">
            <span>1</span>
            
        </x-button>
        <x-button  wire:click="save(2)" spinner="save" loading-delay="longest"
        class="servey-btn">
            <img src="/assets/images/score-2.png" alt="">
            <span>2</span>
        </x-button>
        <x-button  wire:click="save(3)" spinner="save" loading-delay="longest"
        class="servey-btn">
            <img src="/assets/images/score-3.png" alt="">
            <span>3</span>
        </x-button>
        <x-button  wire:click="save(4)" spinner="save" loading-delay="longest"
        class="servey-btn">
            <img src="/assets/images/score-4.png" alt="">
            <span>4</span>
        </x-button>
        <x-button  wire:click="save(5)" spinner="save" loading-delay="longest"
        class="servey-btn">
            <img src="/assets/images/score-5.png" alt="">
            <span>5</span>
        </x-button>
    </div>


    @endif

    @push('scripts')
    <script>
    window.livewire.on('change-focus', function () {
        alert("#udid")
            $("#udid").focus();
        });

    </script>
    @endpush
</div>
