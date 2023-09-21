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
            @foreach($actions as $action)
                <li class="bots__item bot">
                    <p class="bot__name">Время совершения действия: {{$action->created_at}}</p>
                    <p class="bot__name">Действие: {{$action->name}}</p>
                    <p class="bot__name">Логин менеджера: {{$action->login}}</p>
                </li>
            @endforeach
        </ul>
    </section>
@endsection
