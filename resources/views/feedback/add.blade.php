@extends('layouts.master')
@section('title')
    Add Feedback
@endsection
@section('content')
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        @livewire('feedback.add')
    </div>
@endsection
