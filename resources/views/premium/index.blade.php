@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Solutions Premium</h1>

    <div class="grid grid-cols-4 gap-6">
        @foreach($premiums as $premium)
            <div class="p-4 bg-white shadow rounded">
                <h2 class="text-lg font-bold">{{ $premium->title }}</h2>
                <p>{{ Str::limit($premium->description, 100) }}</p>
                <a href="{{ route('premium.show', $premium->id) }}" class="text-blue-500">Voir plus</a>
            </div>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $premiums->links() }}
    </div>
</div>
@endsection
