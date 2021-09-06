<div class="form-group form-row">
    <div class="col-md-12">
        <label for="category_id">Category</label>
        <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
            <option selected value="{{ isset($book->category)?$book->categoryId:old('category_id') }}">{{ isset($book->category)?$book->category:'Choose...' }}</option>
            @foreach($categories as $item)
            <option value="{{ $item->category_id}}">{{ $item->name }}</option>
            @endforeach
        </select>
        @error('category_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
<div class="form-group form-row">
    <div class="col-md-12">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ isset($book->name)?$book->name:old('name') }}" class="form-control @error('name') is-invalid @enderror">
        @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
<div class="form-group form-row">
<div class="col-md-6">
        <label for="author">Author</label>
        <input type="text" name="author" id="author" value="{{ isset($book->author)?$book->author:old('author') }}" class="form-control @error('author') is-invalid @enderror">
        @error('author')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="publish_date">Publish Date</label>
        <input type="number" name="publish_date" id="publish_date" value="{{ isset($book->publish_date)?$book->publish_date:old('publish_date') }}" min="1901" max="2021" class="form-control @error('publish_date') is-invalid @enderror">
        @error('publish_date')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-success btn-lg">{{ __('Save') }}</button>
</div>