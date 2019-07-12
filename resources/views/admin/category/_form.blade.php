<div class="form-group">
    <input type="text" class="form-control" name="title" value="{{ $category->title ?? '' }}" placeholder="Наименование категории">
</div>
<div class="form-group">
    <select name="parent_id" class="form-control">
        <option value="0">-- Без категории --</option>
        @include('admin.category._categories')
    </select>
</div>

<hr>

<button type="submin" class="btn btn-primary">Сохранить</button>