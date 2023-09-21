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
            @foreach($clients as $client)
                @if($client->detail != null)
                    <li class="bots__item bot">
                        <p class="bot__name">Компания: {{$client->detail->company}}</p>
                        @if($client->plan != null)
                            <p class="bot__name">Тарифный план:
                                @if($client->plan->type == 1)
                                    Пробный
                                @endif
                                @if($client->plan->type == 2)
                                    Базовый
                                @endif
                                @if($client->plan->type == 3)
                                    Приятель-помощник
                                @endif
                                @if($client->plan->type == 4)
                                    Внутренняя валюта
                                @endif
                                @if($client->plan->type == 5)
                                    Наставник
                                @endif
                            </p>
                        @endif
                        <a href="{{route("bots")}}" class="bot_start button">Включить/выключить бота</a>
                        <a href="" class="bot_start button">Продлить тариф</a>
                        <a href="" class="bot_start button">Удалить клиента</a>
                        <a href="" class="bot_start button">Сброс почты</a>
                        <a href="" class="bot_start button">Сброс пароля</a>
                    </li>
                @endif
            @endforeach
        </ul>
    </section>
@endsection
