

@extends('dashboard._form')

@section('form')
  <form class="form-control" method="POST" action="{{ route('dashboard.update',$url->id) }}">
@endsection

@section('method')
@method('PUT')
@endsection

