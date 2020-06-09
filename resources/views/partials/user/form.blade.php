<div class="form-group">
    <label for="user_name">Имя</label>
    @if(isset($user->name))
        <input type="text" class="form-control" id="user_name" name="name" required value="{{$user->name}}">
    @else
        <input type="text" class="form-control" id="user_name" name="name" required>
    @endif
</div>
<div class="form-group">
    <label for="user_surname">Фамилия</label>
    @if(isset($user->surname))
        <input type="text" class="form-control" id="user_surname" name="surname" required value="{{$user->surname}}">
    @else
        <input type="text" class="form-control" id="user_surname" name="surname" required>
    @endif
</div>
<div class="form-group">
    <label for="user_patronymic">Отчество</label>
    @if(isset($user->patronymic))
        <input type="text" class="form-control" id="user_patronymic" name="patronymic" value="{{$user->patronymic}}">
    @else
        <input type="text" class="form-control" id="user_patronymic" name="patronymic">
    @endif
</div>
<div class="form-group position-relative">
    <label for="current_city">Город</label>
    @if(isset($user->current_city))
        <input type="text" class="form-control" id="current_city" name="current_city" required value="{{$user->current_city}}">
    @else
        <input type="text" class="form-control" id="current_city" name="current_city" required>
    @endif
    <div id="cities_list" class="position-absolute"></div>
</div>
<div class="form-group">
    <label for="user_email">Email</label>
    @if(isset($user->email))
        <input type="email" class="form-control" id="user_email" name="email" required value="{{$user->email}}">
    @else
        <input type="email" class="form-control" id="user_email" name="email" required>
    @endif
</div>

{{--<form action="{{route('users')}}" id="find_city">--}}
{{--    <div class="form-group position-relative m-0">--}}
{{--        <label for="current_city">Город</label>--}}
{{--        <input id='current_city' type="text" placeholder="Введите название города" value="{{request('city')}}"name='city'>--}}

{{--    </div>--}}
{{--</form>--}}
