<x-geo-layout>



    <x-slot name="header">
        <h2>{{ auth()->user()->name }}, добро пожаловать <br>
                                      в "Яндекс Карты"</h2>
    </x-slot>

    <div class="row mt-5" data-activePage="show">
        <div class="add-geo col-12">
            <a href="/geos" class="btn btn-primary py-2 b-shadow" id="create-new-geo">Открыть приложение</a>
        </div>
    </div>


</x-geo-layout>
