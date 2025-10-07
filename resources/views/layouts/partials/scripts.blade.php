@vite(['resources/js/app.js'])
@vite(['public/js/app.js'])
@vite('resources/js/charts/orders.js')

<script src="{{ asset('/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('/vendors/tinymce/tinymce.min.js') }}"></script>


<script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>

<!-- Подключаем ApexCharts через CDN -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

@livewireScripts
<script src="{{ asset('/js/main.js') }}"></script>

{{ $script ?? '' }}
