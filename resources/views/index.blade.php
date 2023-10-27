<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    @isset($tasks)
        @if (count($tasks) > 0)
            @foreach ($tasks as $task)
                <a href="{{ route('tasks.show', [$task->id - 1]) }}">
                    <h1>{{ $task->title }}</h1>
                    <h4>{{ $task->description }}</h4>
                </a>
            @endforeach
        @else
            <h1>There are no tasks</h1>
        @endif
    @endisset
</body>

</html>