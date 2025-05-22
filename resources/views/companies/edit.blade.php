@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Edit Company</h1>

    <form action="{{ route('companies.update', $company) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow">
        @method('PUT')
        @include('companies.form', ['company' => $company])
    </form>
@endsection
