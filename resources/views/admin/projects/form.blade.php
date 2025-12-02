@extends('admin.layouts.admin')
@section('title', 'اضافة مشروع')
@section('content')
@livewire('admin.projects.project-form',['id' => isset($id) ? $id : null])
@endsection