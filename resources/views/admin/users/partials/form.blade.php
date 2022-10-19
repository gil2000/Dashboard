@csrf
<div class="row mb-2">
    <div class="col-md-12">
        <div class="form-floating mb-1 mb-md-0">
            <input name="name" class="form-control @error('name') is-invalid @enderror" id="inputName" type="text" placeholder="Enter your name"
                   value="{{ old('name') }}@isset($user){{ $user->name }}@endisset" />
            <label for="inputName">Name</label>
            @error('name')
            <span class="invalid-feedback" role="alert">
                                                            {{ $message }}
                                                        </span>
            @enderror
        </div>
    </div>
</div>
<div class="form-floating mb-2">
    <input name="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail" type="email" placeholder="name@example.com"
           value="{{ old('email') }}@isset($user){{ $user->email }}@endisset" />
    <label for="inputEmail">Email address</label>
    @error('email')
    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
    @enderror
</div>
@isset($create)
<div class="mb-2">
    <div class="col-md-12">
        <div class="form-floating">
            <input name="password" class="form-control @error('password') is-invalid @enderror" id="inputPassword" type="password" placeholder="Create a password" />
            <label for="inputPassword">Password</label>
            @error('password')
            <span class="invalid-feedback" role="alert">
                                                                {{ $message }}
                                                            </span>
            @enderror
        </div>
    </div>
</div>
<div class="mb-2">
    <div class="col-md-12">
        <div class="form-floating">
            <input name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" type="password" placeholder="Confirm the password" />
            <label for="password_confirmation">Confirm Password</label>
            @error('password_confirmation')
            <span class="invalid-feedback" role="alert">
                                                                {{ $message }}
                                                            </span>
            @enderror
        </div>
    </div>
</div>
@endisset
<div class="">
    @foreach($roles as $role)
        <div class="form-check">
            <input class="form-check-input" name="roles[]" type="checkbox" value="{{ $role->id }}" id="{{ $role->name }}"
                @isset($user) @if(in_array($role->id, $user->roles->pluck('id')->toArray())) checked @endif @endisset">
            <label class="form-check-label" for="{{ $role-> name }}">{{ $role->name }}</label>
        </div>
    @endforeach
</div>
<div class="mt-4 mb-0">
    <div class="d-grid"><button type="submit" class="btn btn-primary"> Submit </button></div>
</div>
