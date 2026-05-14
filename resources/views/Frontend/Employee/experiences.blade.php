{{-- resources/views/employee/experiences.blade.php --}}
@extends('Frontend.employee.layouts')

@section('title', 'Work Experience')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <div>
            <a href="{{ route('employee.dashboard') }}" class="text-yellow-600 hover:text-yellow-700">
                <i class="fas fa-arrow-left mr-1"></i> Back to Profile
            </a>
            <h1 class="text-2xl font-bold text-gray-800 mt-2">Work Experience</h1>
        </div>
        <a href="{{ route('employee.experience.create') }}" class="bg-gradient-to-r from-yellow-500 to-yellow-600 text-white px-4 py-2 rounded-lg font-semibold hover:shadow-lg transition">
            <i class="fas fa-plus mr-2"></i> Add Experience
        </a>
    </div>
    
    <div class="space-y-4">
        @forelse($experiences as $exp)
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <div class="flex justify-between items-start">
                <div class="flex-1">
                    <div class="flex items-center gap-2 mb-2">
                        <div class="w-10 h-10 bg-gradient-to-r from-blue-800 to-blue-900 rounded-lg flex items-center justify-center">
                            <i class="fas fa-building text-yellow-400"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg">{{ $exp->company_name }}</h3>
                            <p class="text-sm text-gray-600">{{ ucfirst($exp->employment_type) }}</p>
                        </div>
                    </div>
                    
                    <div class="ml-12">
                        @if($exp->industry_sector)
                        <p class="text-sm text-gray-600 mb-1">{{ $exp->industry_sector }}</p>
                        @endif
                        <p class="text-xs text-gray-500">
                            {{ date('M Y', strtotime($exp->start_date)) }} - 
                            {{ $exp->currently_working ? 'Present' : date('M Y', strtotime($exp->end_date)) }}
                        </p>
                        @if($exp->notice_period)
                        <p class="text-xs text-gray-400 mt-1">Notice Period: {{ $exp->notice_period }}</p>
                        @endif
                    </div>
                </div>
                
                <div class="flex gap-2">
                    <a href="{{ route('employee.experience.edit', $exp->id) }}" 
                       class="text-blue-500 hover:text-blue-600 p-2">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('employee.experience.delete', $exp->id) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-600 p-2" onclick="return confirm('Delete this experience?')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="bg-white rounded-2xl shadow-lg p-12 text-center">
            <i class="fas fa-briefcase text-6xl text-gray-300 mb-4"></i>
            <h3 class="text-xl font-semibold text-gray-700 mb-2">No Work Experience Added</h3>
            <p class="text-gray-500 mb-4">Add your work experience to showcase your professional journey</p>
            <a href="{{ route('employee.experience.create') }}" class="bg-gradient-to-r from-yellow-500 to-yellow-600 text-white px-6 py-2 rounded-lg inline-block">
                Add Work Experience
            </a>
        </div>
        @endforelse
    </div>
</div>
@endsection