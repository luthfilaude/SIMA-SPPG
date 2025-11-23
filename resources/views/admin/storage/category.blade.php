@extends('components.layouts.app')
@section('title', 'Management Category')
@section('menuStorageCategory', 'active')
@section('menuStorageCategories', 'active')
@section('content')
    @livewire('admin.storage.category.index')
@endsection
