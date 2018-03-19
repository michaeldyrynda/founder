@extends('errors::layout')

@section('title', 'Error')

@section('message', 'Whoops, looks like something went wrong.')

@if(app()->bound('sentry') && !empty(Sentry::getLastEventID()))
    <div class="subtitle">Error ID: {{ Sentry::getLastEventID() }}</div>

    <!-- Sentry JS SDK 2.1.+ required -->
    <script src="https://cdn.ravenjs.com/3.3.0/raven.min.js"></script>

    <script>
        Raven.showReportDialog({!! json_encode([
            'eventId' => Sentry::getLastEventID(),
            'dsn' => config('sentry.public_dsn'),
            'user' => [
                'name' => optional(auth()->user())->name,
                'email' => optional(auth()->user())->email,
            ],
        ]) !!});
    </script>
@endif
