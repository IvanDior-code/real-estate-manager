@extends('layouts.agent')

@section('content')
<div class="row">
    <div class="col s12">
        <h3>My Properties</h3>
        <a href="{{ route('agent.properties.create') }}" class="btn blue">Add Property</a>
    </div>
    <div class="col s12">
        <table class="striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($properties as $property)
                <tr>
                    <td>{{ $property->title }}</td>
                    <td>{{ $property->category->name ?? 'None' }}</td>
                    <td>{{ number_format($property->price) }} FCFA</td>
                    <td>
                        <a href="{{ route('agent.properties.edit', $property->id) }}" class="btn-small orange"><i class="material-icons">edit</i></a>
                        <!-- Delete Form -->
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
