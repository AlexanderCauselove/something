@extends("layouts.layout")

@section("content")
    <style>
        .form {
            display: flex;
            flex-direction: column;
            width: 350px;
            margin: 30px auto;
            align-items: center;
        }

        .form__label {
            display: flex;
            font-size: 20px;
            flex-direction: column;
        }

        .form__input {
            margin: 10px 0;
            font-size: 18px;
            border: none;
            font-family: 'Montserrat', sans-serif;
            border-bottom: 1px solid black;
        }

        .form__input:focus {
            outline: none;
        }
        .form__submit {
            margin-top: 20px;
            padding: 10px 30px;
            font-size: 20px;
            font-family: 'Montserrat', sans-serif;
        }
    </style>

    <form action="{{route("register")}}" method="post" class="form">
        @csrf
        <label for="login" class="form__label">
            Логин:
            <input type="text" name="login" id="login" class="form__input" placeholder="" value="{{old("login")}}">
        </label>
        <label for="password" class="form__label">
            Пароль:
            <input type="password" name="password" id="password" class="form__input" placeholder="" value="">
        </label>
        <button type="submit" class="form__submit button">
            Войти
        </button>
    </form>
@endsection
