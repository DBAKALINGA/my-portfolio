@extends('layouts.admin')

@section('content')

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa-solid fa-circle-check me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<!-- SEHEMU YA RATINGS / TESTIMONIALS -->
<div class="card mb-5">
    <div class="card-header bg-white py-3">
        <h5 class="m-0 fw-bold text-primary">
            <i class="fa-solid fa-star text-warning me-2"></i>Usimamizi wa Ratings na Maoni
        </h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Jina</th>
                        <th>Email</th>
                        <th>Stars</th>
                        <th>Maoni</th>
                        <th>Status</th>
                        <th>Vitendo</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($ratings as $rating)
                        <tr>
                            <td class="fw-bold">{{ $rating->name }}</td>
                            <td>{{ $rating->email }}</td>
                            <td>
                                <span class="text-warning">
                                    {{ str_repeat('⭐', $rating->stars) }}
                                </span>
                            </td>
                            <td>{{ $rating->review }}</td>
                            <td>
                                @if($rating->is_approved)
                                    <span class="badge bg-success">Approved</span>
                                @else
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @endif
                            </td>
                            <td>
                                @if(!$rating->is_approved)
                                    <form action="{{ route('admin.ratings.approve', $rating->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button class="btn btn-sm btn-success">
                                            <i class="fa-solid fa-check"></i> Approve
                                        </button>
                                    </form>
                                @endif

                                <form action="{{ route('admin.ratings.delete', $rating->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Una uhakika unataka kufuta?')">
                                        <i class="fa-solid fa-trash"></i> Futa
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">Hakuna rating yoyote kwa sasa.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- SEHEMU YA CONTACT MESSAGES -->
<div class="card">
    <div class="card-header bg-white py-3">
        <h5 class="m-0 fw-bold text-dark">
            <i class="fa-solid fa-envelope me-2"></i>Jumbe Kutoka Contact Form
        </h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Jina</th>
                        <th>Email</th>
                        <th>Ujumbe</th>
                        <th>Tarehe</th>
                        <th>Kitendo</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($messages as $msg)
                        <tr>
                            <td class="fw-bold">{{ $msg->name }}</td>
                            <td>{{ $msg->email }}</td>
                            <td>{{ $msg->message }}</td>
                            <td>{{ $msg->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <form action="{{ route('admin.messages.delete', $msg->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Futa ujumbe huu?')">
                                        <i class="fa-solid fa-trash"></i> Futa
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted">Hakuna ujumbe uliotumwa.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection