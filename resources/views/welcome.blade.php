@extends('app.bootstrap')

@section('title','todoアプリ')

@section('content')
    <main class="container">
        <h1>セクション</h1>
        <form action="/register" method="post" class="form-inline">
            @csrf
            <div class="form-group">
                <label for="task">登録内容:</label>
                <input type="text" name="task" id="task" class="form-controll">    
            </div>
            <button type="submit" class="btn btn-primary">登録</button>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th>タスク</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @if(isset($tasks))
                    @foreach($tasks as $task)
                        <tr>
                            <td>{{ $task->title }}</td>
                            <td>
                                <form action="/complete" method="post">
                                    @csrf
                                    <input type="hidden" name="task" value="{{ $task->id }}">
                                    <button class="btn btn-success">完了</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </main>
@endsection