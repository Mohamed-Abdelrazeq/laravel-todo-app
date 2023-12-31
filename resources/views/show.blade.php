@extends('layouts.app')

@section('title', $task->title)

@section('content')
    <div class="mb-4">
        <a class="link" href="{{ route('tasks.index') }}">
            ← Tasks
        </a>
    </div>

    <p class="mb-4 text-slate-700">{{ $task->description }}</p>

    @if ($task->long_description)
        <p class="mb-4 text-slate-700">{{ $task->long_description }}</p>
    @endif

    <p class="mb-4 text-sm text-slate-5 00">
        Created {{ $task->created_at->diffForHumans() }} · Updated {{ $task->updated_at->diffForHumans() }}
    </p>

    <p>
        @if ($task->completed)
            <span class="font-medium text-green-500">Completed</span>
        @else
            <span class="font-medium text-red-500">Not completed</span>
        @endif

    <div class="mb-4 mt-4 flex gap-2">
        <a class="action-btn" href="{{ route('tasks.edit', ['task' => $task]) }}">Edit</a>

        <form action="{{ route('tasks.toggle-completed', ['task' => $task]) }}" method="POST">
            @csrf
            @method('PUT')
            <button class="action-btn" type="submit">Mark as
                {{ $task->completed ? 'not completed' : 'completed' }}</button>
        </form>

        <form action="{{ route('tasks.destroy', ['task' => $task]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="action-btn" type="submit">Delete</button>
        </form>
    </div>

@endsection
