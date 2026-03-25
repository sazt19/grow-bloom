@extends('layouts.admin')

@section('content')
    <div style="margin-bottom:1rem;">
        <a href="{{ route('admin.plant.create') }}" class="btn btn-success">+ New Plant</a>
    </div>

    <div class="table-card">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($viewData['plants'] as $plant)
                    <tr>
                        <td>{{ $plant->getId() }}</td>
                        <td>{{ $plant->getName() }}</td>
                        <td>{{ $plant->getType() }}</td>
                        <td>${{ $plant->getPrice() }}</td>
                        <td>
                            <a href="{{ route('admin.plant.edit', $plant->getId()) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.plant.destroy', $plant->getId()) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection