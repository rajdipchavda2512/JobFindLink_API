@extends('Employee.layouts')

@section('title', 'Languages')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <div>
            <a href="{{ route('employee.dashboard') }}" class="text-yellow-600 hover:text-yellow-700">
                <i class="fas fa-arrow-left mr-1"></i> Back to Profile
            </a>
            <h1 class="text-2xl font-bold text-gray-800 mt-2">Languages</h1>
        </div>
        <button onclick="openModal('languageModal')" class="btn-yellow text-white px-4 py-2 rounded-lg font-semibold hover:shadow-lg transition">
            <i class="fas fa-plus mr-2"></i> Add Language
        </button>
    </div>
    
    <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8">
        <div class="text-center mb-6">
            <div class="w-20 h-20 gradient-bg rounded-2xl flex items-center justify-center mx-auto mb-3">
                <i class="fas fa-language text-white text-4xl"></i>
            </div>
            <h2 class="text-2xl font-bold text-gray-800">Languages Known</h2>
            <p class="text-gray-500 text-sm mt-1">Add languages you are proficient in</p>
        </div>
        
        @if($languages->count() > 0)
        <div class="flex flex-wrap gap-3 mb-6">
            @foreach($languages as $lang)
            <div class="bg-gradient-to-r from-yellow-100 to-yellow-200 text-yellow-800 px-4 py-2 rounded-full flex items-center gap-2 shadow-sm">
                <i class="fas fa-check-circle text-yellow-600"></i>
                <span class="font-medium">{{ $lang->language->name }}</span>
                <form action="{{ route('employee.language.remove', $lang->id) }}" method="POST" class="inline">
                    @csrf @method('DELETE')
                    <button type="submit" class="text-yellow-600 hover:text-yellow-800 ml-1" onclick="return confirm('Remove this language?')">
                        <i class="fas fa-times"></i>
                    </button>
                </form>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-8">
            <i class="fas fa-language text-6xl text-gray-300 mb-4"></i>
            <p class="text-gray-500">No languages added yet. Click "Add Language" to add languages you know.</p>
        </div>
        @endif
    </div>
</div>

<!-- Add Language Modal -->
<div id="languageModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 modal-overlay">
    <div class="bg-white rounded-2xl max-w-md w-full mx-4">
        <div class="p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold">Add Language</h2>
                <button onclick="closeModal('languageModal')" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
            <form action="{{ route('employee.language.add') }}" method="POST">
                @csrf
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Select Language *</label>
                    <select name="language_id" required class="w-full px-4 py-2 border-2 border-gray-200 rounded-xl focus:border-yellow-500 focus:ring-0 transition">
                        <option value="">Select Language</option>
                        @foreach($allLanguages as $language)
                        <option value="{{ $language->id }}">{{ $language->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex justify-end gap-3 mt-6">
                    <button type="button" onclick="closeModal('languageModal')" class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">Cancel</button>
                    <button type="submit" class="px-4 py-2 btn-yellow text-white rounded-lg font-semibold hover:shadow-lg">Add Language</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection