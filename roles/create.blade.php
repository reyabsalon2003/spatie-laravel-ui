<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">
                        <i class="fas fa-user-shield me-2"></i> Create New Role
                    </h4>
                </div>
                
                <div class="card-body">
                    <form action="{{ route('roles.store') }}" method="POST">
                        @csrf

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="form-label">Role Name</label>
                                    <input type="text" 
                                           name="name" 
                                           id="name" 
                                           class="form-control @error('name') is-invalid @enderror" 
                                           placeholder="example: editor"
                                           value="{{ old('name') }}">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="guard_name" class="form-label">Guard Name</label>
                                    <input type="text" 
                                           name="guard_name" 
                                           id="guard_name" 
                                           class="form-control" 
                                           placeholder="example: web" 
                                           value="web" 
                                           readonly>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <h5 class="mb-3">
                                <i class="fas fa-key me-2"></i> Assign Permissions
                            </h5>
                            
                            @error('permissions')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            
                            <div class="row">
                                @foreach ($setPermissions as $setPermission)
                                    <div class="col-md-4 mb-2">
                                        <div class="form-check">
                                            <input class="form-check-input" 
                                                   type="checkbox" 
                                                   name="permissions[]" 
                                                   id="permission-{{ $setPermission->id }}" 
                                                   value="{{ $setPermission->id }}"
                                                   {{ in_array($setPermission->id, old('permissions', [])) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="permission-{{ $setPermission->id }}">
                                                {{ $setPermission->name }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i> Create Role
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>