{{-- resources/views/employee/educations.blade.php --}}
@extends('Frontend.employee.layouts')

@section('title', 'Education')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-yellow-50 to-orange-50 py-8 px-4">
    <div class="max-w-4xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <div>
                <a href="{{ route('employee.dashboard') }}" class="inline-flex items-center text-yellow-600 hover:text-yellow-700 font-semibold">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to Profile
                </a>
                <h1 class="text-3xl font-bold text-gray-800 mt-2">My Education</h1>
                <p class="text-gray-500 mt-1">Manage your educational qualifications</p>
            </div>
            <a href="{{ route('employee.education.create') }}" 
               class="inline-flex items-center gap-2 bg-gradient-to-r from-yellow-500 to-orange-600 text-white px-6 py-3 rounded-xl font-semibold hover:shadow-lg transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Add New Education
            </a>
        </div>
        
        <div class="space-y-4">
            @forelse($educations as $education)
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition">
                <div class="p-6">
                    <div class="flex justify-between items-start">
                        <div class="flex-1">
                            <!-- Header with icon and level -->
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 bg-gradient-to-r from-yellow-500 to-orange-600 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <div class="flex flex-wrap items-center gap-2 mb-2">
                                        <h3 class="text-xl font-bold text-gray-800">{{ $education->education_level }}</h3>
                                    </div>
                                    
                                    <?php 
                                    $educationsData = is_string($education->educations_data) ? json_decode($education->educations_data, true) : $education->educations_data;
                                    ?>
                                    
                                   @if($educationsData && is_array($educationsData))
    @foreach($educationsData as $eduData)
        @if(isset($eduData['college']) && !in_array($eduData['level'], ['Below 10th', '10th']))
        <div class="mb-3 pl-4 border-l-2 border-yellow-400">
            <p class="font-semibold text-gray-800">{{ $eduData['college'] ?? '' }}</p>
            @if(isset($eduData['degree_name']) && $eduData['degree_name'])
            <p class="text-sm text-gray-600">{{ $eduData['degree_name'] }}</p>
            @endif
            @if(isset($eduData['specialization']) && $eduData['specialization'])
            <p class="text-sm text-gray-500">Specialization: {{ $eduData['specialization'] }}</p>
            @endif
            @if(isset($eduData['passing_year']) && $eduData['passing_year'])
            <p class="text-xs text-gray-400">Passing Year: {{ $eduData['passing_year'] }}</p>
            @endif
        </div>
        @endif
    @endforeach
@endif
                                    
                                    <div class="mt-2">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            {{ $education->education_level }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex gap-2 ml-4">
                            <a href="{{ route('employee.education.edit', $education->id) }}" 
                               class="p-2 text-blue-500 hover:text-blue-700 hover:bg-blue-50 rounded-lg transition"
                               title="Edit">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </a>
                            <form action="{{ route('employee.education.delete', $education->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this education? This action cannot be undone.')">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" 
                                        class="p-2 text-red-500 hover:text-red-700 hover:bg-red-50 rounded-lg transition"
                                        title="Delete">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="bg-white rounded-3xl shadow-lg p-12 text-center">
                <div class="w-24 h-24 bg-gradient-to-r from-yellow-100 to-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-12 h-12 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">No Education Added Yet</h3>
                <p class="text-gray-500 mb-6 max-w-md mx-auto">Add your educational qualifications to enhance your profile and attract more employers.</p>
                <a href="{{ route('employee.education.create') }}" 
                   class="inline-flex items-center gap-2 bg-gradient-to-r from-yellow-500 to-orange-600 text-white px-6 py-3 rounded-xl font-semibold hover:shadow-lg transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Add Your Education
                </a>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection