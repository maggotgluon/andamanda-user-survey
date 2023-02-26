<div>
    <x-notifications />
    <x-dialog />
    <h2 class="text-5xl font-bold text-center">
        {{$question->Question}}
    </h2>

    <div class="{{$udid?'opacity-0':'opacity-100'}} mx-32 my-10">
        <x-input wire:model="udid" id="udid" label="Scan Wrist Band"
                placeholder="Please, scan your wrist band" autofocus/>
    </div>

    @if ($udid)
    <div class="w-full h-80 flex justify-around items-center my-16">
        <x-button  wire:click="save(1)" spinner="save" loading-delay="longest"
        class="servey-btn">
            <img src="http://placekitten.com/300/300" alt="">
        </x-button>
        <x-button  wire:click="save(2)" spinner="save" loading-delay="longest"
        class="servey-btn">
            <img src="http://placekitten.com/300/300" alt="">
        </x-button>
        <x-button  wire:click="save(3)" spinner="save" loading-delay="longest"
        class="servey-btn">
            <img src="http://placekitten.com/300/300" alt="">
        </x-button>
        <x-button  wire:click="save(4)" spinner="save" loading-delay="longest"
        class="servey-btn">
            <img src="http://placekitten.com/300/300" alt="">
        </x-button>
        <x-button  wire:click="save(5)" spinner="save" loading-delay="longest"
        class="servey-btn">
            <img src="http://placekitten.com/300/300" alt="">
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
