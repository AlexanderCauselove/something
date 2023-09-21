@extends("layouts.layout")
@section("content")
    <style>
        .bots {
            width: 1336px;
            margin: auto;
        }

        .bots__list {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .bot {
            margin: 10px;
            padding: 10px;
            border: 1px solid black;
            border-radius: 20px;
        }

        .button {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>

    <section class="bots">
        <ul class="bots__list">
            @foreach($bots as $bot)
            <li class="bots__item bot">
                <p class="bot__name">Название бота: {{$bot->name}}</p>
                <p class="bot__status">Статус бота: {{$bot->status == "true" ? "Включен" : "Выключен"}}</p>
                @if($bot->status == "true")
                    <p class="bot__start_time">Время запуска: {{$bot->start_time}}</p>
                    <a href="{{route("stopBot", ["id" => $bot->id])}}" class="bot_start button">Остановить бота</a>
                @else
                    <a href="{{route("startBot", ["id" => $bot->id])}}" class="bot_start button">Запустить бота</a>
                @endif
                <a href="" class="bot_start button">Администрирование бота</a>
                <a href="" class="bot_start button">Изменить настройки бота</a>
                <a href="{{route("deleteBot", ["id" => $bot->id])}}" class="bot_start button">Удалить бота</a>
                <a href="{{route("createBot", ["id" => $bot->id, "name" => $bot->name])}}" class="bot_start button bot__create">Создать бота</a>
                <a href="" class="bot_start button">Сброс пароля бота</a>
            </li>
            @endforeach
        </ul>
{{--        <div class="bot__creation">--}}
{{--            <form action="" method="post"></form>--}}
{{--        </div>--}}
    </section>

    <script>
        let createBotButton = document.querySelector(".bot__create");

        createBotButton.addEventListener("click", evt => {

        })
    </script>
@endsection
