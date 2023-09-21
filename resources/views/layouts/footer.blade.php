<style>
    .footer {
        width: 100%;

        background-color: darkslategrey;
    }
    .footer__title {
        align-self: center;
    }

    .footer__nav {
        padding: 0 20px;
        max-width: 1200px;
        margin: auto;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
    }

    .footer__block {
        width: 200px;
    }

    .footer__name {
        display: flex;
        flex-direction: column;
        margin-bottom: 0;

        color: white;
        font-weight: 700;
    }

    .footer__links {
        display: flex;
        flex-wrap: wrap;
        margin: 10px 0;
    }

    .footer a {
        color: white;
    }

    .footer__link {
        margin-right: 20px;
        margin-bottom: 10px;

        color: white;
    }
</style>

<footer class="footer">
    <nav class="footer__nav">
        <h1 class="footer__title">
            <a href="{{route("main")}}">Учебная система</a>
            <a class="footer__name" style="font-size: 14px; text-decoration: underline" href="mailto:wevioz@mail.ru">Связаться с нами</a>
        </h1>

        <div class="footer__block">
            <p class="footer__name">
                Навигация по сайту:
            </p>
            <ul class="footer__links">
                <li><a href="{{route("main")}}" class="footer__link">Главная</a></li>
{{--                <li><a href="{{route("docs", ["category" => "Теория"])}}" class="footer__link">Теория</a></li>--}}
{{--                <li><a href="{{route("docs", ["category" => "Практика"])}}" class="footer__link">Практика</a></li>--}}
{{--                <li><a href="{{route("docs", ["category" => "Тесты"])}}" class="footer__link">Тесты</a></li>--}}
            </ul>
        </div>

        <div class="footer__block">
            <p class="footer__name">
                Ютуб каналы на тему:
            </p>
            <ul class="footer__links">
                <li><a href="https://www.youtube.com/@BroCodez" class="footer__link">Bro Code</a></li>
                <li><a href="https://www.youtube.com/@freecodecamp" class="footer__link">Free Code Camp</a></li>
                <li><a href="https://www.youtube.com/@gosha_dudar" class="footer__link">Гоша Дударь</a></li>
                <li><a href="https://www.youtube.com/@Java.Brains" class="footer__link">Java Brains</a></li>
            </ul>
        </div>
    </nav>
</footer>
