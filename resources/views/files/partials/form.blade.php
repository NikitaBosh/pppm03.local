    @can("admin")
    <div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" name="file[]" id="inputFile" multiple>
        <label class="custom-file-label" for="inputFile">Выберите файлы</label>
    </div>
    <div class="input-group-append"> 
        <button class="btn btn-primary" type="submit">Загрузить</button>
    </div>
</div>
@endcan