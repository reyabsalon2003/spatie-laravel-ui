<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h4 class="mb-0">
                        <i class="fas fa-edit me-2"></i>Edit Permission
                    </h4>
                </div>
                
                <div class="card-body">
                    <form action="{{ route('Permissions.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Permission Name</label>
                            <input type="text" 
                                   name="name" 
                                   id="name" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   placeholder="Enter permission name"
                                   value="{{ old('name', $permission->name) }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="guard_web" class="form-label">Guard Name</label>
                            <input type="text" 
                                   name="guard_web" 
                                   id="guard_web" 
                                   class="form-control @error('guard_web') is-invalid @enderror" 
                                   placeholder="Enter guard name (usually 'web')"
                                   value="{{ old('guard_web', $permission->guard_web) }}">
                            @error('guard_web')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left me-1"></i> Back
                            </a>
                            <button type="submit" class="btn btn-info text-white">
                                <i class="fas fa-save me-1"></i> Update Permission
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>