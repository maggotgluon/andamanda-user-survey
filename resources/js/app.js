import './bootstrap';

import Alpine from 'alpinejs';
import ApexCharts from 'apexcharts'

window.Alpine = Alpine;

Alpine.start();
console.log('alpine start')
Livewire.on('change-focus', function() {
    //alert('fff ');
})
