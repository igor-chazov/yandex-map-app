<x-geo-layout>

    <div class="session-success" style="height: 65px">
        @if(session()->get('success'))
            <div class="alert alert-success mb-3 shadow" id="alert-success">
                {{ session()->get('success') }}
                <button type="button" class="close" aria-label="Закрыть">
                    <span onclick="this.parentElement.parentElement.remove()" aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>

    <x-slot name="header">
        <h2>Список геолокаций</h2>
    </x-slot>

    <div class="row">
        <div class="add-geo col-12">
            <a href="/geos/create" class="btn btn-success py-2 b-shadow" id="create-new-geo">Добавить геолокацию</a>
        </div>
    </div>
    <div class="row mt-3" data-activeId="{{ auth()->user()->id }}" data-activePage="geos">
        <div class="table-responsive col-12">
            <table id="geo_table" class="table table-striped table-bordered p-0">
                <thead>
                <tr class="text-center">
                    <th>Название</th>
                    <th>Долгота</th>
                    <th>Широта</th>
                    <th class="text-center">Редактирование</th>
                </tr>
                </thead>
                <tbody>
                @foreach($geos as $geo)
                    <tr class="table" data-objectId="{{ $geo->id }}">
                        <td class="align-middle">{{ $geo->name }}</td>
                        <td class="align-middle">{{ $geo->longitude }}</td>
                        <td class="align-middle">{{ $geo->Latitude }}</td>
                        <td class="d-flex justify-content-end">
                            <a href="{{ route('geos.edit', $geo->id) }}"
                               class="btn btn-info geo-btn py-2 me-6 b-shadow">Изменить</a>
                            <form method="POST" action="{{ route('geos.destroy', $geo->id) }}" class="ms-3">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger geo-btn py-2 px-3 ml-2 b-shadow" type="submit"
                                        name="destroy">Удалить
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

</x-geo-layout>
