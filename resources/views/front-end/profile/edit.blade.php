<div class="card card-nav-tabs text-left" id="profileCard" style="margin-top: 20px ;display: none">
    <div class="card-header">
        <h4>Update Profile</h4>
    </div>
    <div class="card-body">
        <form action="{{route('profile.update',$user)}}" method="post">
            <div class="row">
                @csrf
                @method('PATCH')
                @php $input ="name"; @endphp
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Name</label>
                        <input type="text" name="{{$input}}" value="{{isset($user) ? $user->{$input} : ''}}" class="form-control @error($input) is-invalid @enderror">
                        @error($input)
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                @php $input ="email"; @endphp
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Email address</label>
                        <input type="email" name="{{$input}}" value="{{isset($user) ? $user->{$input} : ''}}" class="form-control @error($input) is-invalid @enderror">
                        @error($input)
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                @php $input ="password"; @endphp
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Password</label>
                        <input type="password" name="{{$input}}" class="form-control @error($input) is-invalid @enderror">
                        @error($input)
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <button type="submit" style="margin-top: 30px" class="btn btn-info btn-round float-right">Update</button>
                </div>
                <div class="clearfix"></div>
            </div>
        </form>
    </div>
</div>



