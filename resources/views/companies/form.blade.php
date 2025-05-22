<form method="POST" action="{{ isset($company) ? route('companies.update', $company) : route('companies.store') }}" enctype="multipart/form-data">
    @csrf
    @if(isset($company))
        @method('PUT')
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">

        <div>
            <label class="block mb-1">Name <span class="text-red-500">*</span></label>
            <input type="text" name="name" value="{{ old('name', $company->name ?? '') }}"
                class="w-full border px-3 py-2 rounded @error('name') border-red-500 @enderror">
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block mb-1">Email address</label>
            <input type="email" name="email" value="{{ old('email', $company->email ?? '') }}"
                class="w-full border px-3 py-2 rounded @error('email') border-red-500 @enderror">
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
      <div class="mb-4">
    <label class="block mb-1 font-medium">Logo (min 100x100)</label>

    <div class="flex items-center border border-gray-300 rounded overflow-hidden w-full">
        <label class="bg-gray-100 px-4 py-2 cursor-pointer text-sm font-medium text-gray-700">
            Choose File
            <input type="file" name="logo" class="hidden" onchange="previewLogo(event)">
        </label>
        <span id="file-name" class="px-3 py-2 text-gray-600 text-sm">No file chosen</span>
    </div>

    @error('logo')
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror

    <div class="mt-2">
        @if(!empty($company->logo))
            <img id="logo-preview" src="{{ asset('storage/' . $company->logo) }}" class="w-48 h-auto object-contain border rounded">
        @else
            <img id="logo-preview" class="hidden w-48 h-auto object-contain border rounded">
        @endif
    </div>
    </div>
        <div>
            <label class="block mb-1">Website</label>
            <input type="url" name="website" value="{{ old('website', $company->website ?? '') }}"
                class="w-full border px-3 py-2 rounded @error('website') border-red-500 @enderror">
            @error('website') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>


    </div>

    <button class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600">
        {{ isset($company) ? 'Update' : 'Save' }}
    </button>
</form>
<script>
    function previewLogo(event) {
        const fileInput = event.target;
        const fileName = fileInput.files[0]?.name || "No file chosen";
        const fileNameDisplay = document.getElementById('file-name');
        const preview = document.getElementById('logo-preview');

        fileNameDisplay.textContent = fileName;

        if (fileInput.files && fileInput.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
</script>
