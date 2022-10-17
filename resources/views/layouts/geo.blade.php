<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no, maximum-scale=1"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap v4.6.1-->
    <link rel="stylesheet" href="/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--DataTables-->
    <link href="/lib/datatables/jquery.dataTables.min.css" rel="stylesheet">
    <link href="/lib/geo/geo.css" rel="stylesheet">
    <!--Yandex map-->
    <script
        src="https://api-maps.yandex.ru/2.1/?apikey=4606648f-7e1f-4715-9daa-96a4802d44b6&lang=ru_RU&"
        type="text/javascript"></script>
    <script src="/lib/geo/load_script.js" type="module"></script>
</head>

<body>

<style>
    .b-shadow {
        box-shadow: 0px 10px 20px -7px rgba(32, 56, 117, 0.35);
    }

    .rounded-20 {
        border-radius: 20px;
    }

    body {
        background-color: whitesmoke;
    }

    .field-group {
        width: 85%;
    }
</style>

<div class="d-flex justify-content-end px-5 py-4 d-md-bloc">
    <div class="dropdown b-shadow">
        <button class="btn btn-light btn-sm dropdown-toggle" type="button" id="dropdownMenuButton"
                data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
            {{ Auth::user()->name }}
        </button>
        <ul class="dropdown-menu shadow py-1">
            <li>
                <form class="dropdown-item btn-sm border=0" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="route('logout')" onclick="event.preventDefault();
                    this.closest('form').submit();">
                        {{ __('Выйти') }}
                    </a>
                </form>
            </li>
        </ul>
    </div>
</div>

<div class="container p-0">

    <div class="geo-wrapper d-flex">
        <div id="geo" class="geo">
            <!-- Page Heading -->
            @if (isset($header))
                <header class="header">
                    {{ $header }}
                </header>
            @endif
            <!-- Page Content -->
            <div class="content">
                {{ $slot }}
            </div>
        </div>
        <div id="map" class="yandex-map p-0 border border-light rounded-20 shadow overflow-auto"></div>
    </div>

</div>

<!-- jQuery и Bootstrap (включает Popper) -->
<script src="/lib/bootstrap/js/jquery-3.5.1.js" type="text/javascript"></script>
<script src="/lib/bootstrap/js/bootstrap.bundle.min.js" type="text/javascript"></script>></script>
<!--DataTables-->
<script src="/lib/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<!-- Сustom and DataTables Options scripts -->
<script type="text/javascript">
    $("#geo_table").DataTable({
        language: {
            "processing": "Подождите...",
            "search": "Поиск:",
            "lengthMenu": "Показать _MENU_ записей",
            "info": "Записи с _START_ до _END_ из _TOTAL_ записей",
            "infoEmpty": "Записи с 0 до 0 из 0 записей",
            "infoFiltered": "(отфильтровано из _MAX_ записей)",
            "loadingRecords": "Загрузка записей...",
            "zeroRecords": "Записи отсутствуют.",
            "emptyTable": "В таблице отсутствуют данные",
            "paginate": {
                "first": "Первая",
                "previous": "Предыдущая",
                "next": "Следующая",
                "last": "Последняя"
            },
            "aria": {
                "sortAscending": ": активировать для сортировки столбца по возрастанию",
                "sortDescending": ": активировать для сортировки столбца по убыванию"
            },
            "select": {
                "rows": {
                    "_": "Выбрано записей: %d",
                    "1": "Выбрана одна запись"
                },
                "cells": {
                    "1": "1 ячейка выбрана",
                    "_": "Выбрано %d ячеек"
                },
                "columns": {
                    "1": "1 столбец выбран",
                    "_": "%d столбцов выбрано"
                }
            },
            "searchBuilder": {
                "conditions": {
                    "string": {
                        "startsWith": "Начинается с",
                        "contains": "Содержит",
                        "empty": "Пусто",
                        "endsWith": "Заканчивается на",
                        "equals": "Равно",
                        "not": "Не",
                        "notEmpty": "Не пусто",
                        "notContains": "Не содержит",
                        "notStarts": "Не начинается на",
                        "notEnds": "Не заканчивается на"
                    },
                    "date": {
                        "after": "После",
                        "before": "До",
                        "between": "Между",
                        "empty": "Пусто",
                        "equals": "Равно",
                        "not": "Не",
                        "notBetween": "Не между",
                        "notEmpty": "Не пусто"
                    },
                    "number": {
                        "empty": "Пусто",
                        "equals": "Равно",
                        "gt": "Больше чем",
                        "gte": "Больше, чем равно",
                        "lt": "Меньше чем",
                        "lte": "Меньше, чем равно",
                        "not": "Не",
                        "notEmpty": "Не пусто",
                        "between": "Между",
                        "notBetween": "Не между ними"
                    },
                    "array": {
                        "equals": "Равно",
                        "empty": "Пусто",
                        "contains": "Содержит",
                        "not": "Не равно",
                        "notEmpty": "Не пусто",
                        "without": "Без"
                    }
                },
                "data": "Данные",
                "deleteTitle": "Удалить условие фильтрации",
                "logicAnd": "И",
                "logicOr": "Или",
                "title": {
                    "0": "Конструктор поиска",
                    "_": "Конструктор поиска (%d)"
                },
                "value": "Значение",
                "add": "Добавить условие",
                "button": {
                    "0": "Конструктор поиска",
                    "_": "Конструктор поиска (%d)"
                },
                "clearAll": "Очистить всё",
                "condition": "Условие",
                "leftTitle": "Превосходные критерии",
                "rightTitle": "Критерии отступа"
            },
            "searchPanes": {
                "clearMessage": "Очистить всё",
                "collapse": {
                    "0": "Панели поиска",
                    "_": "Панели поиска (%d)"
                },
                "count": "{total}",
                "countFiltered": "{shown} ({total})",
                "emptyPanes": "Нет панелей поиска",
                "loadMessage": "Загрузка панелей поиска",
                "title": "Фильтры активны - %d",
                "showMessage": "Показать все",
                "collapseMessage": "Скрыть все"
            },
            "thousands": ",",
            "buttons": {
                "pageLength": {
                    "_": "Показать 10 строк",
                    "-1": "Показать все ряды"
                },
                "pdf": "PDF",
                "print": "Печать",
                "collection": "Коллекция <span class=\"ui-button-icon-primary ui-icon ui-icon-triangle-1-s\"><\/span>",
                "colvis": "Видимость столбцов",
                "colvisRestore": "Восстановить видимость",
                "copy": "Копировать",
                "copyKeys": "Нажмите ctrl or u2318 + C, чтобы скопировать данные таблицы в буфер обмена.  Для отмены, щелкните по сообщению или нажмите escape.",
                "copySuccess": {
                    "1": "Скопирована 1 ряд в буфер обмена",
                    "_": "Скопировано %ds рядов в буфер обмена"
                },
                "copyTitle": "Скопировать в буфер обмена",
                "csv": "CSV",
                "excel": "Excel"
            },
            "decimal": ".",
            "infoThousands": ",",
            "autoFill": {
                "cancel": "Отменить",
                "fill": "Заполнить все ячейки <i>%d<i><\/i><\/i>",
                "fillHorizontal": "Заполнить ячейки по горизонтали",
                "fillVertical": "Заполнить ячейки по вертикали"
            },
            "datetime": {
                "previous": "Предыдущий",
                "next": "Следующий",
                "hours": "Часы",
                "minutes": "Минуты",
                "seconds": "Секунды",
                "unknown": "Неизвестный",
                "amPm": [
                    "AM",
                    "PM"
                ],
                "months": {
                    "0": "Январь",
                    "1": "Февраль",
                    "10": "Ноябрь",
                    "11": "Декабрь",
                    "2": "Март",
                    "3": "Апрель",
                    "4": "Май",
                    "5": "Июнь",
                    "6": "Июль",
                    "7": "Август",
                    "8": "Сентябрь",
                    "9": "Октябрь"
                },
                "weekdays": [
                    "Вс",
                    "Пн",
                    "Вт",
                    "Ср",
                    "Чт",
                    "Пт",
                    "Сб"
                ]
            },
            "editor": {
                "close": "Закрыть",
                "create": {
                    "button": "Новый",
                    "title": "Создать новую запись",
                    "submit": "Создать"
                },
                "edit": {
                    "button": "Изменить",
                    "title": "Изменить запись",
                    "submit": "Изменить"
                },
                "remove": {
                    "button": "Удалить",
                    "title": "Удалить",
                    "submit": "Удалить",
                    "confirm": {
                        "_": "Вы точно хотите удалить %d строк?",
                        "1": "Вы точно хотите удалить 1 строку?"
                    }
                },
                "multi": {
                    "restore": "Отменить изменения",
                    "title": "Несколько значений",
                    "noMulti": "Это поле должно редактироватся отдельно, а не как часть групы"
                },
                "error": {
                    "system": "Возникла системная ошибка (<a target=\"\\\" rel=\"nofollow\" href=\"\\\">Подробнее<\/a>)"
                }
            },
            "searchPlaceholder": "Что ищете?"
        }
    });
    <!--Auto close alert success-->
    const alertSuccessEl = document.querySelector('#alert-success')

    if (alertSuccessEl) {
        console.log(alertSuccessEl.children);
        setTimeout(function () {
            alertSuccessEl.remove()
        }, 6000)
    }
</script>

</body>
</html>
