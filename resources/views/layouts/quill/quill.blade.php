<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        var quill = new Quill('#editor-container', {
            modules: {
                toolbar: [
                ['bold', 'italic'],
                ['link', 'blockquote', 'code-block', 'image'],
                [{ list: 'ordered' }, { list: 'bullet' }]
                ]
            },
             ImageResize : {
             // ... 
                toolbarStyles : {
                    backgroundColor :  ' preto ' ,
                    border :  ' none ' ,
                },
            },
            placeholder: 'Compose an epic...',
            theme: 'snow'
        });
    </script>