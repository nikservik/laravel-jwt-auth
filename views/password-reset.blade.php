@extends('laraveljwtauth::layout')
{{-- subject('Изменение пароля') --}}
@section('preheader')
    @lang('laraveljwtauth::password-reset.preheader')
@endsection
@section('content')
    @include('laraveljwtauth::parts.line', ['text' => __('laraveljwtauth::password-reset.hello', ['name' => $user->name])])
    @include('laraveljwtauth::parts.line', ['text' => __('laraveljwtauth::password-reset.line1', ['app' => __('app.name')])])
    @include('laraveljwtauth::parts.line', ['text' => __('laraveljwtauth::password-reset.line2')])
    @include('laraveljwtauth::parts.button', ['text' => __('laraveljwtauth::password-reset.button'), 'link' => config('app.url').'/remind/new?token='.$token.'&email='.$user->email])
    @include('laraveljwtauth::parts.line', ['text' => __('laraveljwtauth::password-reset.line3')])
    @include('laraveljwtauth::parts.line', ['text' => __('laraveljwtauth::password-reset.signature', ['name' => __('app.name')])])
@endsection
