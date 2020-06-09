@extends('layouts.app')
@section('title', 'Пользователи')

@section('content')
    <div class="icons_user">
        <ul class="row list-unstyled">
            <li class="col-3 text-center">
                <a href="{{ route('user.create') }}">
                    <i class="fa fa-dashboard"></i>
                    <p>Добавить пользователя</p>
                </a>
            </li>
            <li>
                <form action="{{route('users')}}" id="find_user_by_fio">
                    <div class="form-group">
                        <label for="fio_user">Поиск: </label>
                        <input id='fio_user' type="text" placeholder="Введите ФИО" value="{{request('fio')}}"name='fio'>
                        <button type="submit" class="btn-link border-0 bg-transparent">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </div>
                </form>
            </li>
        </ul>
    </div>

    <div class="users_list">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Имя</th>
                <th scope="col">Фамилия</th>
                <th scope="col">Отчество</th>
                <th scope="col">Email</th>
                <th scope="col">
                    <form action="{{route('users')}}" id="find_city">
                        <div class="form-group position-relative m-0">
                            <label for="current_city">Город</label>
                            <input id='current_city' type="text" placeholder="Введите название города" value="{{request('city')}}"name='city'>
                            <div id="cities_list" class="position-absolute"></div>
                        </div>
                    </form>
                </th>
                <td></td>
                <td></td>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->surname }}</td>
                    <td>{{ $user->patronymic }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->current_city }}</td>
                    <td><a href="{{ route('user.edit', $user->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
                    <td>
                        <form onsubmit=" if(confirm('Удалить?')){ return true} else {return false}" action=" {{ route('user.destroy', $user) }} " method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-link border-0 bg-transparent">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{ $users->links() }}
@endsection
