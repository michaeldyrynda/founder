@extends('errors::minimal')

@section('title', __('Server Error'))
@section('code', 500)
@section('message', __('Server Error'))

@if(app()->bound('sentry') && ! blank(Sentry::getLastEventID()))
    <script
        src="https://browser.sentry-cdn.com/6.2.3/bundle.min.js"
        integrity="sha384-n6TNefxJMUTqJauZtoDyDhAs5Ng0VzcMTy0/afmyZoVZpaQ2clYR1LBa4SqhVySs"
        crossorigin="anonymous"
    ></script>

    <script>
        Sentry.init({!! json_encode([
            'eventId' => Sentry::getLastEventID(),
            'dsn' => config('sentry.public_dsn'),
            'user' => [
                'name' => auth()->user()?->name,
                'email' => auth()->user()?->email,
            ],
        ]) !!});
    </script>
@endif
