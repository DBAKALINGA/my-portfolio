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
@endsection