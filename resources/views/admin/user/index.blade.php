@extends('components.layouts.app')
@section('title', 'Manajemen User')
@section('menuAdminUser', 'active')
@section('content')
    @livewire('admin.user.index')
@endsection
