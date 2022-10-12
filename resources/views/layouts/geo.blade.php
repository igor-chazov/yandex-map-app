<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no, maximum-scale=1"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap v4-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
          integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <!--DataTables-->
    <link href="/lib/datatables/jquery.dataTables.min.css" rel="stylesheet">
</head>

<body>

<style>
    .hidden {
        display: none;
    }

    body {
        background-color: whitesmoke;
    }

    #map {
        width: 50%;
        height: 700px;
        background-color: lightgrey;
    }

    #geo {
        width: 50%;
    }

    .b-shadow {
        box-shadow: 0px 10px 20px -7px rgba(32, 56, 117, 0.35);
    }

    .fs-14 {
        font-size: 14px;
    }

    .container {
        /*max-width: 1300px;*/
    }

    .geo {
        /*width: 45%;*/
    }

    .yandex-map {
    }
</style>

<div class="d-flex justify-content-end px-5 py-4 d-md-bloc">
    <div class="dropdown b-shadow">
        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
            {{ Auth::user()->name }}
        </button>
        <ul class="dropdown-menu shadow">
            <li>
                <form class="dropdown-item border=0" method="POST" action="{{ route('logout') }}">
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

    <div class="d-flex">
        <div id="geo" class="geo p-0">
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
        <div id="map" class="yandex-map p-0 ml-4 border border-light rounded-lg shadow overflow-auto">
            <script type="text/javascript" charset="utf-8" async
                    src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A2f02ea752f83a997f0b7f8f968c840a9832c4848193cce173475d6c43c6b1bf2&amp;width=560&amp;height=680&amp;lang=ru_RU&amp;scroll=true"></script>
        </div>
    </div>

</div>

<!-- jQuery и Bootstrap (включает Popper) -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
        crossorigin="anonymous"></script>
<!--DataTables-->
<script src="/lib/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<!-- Сustom Scripts -->
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
    <!--Close alert success-->
    const messageErrorEl = document.querySelector('#alert-success')
    setTimeout(function () {
        messageErrorEl.remove()
    }, 6000)
    <!--Yandex card-->

</script>
</body>
</html>
