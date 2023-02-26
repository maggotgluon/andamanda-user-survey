<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <h1>Dashboard</h1>
    <!-- <x-card class="flex gap-4 items-end">
        <x-native-select
            label="Select Question"
            placeholder="Select one status"
            :options="['Active', 'Pending', 'Stuck', 'Done']"
            wire:model="model"
        />
        <x-input type="date" wire:model="model" label="Date" />

        <x-button rounded warning icon="x" label="Clear" />
    </x-card> -->
    <div class="grid grid-cols-2 my-8 gap-4">
        <div  class="">
            <x-card title="Average Score">
                <span class="text-9xl text-center inline">
                    {{$average}}
                </span>
            </x-card>
        </div>

        <div  class="">
            <x-card title="Count of it!">
                <livewire:livewire-column-chart key="{{ $columnChartModel->reactiveKey() }}" :column-chart-model="$columnChartModel"/>
            </x-card>
        </div>


        <div  class="col-span-2">

            <x-card title="Data!">
            <table class="border w-full">
                <thead>
                    <tr>
                        <th class="bg-slate-200">
                        Score
                        </th>
                        <th class="bg-slate-200">
                        count number
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $columnChartModel->data as $data )
                    <tr>
                        <td>
                        {{$data['title']}}
                        </td>
                        <td>
                        {{$data['value']}}
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
            </x-card>
        </div>
        <!-- <div class="col-span-4">
            pass data<br>
            <ul>
                @foreach ($answers as $answer)
                    <li>{{$answer->created_at}} : {{$answer->socre}}</li>
                @endforeach
            </ul>

        </div> -->
    </div>
</div>
