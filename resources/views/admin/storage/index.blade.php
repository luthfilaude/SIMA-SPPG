@extends('components.layouts.app')
@section('title', 'Storage Management')
@section('menuStorage', 'active')
@section('menuStorageItem', 'active')
@section('content')
    @livewire('admin.storage.index')
@endsection
