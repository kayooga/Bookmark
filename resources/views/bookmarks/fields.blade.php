<!-- Validation Errors -->
<x-auth-validation-errors class="mb-4" :errors="$errors" />

<div class="form-group row">
    <label for="inputTitle" class="col-sm-2 col-form-label">タイトル</label>
    <div class="col-sm-10">
        <input type="text" name="title" value="{{ $bookmark->title ?? '' }}" class="form-control" id="inputTitle">
    </div>
</div>

<div class="form-group row">
    <label for="inputUrl" class="col-sm-2 col-form-label">URL</label>
    <div class="col-sm-10">
        <input type="text" name="url" value="{{ $bookmark->url ?? '' }}" class="form-control" id="inputUrl">
    </div>
</div>

<div class="form-group row">
    <label for="inputDescription" class="col-sm-2 col-form-label">説明文</label>
    <div class="col-sm-10">
        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="inputDescription" rows="5">{{ $bookmark->description ?? '' }}</textarea>
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">保存</button>
        <a href="{{ route('bookmarks.index') }}" class="btn btn-secondary">一覧へ戻る</a>
    </div>
</div>