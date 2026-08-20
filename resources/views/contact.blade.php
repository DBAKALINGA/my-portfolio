@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2>Contact Me</h2>

    <!-- Onyesha Success Message ikifanikiwa -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('contact.submit') }}" method="POST">
        @csrf {{-- DIRECTIVE MUHIMU: Inalinda fomu dhidi ya CSRF attacks --}}

        <div class="mb-3">
            <label for="name" class="form-label">Jina Lako</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Barua Pepe (Email)</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Ujumbe</label>
            <textarea name="message" id="message" rows="4" class="form-control">{{ old('message') }}</textarea>
            @error('message')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Send Message</button>
    </form>
</div>
<div class="my-5 p-4 border rounded bg-light">
    <h3>Acha Rating au Maoni Yako</h3>

    @if(session('success_rating'))
        <div class="alert alert-success">
            {{ session('success_rating') }}
        </div>
    @endif

    <form action="{{ route('rating.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Jina Lako</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Chagua Stars (1 - 5)</label>
            <select name="stars" class="form-select">
                <option value="5">⭐⭐⭐⭐⭐ (5 - Bora Sana)</option>
                <option value="4">⭐⭐⭐⭐ (4 - Nzuri)</option>
                <option value="3">⭐⭐⭐ (3 - Wastani)</option>
                <option value="2">⭐⭐ (2 - Mbaya)</option>
                <option value="1">⭐ (1 - Mbaya Sana)</option>
            </select>
            @error('stars') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Maoni Yako (Review)</label>
            <textarea name="review" rows="3" class="form-control">{{ old('review') }}</textarea>
            @error('review') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn btn-warning">Tuma Rating</button>
    </form>
</div>
@endsection