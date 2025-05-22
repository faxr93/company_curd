@extends('layouts.app')

@section('content')
 <div class="mb-4">
    <h1 class="text-2xl font-bold mb-2">Companies</h1>
    <a href="{{ route('companies.create') }}" class="inline-block bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600">
        Add New Company
    </a>
</div>


    <table class="w-full table-auto bg-white shadow rounded">
        <thead>
            <tr class="bg-gray-200 text-left">

                <th class="p-2">Name</th>
                <th class="p-2">Email</th>
                <th class="p-2">Website</th>
                <th class="p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($companies as $company)
                <tr class="border-b">
                    <td class="p-2">
                        <div class="flex items-center space-x-3">
                            @if($company->logo)
                                <img src="{{ asset('storage/' . $company->logo) }}" alt="Logo" class="w-12 h-12 object-contain rounded">
                            @endif
                            <span>{{ $company->name }}</span>
                        </div>
                    </td>
                    <td class="p-2">{{ $company->email }}</td>
                    <td class="p-2">{{ $company->website }}</td>
                    <td class="p-2">
                        <a href="{{ route('companies.edit', $company) }}" class="text-blue-600 hover:underline mr-2">Edit</a>
                        <form action="{{ route('companies.destroy', $company) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this company?')">
                            @csrf @method('DELETE')
                            <button class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="p-4 text-center">No companies found.</td></tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $companies->links() }}
    </div>
@endsection
