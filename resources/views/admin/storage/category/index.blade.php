@extends('components.layouts.app')
@section('title', 'Management Category')
@section('menuStorageCategory', 'active')
@section('menuStorage', 'active')
@section('content')
    @livewire('admin.storage.category.index')
@endsection
