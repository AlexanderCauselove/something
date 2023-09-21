<style>
    .alerts {
        width: 350px;
        margin: 20px auto;
        padding: 20px;
        background-color: mintcream;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;

        border-radius: 10px;
    }

    .alerts__list {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .alerts__error {
        color: red;
    }
</style>

@if($errors->any())
    <div class="alerts">
        <ul class="alerts__list">
            @foreach($errors->all() as $error)
                <li class="alerts__error">{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session("message"))
    <div class="alerts">
        <p class="alerts__message">{{session("message")}}</p>
    </div>
@endif

@if(session("error"))
    <div class="alerts">
        <p class="alerts__error">{{session("error")}}</p>
    </div>
@endif
