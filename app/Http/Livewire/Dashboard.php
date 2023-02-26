<?php

namespace App\Http\Livewire;

use App\Models\Answer;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Asantibanez\LivewireCharts\Models\RadarChartModel;
use Asantibanez\LivewireCharts\Models\TreeMapChartModel;
use Carbon\Carbon;
use Livewire\Component;

class Dashboard extends Component
{
    public $average;
    public $types = ['1', '2', '3', '4', '5'];

    public $colors = [
        '1' => '#f6ad55',
        '2' => '#fc8181',
        '3' => '#90cdf4',
        '4' => '#66DA26',
        '5' => '#cbd5e0',
    ];
    public function render()
    {
        $answer = Answer::whereIn('questions_id',[1])->orderBy('socre', 'desc')->get();
        $now = new Carbon();
        // dd($answer->where('created_at','like','2023-02-24%'),$now);
        $this->average = round($answer->average('socre'),2);
        $columnChartModel=$answer->groupBy('socre')
            ->reduce(function ($columnChartModel, $data){
                $type = $data->first()->socre;
                $value = $data->count();
                // dd($type,$value);
                return $columnChartModel->addColumn($type, $value, $this->colors[$type]);
            },LivewireCharts::columnChartModel()
                ->setTitle('count by score')
                ->setAnimated(true)
                ->setLegendVisibility(false)

                ->setColors(['#b01a1b', '#d41b2c', '#ec3c3b', '#f66665'])
                ->setColumnWidth(40)
                ->withGrid()
            );
        // dd($columnChartModel->data[0]);
        return view('livewire.dashboard')
            ->with([
                'columnChartModel' => $columnChartModel,
                'answers'=>$answer
                // 'pieChartModel' => $pieChartModel,
                // 'lineChartModel' => $lineChartModel,
                // 'areaChartModel' => $areaChartModel,
                // 'multiLineChartModel' => $multiLineChartModel,
                // 'multiColumnChartModel' => $multiColumnChartModel,
                // 'radarChartModel' => $radarChartModel,
                // 'treeChartModel' => $treeChartModel,
            ]);
    }
}
