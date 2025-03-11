let trQuillPlaceholder = document.getElementById('description_tr').getAttribute('data-placeholder');
let enQuillPlaceholder = document.getElementById('description_en').getAttribute('data-placeholder');

const toolbarOptions = [
    ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
    ['blockquote'],
    ['link'],
    [{ 'list': 'ordered'}, { 'list': 'bullet' }, { 'list': 'check' }],
    [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent

    [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

    [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
    [{ 'font': [] }],
    [{ 'align': [] }],

    ['clean']                                         // remove formatting button
];

let quill = new Quill('#description_tr', {
    modules: {
        toolbar: toolbarOptions
    },
    placeholder: trQuillPlaceholder,
    theme: 'snow'  // or 'bubble'
});

quill.on('text-change', function(delta, oldDelta, source) {
    $('#hidden_description_tr').val(quill.container.firstChild.innerHTML);
});

let quill1 = new Quill('#description_en', {
    modules: {
        toolbar:toolbarOptions
    },
    placeholder: enQuillPlaceholder,
    theme: 'snow'  // or 'bubble'
});

quill1.on('text-change', function(delta, oldDelta, source) {
    $('#hidden_description_en').val(quill.container.firstChild.innerHTML);
});
