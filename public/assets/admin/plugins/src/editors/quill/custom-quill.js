let trQuillPlaceholder = document.getElementById('description_tr').getAttribute('data-placeholder');
let enQuillPlaceholder = document.getElementById('description_en').getAttribute('data-placeholder');

let quill = new Quill('#description_tr', {
    modules: {
        toolbar: [
            [{header: [1, 2, false]}],
            ['bold', 'italic', 'underline'],
            ['image', 'code-block']
        ]
    },
    placeholder: trQuillPlaceholder,
    theme: 'snow'  // or 'bubble'
});

quill.on('text-change', function(delta, oldDelta, source) {
    $('#hidden_description_tr').val(quill.container.firstChild.innerHTML);
});

let quill1 = new Quill('#description_en', {
    modules: {
        toolbar: [
            [{header: [1, 2, false]}],
            ['bold', 'italic', 'underline'],
            ['image', 'code-block']
        ]
    },
    placeholder: enQuillPlaceholder,
    theme: 'snow'  // or 'bubble'
});

quill1.on('text-change', function(delta, oldDelta, source) {
    $('#hidden_description_en').val(quill.container.firstChild.innerHTML);
});
