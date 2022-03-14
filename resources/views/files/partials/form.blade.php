<input type="button" class="btn btn-primary" value="Загрузить файлы" onclick="handleFilesUploadForm(event)">
<input type="file" class="invisible" name="files[]" id="filesInput" multiple>
<script>
    function handleFilesUploadForm(event)
    {
        event.preventDefault();
        let filesInput = document.querySelector('#filesInput');
        filesInput.click();
        filesInput.addEventListener('change', function() {
            document.querySelector('form#filesForm').submit();
        });
    }
</script>
