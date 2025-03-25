<table>
    <tr>
        <th>id</th>
        <th>name</th>
        <th>guard_web</th>
        <th>Actions</th>
        <th><a href="{{ route('permissions.create') }}">create permission</a></th>
    </tr>
    @foreach ($permissions as $permission)
        <tr>
          
            <td>{{ $permission->name }}</td>
            <td>{{ $permission->guard_web }}</td>
            <td><a href="{{ route('permissions.edit', $permission->id) }}">Edit</a>
            
            <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
            </td>

        </tr>
    @endforeach
</table>