@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col s12">
        <h3>Property Management</h3>
    </div>
    <div class="col s12">
        <table class="striped highlight responsive-table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Agent</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($properties as $property)
                <tr>
                    <td>{{ $property->title }}</td>
                    <td>{{ $property->agent->name }}</td>
                    <td>{{ number_format($property->price) }} FCFA</td>
                    <td>
                        @if($property->is_approved)
                            <span class="new badge green" data-badge-caption="Approved"></span>
                        @else
                            <span class="new badge orange" data-badge-caption="Pending"></span>
                        @endif
                    </td>
                    <td>
                        @if(!$property->is_approved)
                            <form action="{{ route('admin.properties.approve', $property->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn-small green waves-effect"><i class="material-icons left">check</i>Approve</button>
                            </form>
                        @endif
                        <form id="delete-form-{{ $property->id }}" action="{{ route('admin.properties.destroy', $property->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn-small red waves-effect" onclick="confirmDelete('delete-form-{{ $property->id }}')"><i class="material-icons">delete</i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
