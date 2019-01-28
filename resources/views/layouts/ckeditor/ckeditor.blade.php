<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
    
    CKEDITOR.replace( 'details_article',{
            filebrowserUploadUrl: '{{ route('upload',['_token' => csrf_token() ]) }}',
            skin : 'kama',
    });
</script>

    