@extends('layouts.master')

@section('title', 'Home')

@section('content')

<!-- Hero Section -->
<section class="bg-blue-50 py-24">
    <div class="max-w-6xl mx-auto px-6 text-center">
        <h1 class="text-5xl font-bold text-blue-900 leading-tight">Welcome to M Hospital</h1>
        <p class="mt-6 text-lg text-gray-700 max-w-2xl mx-auto">We combine advanced medical expertise with compassion to serve every patient with dignity and care.</p>
       
    </div>
</section>

<!-- Services Section -->
<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-center text-blue-800 mb-12">Our Core Services</h2>
        <div class="grid gap-8 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            @include('components.card', ['icon' => '🧠', 'title' => 'Neurology', 'desc' => 'Advanced brain & nervous system care.'])
            @include('components.card', ['icon' => '🩺', 'title' => 'General Checkups', 'desc' => 'Complete diagnostics and health screenings.'])
            @include('components.card', ['icon' => '🧬', 'title' => 'Genetics', 'desc' => 'Precise diagnosis through DNA testing.'])
        </div>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-blue-800 mb-12 text-center">Our Hospital Departments</h2>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            @foreach ($departments as $department)
                <div class="bg-white shadow rounded overflow-hidden text-center">
                    <img src="{{ asset('storage/' . $department->image) }}"
                         alt="{{ $department->name }}"
                         class="w-full h-[200px] object-cover">

                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-blue-700">{{ $department->name }}</h3>
                        <p class="text-gray-600 text-sm mt-2">{{ Str::limit($department->description, 80) }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>



<!-- Doctor Highlights -->
<div class="overflow-x-auto">
    <div class="flex gap-6 w-max px-1">
        @foreach ($doctors as $doctor)
            <div class="shrink-0 w-72">
                @include('components.doctor-card', [
                    'name' => $doctor->name,
                    'specialty' => $doctor->specialty,
                    'image' => 'storage/' . $doctor->photo
                ])
            </div>
        @endforeach
    </div>
</div>


@endsection
