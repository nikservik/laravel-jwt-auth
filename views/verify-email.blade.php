@extends('laraveljwtauth::layout')
@section('preheader')
    {{ __('laraveljwtauth::verify-email.preheader', ['app' => __('app.name')]) }}
@endsection
@section('content')
    @include('laraveljwtauth::parts.line', ['text' => __('laraveljwtauth::verify-email.hello', ['name' => $user->name])])
    @include('laraveljwtauth::parts.line', ['text' => __('laraveljwtauth::verify-email.line1', ['app' => __('app.name')])])
    @include('laraveljwtauth::parts.line', ['text' => __('laraveljwtauth::verify-email.line2')])
    @include('laraveljwtauth::parts.button', ['text' => __('laraveljwtauth::verify-email.button'), 'link' => $verificationUrl])
    @include('laraveljwtauth::parts.line', ['text' => __('laraveljwtauth::verify-email.line3')])
    @include('laraveljwtauth::parts.line', ['text' => __('laraveljwtauth::verify-email.signature', ['name' => __('app.name')])])
@endsection