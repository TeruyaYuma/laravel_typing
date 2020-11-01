@extends('layouts.app')

@section('content')
    <practice-component
        title="{{ __('Practice'). '「' .$drill->title. '」' }}"
        category-name="{{$drill->category_name}}"
        :drill="{{ $drill }}" >
    </practice-component>
@endsection