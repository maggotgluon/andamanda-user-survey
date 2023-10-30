<div>
    <div class="flex gap-2 ">
        <x-native-select
            label="Year"
            placeholder="Select Year"
            :options="$list['year']"
            wire:model="date.year"
        />
        <div class="flex flex-col justify-between">
        <x-toggle label="Month" wire:model="date.monthMode" />
        @if ($date['monthMode'])
            <x-native-select
                
                placeholder="Select Month"
                :options="[
                    ['name'=>'January', 'value'=>1],
                    ['name'=>'February', 'value'=>2],
                    ['name'=>'March', 'value'=>3],
                    ['name'=>'April', 'value'=>4],
                    ['name'=>'May', 'value'=>5],
                    ['name'=>'June', 'value'=>6],
                    ['name'=>'July', 'value'=>7],
                    ['name'=>'August', 'value'=>8],
                    ['name'=>'September', 'value'=>9],
                    ['name'=>'October', 'value'=>10],
                    ['name'=>'November', 'value'=>11],
                    ['name'=>'December', 'value'=>12],
                ]"
                option-label="name"
                option-value="value"
                wire:model="date.month"
            />
        @endif
    </div>
<div class="ml-auto">
    <x-button label="Download Summery" wire:click="exportDataSum" />
    <x-button label="Download Raw Data"  wire:click="exportDataAll" />
</div>
        

    </div>
    <h2 class="text-center text-4xl p-2 mt-4">Summery Data</h2>
    <p class="text-sm py-4"> Data from {{$dateStart->format('l jS \\ F Y')}}{{$dateStart!==$dateEnd?' - '.$dateEnd->format('l jS \\ F Y'):''}}</p>
        <div class="min-h-screen">
            @isset ($data)
            <table class="w-full">
                <thead>
                    <tr>
                        <th class="border w-2/12">Location</th>
                        <th class="border w-2/12">Average<br> Score</th>
                        <th class="border w-1/12">Excellent <span class="block text-xs">(5)</span></th>
                        <th class="border w-1/12">Good <span class="block text-xs">(4)</span></th>
                        <th class="border w-1/12">Acceptable <span class="block text-xs">(3)</span></th>
                        <th class="border w-1/12">Poor <span class="block text-xs">(2)</span></th>
                        <th class="border w-1/12">Unacceptable <span class="block text-xs">(1)</span></th>
                        <th class="border w-2/12">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key=>$rec)
                    @if ($key!=='total')
                        <tr>
                            <th class="border">{{$key}}</th>
                            <td class="text-center border">{{$rec['avg']}}</td>
                            <td class="text-center border">{{$rec['score_5']}} <span class="text-xs">({{$rec['percentile_5']}}%)</span></td>
                            <td class="text-center border">{{$rec['score_4']}} <span class="text-xs">({{$rec['percentile_4']}}%)</span></td>
                            <td class="text-center border">{{$rec['score_3']}} <span class="text-xs">({{$rec['percentile_3']}}%)</span></td>
                            <td class="text-center border">{{$rec['score_2']}} <span class="text-xs">({{$rec['percentile_2']}}%)</span></td>
                            <td class="text-center border">{{$rec['score_1']}} <span class="text-xs">({{$rec['percentile_1']}}%)</span></td>
                            <td class="text-center border">{{$rec['total']}}</td>
                        </tr>
                    @endif
                    @endforeach
                    <tr>
                        <th class="border">TOTAL</th>
                        <th class="border">{{$data['total']['avg']}}</th>
                        <th class="border">{{$data['total']['score_5']}}</th>
                        <th class="border">{{$data['total']['score_4']}}</th>
                        <th class="border">{{$data['total']['score_3']}}</th>
                        <th class="border">{{$data['total']['score_2']}}</th>
                        <th class="border">{{$data['total']['score_1']}}</th>
                        <th class="border">{{$data['total']['total']}}</th>
                    </tr>
                </tbody>
            </table>

            <div class="grid grid-cols-3">
                @foreach ($data as $location=>$data)
                    <div class="h-52 {{$location=='total'?'col-span-3 max-h-80':''}}">
                        {{ $location}}
                    <livewire:livewire-pie-chart 
                        key="{{ $chartModel[$location]->reactiveKey() }}"
                        :pie-chart-model="$chartModel[$location]"
                    />    </div>
                @endforeach
                
            </div>
            <h2 class="text-center text-4xl p-2 mt-16">Raw Data</h2>
            <p class="text-sm py-2"> Data from {{$dateStart->format('l jS \\ F Y')}}{{$dateStart!==$dateEnd?' - '.$dateEnd->format('l jS \\ F Y'):''}}</p>
            <div class="flex gap-2 py-4">
                <x-native-select
                    label="Show"
                    placeholder="Selected"
                    :options="['5','15','25','50','100','show all']"
                    wire:model="pagination.show"
                />
                <x-native-select
                    label="Location"
                    placeholder="Selected"
                    :options="$list['location']"
                    wire:model="pagination.location"
                />
                {{-- {{$pagination['location']}} --}}


                <div class="ml-auto">
                    <x-button label="Download Raw Data"  wire:click="exportDataAll" />
                </div>
            </div>
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
                    @foreach($raw->sortByDesc('created_at') as $ans)
                    <tr>
                        <td class="text-center">{{$ans->id}}</td>
                        <td class="text-center">{{$ans->socre}}</td>
                        <td class="text-center">
                            {{-- {{dd($ans->Location)}} --}}
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
            
            @if(get_class($raw)=='Illuminate\Pagination\LengthAwarePaginator')
            <div class="my-4">
            {{ $raw->links() }}
            </div>
            @endif
            @else
            no data
            @endisset
        </div>

        <div>

            
        </div>
</div>
