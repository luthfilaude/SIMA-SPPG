@extends('components.layouts.app')
@section('title', 'Management Supplier')
@section('menuStorageSupplier', 'active')
@section('menuStorage', 'active')
@section('content')
    @livewire('admin.storage.supplier.index')
@endsection
