@extends('layout.layout')

@section('content')
<div class="container pt-4">
    <h1>Notes for {{ $group->name }}</h1>
    <a href="{{ route('notes.create', $group->uuid) }}" class="btn btn-primary mb-3">Create Note</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($notes as $note)
            <tr>
                <td>{{ $note->title }}</td>
                <td>{{ $note->content }}</td>
                <td>
                    @if(auth()->user()->role === 'admin' || auth()->user()->role === 'mentor')
                    <a href="{{ route('notes.edit', $note->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('notes.destroy', $note->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection