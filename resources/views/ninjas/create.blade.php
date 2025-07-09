@extends('components.layout')

@section('content')
<div class="container mx-auto px-4 py-8">
  <div class="max-w-2xl mx-auto">
    <h2 class="text-3xl font-bold text-gray-100 mb-6">Créer un Nouveau Ninja</h2>

    <div class="bg-gray-900 rounded-lg shadow-md p-6 border border-gray-700">
      <form action="{{ route('ninjas.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- ninja Name -->
        <div>
          <label for="name" class="block text-sm font-medium text-gray-300 mb-2">Nom du Ninja:</label>
          <input 
            type="text" 
            id="name" 
            name="name"
            value="{{ old('name') }}"
            required
            class="w-full px-3 py-2 border border-gray-700 bg-gray-800 text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-red-700 focus:border-transparent"
          >
        </div>

        <!-- ninja Strength -->
        <div>
          <label for="skill" class="block text-sm font-medium text-gray-300 mb-2">Niveau de Compétence (0-100):</label>
          <input 
            type="number" 
            id="skill" 
            name="skill"
            value="{{ old('skill') }}"
            min="0"
            max="100"
            required
            class="w-full px-3 py-2 border border-gray-700 bg-gray-800 text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-red-700 focus:border-transparent"
          >
        </div>

        <!-- ninja Bio -->
        <div>
          <label for="bio" class="block text-sm font-medium text-gray-300 mb-2">Biographie:</label>
          <textarea
            rows="5"
            id="bio" 
            name="bio" 
            required
            class="w-full px-3 py-2 border border-gray-700 bg-gray-800 text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-red-700 focus:border-transparent"
          >{{ old('bio') }}</textarea>
        </div>

        <!-- dojo name -->
        <div>
          <label for="dojo_name" class="block text-sm font-medium text-gray-300 mb-2">Nom du Dojo:</label>
          <input 
            type="text" 
            id="dojo_name" 
            name="dojo_name"
            value="{{ old('dojo_name') }}"
            required
            placeholder="Ex: Dojo du Dragon Rouge"
            class="w-full px-3 py-2 border border-gray-700 bg-gray-800 text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-red-700 focus:border-transparent"
          >
        </div>

        <!-- image upload -->
        <div>
          <label for="image" class="block text-sm font-medium text-gray-300 mb-2">Image du Ninja (noir & blanc, max 2Mo):</label>
          <input type="file" id="image" name="image" accept="image/*"
                 class="w-full px-3 py-2 border border-gray-700 bg-gray-800 text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-red-700 focus:border-transparent" />
        </div>

        <!-- histoire -->
        <div>
          <label for="story" class="block text-sm font-medium text-gray-300 mb-2">Histoire immersive :</label>
          <textarea
            rows="7"
            id="story" 
            name="story"
            placeholder="Raconte ici l'histoire complète de ce ninja..."
            class="w-full px-3 py-2 border border-gray-700 bg-gray-800 text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-red-700 focus:border-transparent"
          >{{ old('story') }}</textarea>
        </div>

        <!-- validation errors -->
        @if ($errors->any())
          <div class="bg-red-900 border border-red-700 rounded-md p-4">
            <ul class="list-disc list-inside text-red-300">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <div class="flex justify-between items-center">
          <a href="{{ route('ninjas.index') }}" 
             class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800 transition">
            Annuler
          </a>
          
          <button type="submit" class="bg-red-700 text-white px-6 py-2 rounded hover:bg-red-800 transition shadow-lg">
            Créer le Ninja
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection