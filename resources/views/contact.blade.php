@extends('layouts.app')

@section('title', 'Nipigie / Nitumie Ujumbe')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            
            <!-- GOOGLE BLUE CARD DESIGN -->
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden" style="border-top: 5px solid #1a73e8 !important; background-color: #ffffff;">
                
                <!-- CARD HEADER -->
                <div class="card-body p-4 p-md-5">
                    <div class="text-center mb-4">
                        <div class="mb-2">
                            <i class="fa-solid fa-paper-plane text-primary fs-1"></i>
                        </div>
                        <h3 class="fw-bold text-dark m-0">Nitumie Ujumbe</h3>
                        <p class="text-muted small mt-1">Jaza fomu hii hapa chini na nitakujibu haraka iwezekanavyo.</p>
                    </div>

                    <!-- SUCCESS ALERT -->
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show border-0 rounded-3 shadow-sm mb-4" role="alert" style="background-color: #34a853; color: #ffffff;">
                            <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <!-- CONTACT FORM -->
                    <form action="{{ route('contact.submit') }}" method="POST">
                        @csrf {{-- DIRECTIVE MUHIMU: Inalinda fomu dhidi ya CSRF attacks --}}

                        <!-- NAME INPUT -->
                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold text-dark small">
                                <i class="fa-regular fa-user me-1 text-muted"></i> Jina Lako
                            </label>
                            <input type="text" 
                                   name="name" 
                                   id="name" 
                                   class="form-control rounded-3 p-2.5 @error('name') is-invalid @enderror" 
                                   value="{{ old('name') }}" 
                                   placeholder="Ingiza jina lako kamili">
                            
                            @error('name')
                                <div class="invalid-feedback small fw-semibold">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- EMAIL INPUT -->
                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold text-dark small">
                                <i class="fa-regular fa-envelope me-1 text-muted"></i> Barua Pepe (Email)
                            </label>
                            <input type="email" 
                                   name="email" 
                                   id="email" 
                                   class="form-control rounded-3 p-2.5 @error('email') is-invalid @enderror" 
                                   value="{{ old('email') }}" 
                                   placeholder="mfano@gmail.com">
                            
                            @error('email')
                                <div class="invalid-feedback small fw-semibold">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- MESSAGE INPUT -->
                        <div class="mb-4">
                            <label for="message" class="form-label fw-semibold text-dark small">
                                <i class="fa-regular fa-comment-dots me-1 text-muted"></i> Ujumbe Wako
                            </label>
                            <textarea name="message" 
                                      id="message" 
                                      rows="4" 
                                      class="form-control rounded-3 p-2.5 @error('message') is-invalid @enderror" 
                                      placeholder="Andika ujumbe wako hapa...">{{ old('message') }}</textarea>
                            
                            @error('message')
                                <div class="invalid-feedback small fw-semibold">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- SUBMIT BUTTON -->
                        <button type="submit" class="btn btn-primary w-100 py-2.5 fw-bold rounded-3 shadow-sm" style="background-color: #1a73e8; border: none;">
                            <i class="fa-solid fa-paper-plane me-1"></i> Tuma Ujumbe (Send Message)
                        </button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection