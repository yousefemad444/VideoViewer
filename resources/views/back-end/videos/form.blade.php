@csrf
<div class="row">
    @php $input ="name"; @endphp
    <div class="col-md-6">
        <div class="form-group">
            <label class="bmd-label-floating">Video Name</label>
            <input type="text" name="{{$input}}" value="{{isset($row) ? $row->{$input} : ''}}"
                   class="form-control @error($input) is-invalid @enderror">
            @error($input)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    @php $input ="meta_keywords"; @endphp
    <div class="col-md-6">
        <div class="form-group">
            <label class="bmd-label-floating">Meta Keywords</label>
            <input type="text" name="{{$input}}" value="{{isset($row) ? $row->{$input} : ''}}"
                   class="form-control @error($input) is-invalid @enderror">
            @error($input)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    @php $input ="youtube"; @endphp
    <div class="col-md-6">
        <div class="form-group">
            <label class="bmd-label-floating">Youtube Url</label>
            <input type="url" name="{{$input}}" value="{{isset($row) ? $row->{$input} : ''}}"
                   class="form-control @error($input) is-invalid @enderror">
            @error($input)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    @php $input ="published"; @endphp
    <div class="col-md-6">
        <div class="form-group">
            <label class="bmd-label-floating">Video Status</label>
            <select name="{{$input}}"  class="form-control @error($input) is-invalid @enderror">
                <option value="1" {{isset($row) && $row->{$input} == 1 ? 'selected':''}}>published</option>
                <option value="0" {{isset($row) && $row->{$input} == 0 ? 'selected':''}}>hidden</option>
            </select>
            @error($input)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    @php $input ="category_id"; @endphp
    <div class="col-md-6">
        <div class="form-group">
            <label class="bmd-label-floating">Video Category</label>
            <select name="{{$input}}"  class="form-control @error($input) is-invalid @enderror">
                @foreach($categories as $category)
                    <option value="{{$category->id}}" {{isset($row) && $row->{$input} == $category->id ? 'selected':''}}>{{$category->name}}</option>
                @endforeach
            </select>
            @error($input)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    @php $input ="image"; @endphp
    <div class="col-md-6">
        <div>
            <label class="bmd-label-floating">Video Image</label>
            <input type="file" name="{{$input}}" class="form-control">
            @error($input)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    @php $input ="skills[]"; @endphp
    <div class="col-md-6">
        <div class="form-group">
            <label class="bmd-label-floating">Video Skills</label>
            <select name="{{$input}}"  class="form-control @error($input) is-invalid @enderror" multiple style="height: 100px">
                @foreach($skills as $skill)
                    <option value="{{$skill->id}}" {{in_array($skill->id,$selectedSkills) ? 'selected' : ''}}>{{$skill->name}}</option>
                @endforeach
            </select>
            @error($input)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    @php $input ="tags[]"; @endphp
    <div class="col-md-6">
        <div class="form-group">
            <label class="bmd-label-floating">Video Tags</label>
            <select name="{{$input}}"  class="form-control @error($input) is-invalid @enderror" multiple style="height: 100px">
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}" {{in_array($tag->id,$selectedTags) ? 'selected' : ''}}>{{$tag->name}}</option>
                @endforeach
            </select>
            @error($input)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    @php $input ="desc"; @endphp
    <div class="col-md-12">
        <div class="form-group">
            <label class="bmd-label-floating">Video Description</label>
            <textarea name="{{$input}}" cols="30" rows="5"
                      class="form-control @error($input) is-invalid @enderror">{{isset($row) ? $row->{$input} : ''}}</textarea>
            @error($input)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    @php $input ="meta_desc"; @endphp
    <div class="col-md-12">
        <div class="form-group">
            <label class="bmd-label-floating">Meta Description</label>
            <textarea name="{{$input}}" cols="30" rows="2"
                      class="form-control @error($input) is-invalid @enderror">{{isset($row) ? $row->{$input} : ''}}</textarea>
            @error($input)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>
