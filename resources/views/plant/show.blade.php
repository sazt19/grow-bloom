@extends('layouts.app')

@section('content')
    <h1>{{ $viewData['title'] }}</h1>

    <div class="detail-card">
        <p><span class="detail-label">Name:</span>{{ $viewData['plant']->getName() }}</p>
        <p><span class="detail-label">Type:</span>{{ $viewData['plant']->getType() }}</p>
        <p><span class="detail-label">Price:</span>${{ $viewData['plant']->getPrice() }}</p>
        <p><span class="detail-label">Caution:</span>{{ $viewData['plant']->getCaution() }}</p>
        <p><span class="detail-label">Description:</span>{{ $viewData['plant']->getDescription() }}</p>
        <p><span class="detail-label">Image:</span>{{ $viewData['plant']->getImage() }}</p>
        <p><span class="detail-label">Created:</span>{{ $viewData['plant']->getFormattedDate() }}</p>
        <br>
        <a href="{{ route('plant.index') }}" class="btn btn-green">← Back</a>
    </div>
@endsection