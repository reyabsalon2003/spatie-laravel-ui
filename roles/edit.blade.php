

<form action="{{route('roles.update', $role->id)}} " method="POST">
    @csrf
    @method('PUT')

    <label for="name">Name</label>
    <input type="text" name="name" id="" placeholder="example: editor" value="{{$role->name}}">
    <br>
    <label for="guard_name">Guard name</label>
    <input type="text" name="guard_name" id="" placeholder="example: web" value="{{$role->guard_name}}" readonly>

    <p>Edit Assigned Permissions</p>
       
    @foreach ($permissions as $permit)
        <input type="checkbox" name="permissions[]" value="{{ $permit->id }}" {{ in_array($permit->id, old('permissions', $rolePermission)) ? 'checked' : '' }}> 
        <label for="">{{ $permit->name }}</label>
    @endforeach
    
    <button type="submit">Submit</button>
</form>

