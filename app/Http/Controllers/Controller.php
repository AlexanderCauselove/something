<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Bot;
use App\Models\Detail;
use App\Models\Document;
use App\Models\Statistic;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

//The main controller, that consists of the main project logic
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    function main() {
        return view("main");
    }
    function login(Request $request) {
        if ($_POST) {
            if(Auth::attempt(["password" => $request->password, "login" => $request->login])) {
                return redirect()->route("main")->with("message", "Авторизация прошла успешно");
            } else {
                return redirect()->back()->with("error", "Неверный логин или пароль");
            }
        }

        $title = "Авторизация";

        return view("user.login", compact("title"));
    }

    function register(Request $request) {
        if ($_POST) {
            $rules = [
                "login" => "required|unique:users",
                "password" => "required"
            ];

            $messages = [
                "login.required" => "Поле Логин является обязательным",
                "password.required" => "Поле Пароль является обязательным",
                "login.unique" => "Пользователь с данным логином уже существует",
                "password.confirmed" => "Поля паролей не совпадают",
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            $validator->validate();

            $user = User::query()->create([
                "login" => $request->login,
                "login" => Auth::getName(),
            ]);

            Auth::login($user);

            $request->session()->put("login", $request->login);

            Action::query()->create([
                "name" => "Авторизация",
                "login" => $request->session()->get("login"),
            ]);

            return redirect()->route("main")->with("message", "Регистрация прошла успешно");
        }

        $title = "Регистрация";

        return view("user.register", compact("title"));
    }

    function logout() {
//        dd(Auth::user());

        Action::query()->create([
            "name" => "Выход из аккаунта",
            "login" => $request->session()->get("login"),
        ]);

        Auth::logout();

        return redirect()->route("main")->with("message", "Успешный выход из аккаунта");
    }

    function bots(Request $request) {
        if ($_POST) {
        }

        $title = "Управление ботами";

        $bots = Bot::query()->get();

        return view("bots", compact("title", "bots"));
    }

    function startBot(Request $request) {
        $id = $request->route("id");

        $bot = Bot::query()->where("id", "=", $id)->get()[0];

        $bot->update([
            "status" => "true",
            "start_time" => Carbon::now(),
        ]);

        Action::query()->create([
            "name" => "Запуск бота",
            "login" => $request->session()->get("login"),
        ]);

        return redirect()->route("bots")->with("message", "Бот был запущен");
    }

    function stopBot(Request $request) {
        $id = $request->route("id");

        $bot = Bot::query()->where("id", "=", $id)->get()[0];

        $bot->update([
            "status" => "false",
            "start_time" => null,
        ]);

        Action::query()->create([
            "name" => "Остановка бота",
            "login" => $request->session()->get("login"),
        ]);

        return redirect()->route("bots")->with("message", "Бот был остановлен");
    }

    function createBot(Request $request) {
        $id = $request->route("id");
        $name = $request->route("name");

        $bot = Bot::query()->where("id", "=", $id)->get()[0];

        Bot::query()->create([
            "name" => $name,
            "start_time" => null,
            "status" => "false",
            "user_id" => $id
        ]);

        Action::query()->create([
            "name" => "Создание бота",
            "login" => $request->session()->get("login"),
        ]);

        return redirect()->route("bots")->with("message", "Бот был создан");
    }

    function deleteBot(Request $request) {
        $id = $request->route("id");

        $bot = Bot::query()->where("id", "=", $id)->get()[0]->delete();

        Action::query()->create([
            "name" => "Удаление бота",
            "login" => $request->session()->get("login"),
        ]);

        return redirect()->route("bots")->with("message", "Бот был удален");
    }

    function clients(Request $request) {
        $title = "Управление клиентами";

        $clients = User::query()->get();

        return view("clients", compact("title", "clients"));
    }

    function actions(Request $request) {
        $title = "Управление клиентами";

        $actions = Action::query()->get();

        return view("actions", compact("title", "actions"));
    }
}
