<x-geo-layout>

    <x-slot name="header">
        <h2>Добавить запись</h2>
    </x-slot>

    <div class="geo-card mt-5" id="geo-map" data-activeId="{{ auth()->user()->id }}" data-activePage="create">
        <div class="card-content">
            <form name="createForm" class="card-form" method="POST" action="{{ route('geos.store') }}">
                @csrf
                <div class="form-group field-group mb-0">
                    <label class="p-2 mb-0" for="name">Название</label>
                    <div>
                        <input type="text" class="form-control" id="name" name="name"
                               placeholder="Введите название">
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group field-group mb-0">
                    <label class="p-2 mb-0" for="longitude">Долгота</label>
                    <div>
                        <input type="text" class="form-control" id="longitude" name="longitude"
                               placeholder="XX.XXXXXX">
                        @if ($errors->has('longitude'))
                            <span class="text-danger">{{ $errors->first('longitude') }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group field-group mb-0">
                    <label class="p-2 mb-0" for="Latitude">Широта</label>
                    <div>
                        <input type="text" class="form-control" id="Latitude" name="Latitude"
                               placeholder="XX.XXXXXX">
                        @if ($errors->has('Latitude'))
                            <span class="text-danger">{{ $errors->first('Latitude') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group mt-4">
                    <a class="btn btn-secondary mr-2 py-2 b-shadow" href="/geos">Назад</a>
                    <button type="submit" class="btn btn-primary py-2 b-shadow" id="save-geo">Сохранить</button>
                </div>
            </form>
        </div>
    </div>

</x-geo-layout>
