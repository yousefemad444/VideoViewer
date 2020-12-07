@csrf
<div class="row">
    @php $input ="name"; @endphp
    <div class="col-md-6">
        <div class="form-group">
            <label class="bmd-label-floating">Name</label>
            <input type="text" name="{{$input}}" value="{{isset($row) ? $row->{$input} : ''}}"
                   class="form-control @error($input) is-invalid @enderror" disabled>
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
            <label class="bmd-label-floating">Email</label>
            <input type="text" name="{{$input}}" value="{{isset($row) ? $row->{$input} : ''}}"
                   class="form-control @error($input) is-invalid @enderror" disabled>
            @error($input)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    @php $input ="message"; @endphp
    <div class="col-md-12">
        <div class="form-group">
            <label class="bmd-label-floating">Message</label>
            <textarea name="{{$input}}" cols="30" rows="5"
                      class="form-control @error($input) is-invalid @enderror" disabled>{{isset($row) ? $row->{$input} : ''}}</textarea>
            @error($input)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

</div>


<hr>

<h4>Replay On Message</h4>
<br>
<form method="post" action="{{route('messages.replay',$row->id)}}">
    @csrf
    @php $input ="message"; @endphp
    <div class="col-md-12">
        <div class="form-group">
            <label class="bmd-label-floating">Message</label>
            <textarea name="{{$input}}" cols="30" rows="5"
                      class="form-control @error($input) is-invalid @enderror"></textarea>
            @error($input)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <button type="submit" class="btn btn-primary pull-right">Replay</button>
    <div class="clearfix"></div>
</form>
