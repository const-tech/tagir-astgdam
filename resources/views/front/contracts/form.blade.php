@extends('front.layouts.front')
@section('title', 'اضافة عقد')
@section('content')
    @livewire('contracts.contract-form',isset($id) ? ['id' => $id] : [])
@endsection
