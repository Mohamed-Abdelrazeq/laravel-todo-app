@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Add Task')

@section('content')
    <form method="POST" action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset
        <div class="mb-4">
            <label for="title">
                Title
            </label>
            <input @class(['border-red-500' => $errors->has('title')]) type="text" name="title" id="title"
                value="{{ $task->title ?? old('title') }}" />
            @error('title')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" id="description">
                Description
            </label>
            <textarea @class(['border-red-500' => $errors->has('description')]) name="description" id="description">{{ $task->description ?? old('description') }}</textarea>
            @error('description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="long_description" id="long_description" rows="5">
                Long Description
            </label>
            <textarea @class(['border-red-500' => $errors->has('long_description')]) name="long_description" id="long_description" rows="15">{{ $task->long_description ?? old('long_description') }}</textarea>
            @error('long_description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>


        <div class="flex items-center gap-4 mt-4">
            <button class="action-btn" type="submit">
                @isset($task)
                    Update Task
                @else
                    Add Task
                @endisset
            </button>
            <a href="{{ route('tasks.index') }}" class="link">Cancel</a>
        </div>
    </form>


@endsection
