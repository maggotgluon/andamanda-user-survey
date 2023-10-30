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
    {{-- <div>
        <span>data date</span>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>loc</th>
                        <th>count 1</th>
                        <th>count 2</th>
                        <th>count 3</th>
                        <th>count 4</th>
                        <th>count 5</th>
                        <th>count Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>location name</th>
                        <td>x (xx.xx%)</td>
                        <td>x (xx.xx%)</td>
                        <td>x (xx.xx%)</td>
                        <td>x (xx.xx%)</td>
                        <td>x (xx.xx%)</td>
                        <td>sum</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div> --}}
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

        <div  class="col-span-2">
            <table  class="border w-full">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Score</th>
                        <th>Location</th>
                        <th>Wristband</th>
                        <th>Date Create</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($answers->sortByDesc('created_at') as $ans)
                    <tr>
                        <td class="text-center">{{$ans->id}}</td>
                        <td class="text-center">{{$ans->socre}}</td>
                        <td class="text-center">
                            @switch ($ans->Location)
                            @case ('172.16.110.196')
                            Ticketing
                            @break
                            @case ('172.16.110.224')
                            LostAndFound
                            @break
                            @case ('172.16.110.246')
                            Locker
                            @break
                            @case ('172.16.110.248')
                            Retail
                            @break
                            @case ('172.16.110.249')
                            TheVillage
                            @break
                            @case ('172.16.110.244')
                            Tropical
                            @break
                            @case ('172.16.110.161')
                            EmeraldSandbar
                            @break
                            @case ('172.16.110.205')
                            Wavebar
                            @break
                            @default
                            Other
                            @endswitch
                            <!-- {{$ans->Location}} -->
                        </td>
                        <td>{{base64_encode($ans->user)}}</td>
                        <td>{{$ans->created_at->diffForHumans(Carbon\Carbon::now())}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
