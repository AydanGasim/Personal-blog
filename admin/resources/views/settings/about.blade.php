
@extends('layouts.master')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row mt-2 mb-2">
            <div class="col-md-8 mx-auto">
                <div class="card mb-6">
                    <h5 class="card-header">About Info</h5>
                    @include('widgets.errors')
                    <div class="card-body">
                        <form method="POST" action="{{ route('aboutEditPost') }}" enctype="multipart/form-data">
                            <input type="hidden" name="old_image" value="{{ $aboutData->about_image }}"/>
                            @csrf

                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="about_title"
                                    id="title"
                                    value="{{$aboutData->about_title}}" />

                            </div>
                        <div class="mb-3">
                                            <label class="form-label" for="image">Image</label> <br />
                                            <img src="{{ asset($aboutData->about_image) }}" style="height: 150px; width: auto"  alt=""/>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="image">Update Image</label>
                                            <input type="file" class="form-control" name="image" id="image" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="content" class="form-label">Content</label>
                                            <textarea id="content" name="about_content">{{$aboutData->about_content}}</textarea>
                                            <hr />
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>

                                        @section('css')

                                        @endsection
                                        @section("js")
                                            <script src="https://cdn.tiny.cloud/1/52smw0o2h97zsjkxxhauw3bmw9uix36db2u92evy5bxdrqmd/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
                                            <script>
                                                var useDarkMode = window.matchMedia('(prefers-color-scheme: white)').matches;
                                                tinymce.init({
                                                    selector: 'textarea',
                                                    plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
                                                    imagetools_cors_hosts: ['picsum.photos'],
                                                    menubar: 'file edit view insert format tools table help',
                                                    toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent | numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen preview save print | insertfile image media template link anchor codesample | ltr rtl',
                                                    toolbar_sticky: true,
                                                    autosave_ask_before_unload: true,
                                                    autosave_interval: '30s',
                                                    autosave_prefix: '{path}{query}-{id}-',
                                                    autosave_restore_when_empty: false,
                                                    autosave_retention: '2m',
                                                    image_advtab: true,
                                                    link_list: [{
                                                        title: 'My page 1',
                                                        value: 'https://www.tiny.cloud'
                                                    },
                                                        {
                                                            title: 'My page 2',
                                                            value: 'http://www.moxiecode.com'
                                                        }
                                                    ],
                                                    image_list: [{
                                                        title: 'My page 1',
                                                        value: 'https://www.tiny.cloud'
                                                    },
                                                        {
                                                            title: 'My page 2',
                                                            value: 'http://www.moxiecode.com'
                                                        }
                                                    ],
                                                    image_class_list: [{
                                                        title: 'None',
                                                        value: ''
                                                    },
                                                        {
                                                            title: 'Some class',
                                                            value: 'class-name'
                                                        }
                                                    ],
                                                    importcss_append: true,
                                                    file_picker_callback: function(callback, value, meta) {
                                                        /* Provide file and text for the link dialog */
                                                        if (meta.filetype === 'file') {
                                                            callback('https://www.google.com/logos/google.jpg', {
                                                                text: 'My text'
                                                            });
                                                        }

                                                        /* Provide image and alt text for the image dialog */
                                                        if (meta.filetype === 'image') {
                                                            callback('https://www.google.com/logos/google.jpg', {
                                                                alt: 'My alt text'
                                                            });
                                                        }

                                                        /* Provide alternative source and posted for the media dialog */
                                                        if (meta.filetype === 'media') {
                                                            callback('movie.mp4', {
                                                                source2: 'alt.ogg',
                                                                poster: 'https://www.google.com/logos/google.jpg'
                                                            });
                                                        }
                                                    },
                                                    templates: [{
                                                        title: 'New Table',
                                                        description: 'creates a new table',
                                                        content: '<div class="mceTmpl"><table width="98%%" border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>'
                                                    },
                                                        {
                                                            title: 'Starting my story',
                                                            description: 'A cure for writers block',
                                                            content: 'Once upon a time...'
                                                        },
                                                        {
                                                            title: 'New list with dates',
                                                            description: 'New List with dates',
                                                            content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>'
                                                        }
                                                    ],
                                                    template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
                                                    template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
                                                    height: 600,
                                                    image_caption: true,
                                                    quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
                                                    noneditable_noneditable_class: 'mceNonEditable',
                                                    toolbar_mode: 'sliding',
                                                    contextmenu: 'link image imagetools table',
                                                    skin: useDarkMode ? 'oxide-dark' : 'oxide',
                                                    content_css: useDarkMode ? 'dark' : 'default',
                                                    content_style: 'body { font-family:Arial,Helvetica,sans-serif; font-size:14px }'
                                                });
                                            </script>
                                        @endsection
                        </form>
                                    </div>


                    </div>
                </div>
            </div>
        </div>
@endsection
