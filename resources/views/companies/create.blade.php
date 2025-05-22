@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Add Company</h1>

    <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow">
        @include('companies.form')
    </form>
@endsection
