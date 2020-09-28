<style>
    .files > li {
        float: left;
        width: 150px;
        border: 1px solid #eee;
        margin-bottom: 10px;
        margin-right: 10px;
        position: relative;
    }

    .files>li>.file-select {
        position: absolute;
        top: -7px;
        left: -1px;
    }

    .file-icon {
        text-align: center;
        font-size: 65px;
        color: #666;
        display: block;
        height: 100px;
    }

    .file-info {
        text-align: center;
        padding: 10px;
        background: #f4f4f4;
    }

    .file-name {
        font-weight: bold;
        color: #666;
        display: block;
        overflow: hidden !important;
        white-space: nowrap !important;
        text-overflow: ellipsis !important;
    }

    .file-size {
        color: #999;
        font-size: 12px;
        display: block;
    }

    .files {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .file-icon.has-img {
        padding: 0;
    }

    .file-icon.has-img>img {
         max-width: 100%;
         height: auto;
         max-height: 92px;
     }

</style>

<script>

    var deleteFiles = function (files) {

        if (!files.length) {
            return;
        }

        $.admin.confirm({
            title: $.admin.trans('delete_confirm'),
            preConfirm: function() {
                return new Promise(function(resolve) {
                    $.ajax({
                        method: 'delete',
                        url: '{{ $url['delete'] }}',
                        data: {
                            'files[]': files,
                        },
                        success: function (data) {
                            $.admin.reload();
                            resolve(data);
                        }
                    });

                });
            }
        }).then(function(result){
            var data = result.value;
            if (typeof data === 'object') {
                if (data.status) {
                    $.admin.toastr.success(data.message);
                } else {
                    $.admin.toastr.error(data.message);
                }
            }
        });
    };

    $('.file-delete').click(function () {
        deleteFiles([$(this).data('path')]);
    });

    $('.file-delete-multiple').click(function () {
        var files = $(".file-select input:checked").map(function(){
            return $(this).val();
        }).toArray();
        deleteFiles(files);
    });

    $('#moveModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var name = button.data('name');

        var modal = $(this);
        modal.find('[name=path]').val(name)
        modal.find('[name=new]').val(name)
    });

    $('#urlModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var url = button.data('url');

        $(this).find('input').val(url)
    });

    $('#file-move').on('submit', function (event) {

        event.preventDefault();

        var form = $(this);

        var path = form.find('[name=path]').val();
        var name = form.find('[name=new]').val();

        $.ajax({
            method: 'put',
            url: '{{ $url['move'] }}',
            data: {
                path: path,
                'new': name,
            },
            success: function (data) {
                $.admin.reload();

                if (typeof data === 'object') {
                    if (data.status) {
                        $.admin.toastr.success(data.message);
                    } else {
                        $.admin.toastr.error(data.message);
                    }
                }
            }
        });

        closeModal();
    });

    $('.file-upload').on('change', function () {
        $('.file-upload-form').submit();
    });

    $('#new-folder').on('submit', function (event) {

        event.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            method: 'POST',
            url: '{{ $url['new-folder'] }}',
            data: formData,
            async: false,
            success: function (data) {
                $.admin.reload();

                if (typeof data === 'object') {
                    if (data.status) {
                        $.admin.toastr.success(data.message);
                    } else {
                        $.admin.toastr.error(data.message);
                    }
                }
            },
            cache: false,
            contentType: false,
            processData: false
        });

        closeModal();
    });

    function closeModal() {
        $("#moveModal").modal('toggle');
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
    }

    $('.media-reload').click(function () {
        $.admin.reload();
    });

    $('.goto-url button').click(function () {
        var path = $('.goto-url input').val();
        $.admin.redirect('{{ $url['index'] }}?path=' + path);
    });

    $('.files-select-all').on('change', function(event) {
        if (this.checked) {
            $('.grid-row-checkbox').prop('checked', true);
        } else {
            $('.grid-row-checkbox').prop('checked', false);
        }
    });

    $('.file-select input').on('change', function () {
        if (this.checked) {
            $(this).closest('tr').css('background-color', '#ffffd5');
        } else {
            $(this).closest('tr').css('background-color', '');
        }
    });

    $('.file-select-all input').on('change', function () {
        if (this.checked) {
            $('.file-select input').prop('checked', true);
        } else {
            $('.file-select input').prop('checked', false);
        }
    });

    $('table>tbody>tr').mouseover(function () {
        $(this).find('.btn-group').removeClass('d-none');
    }).mouseout(function () {
        $(this).find('.btn-group').addClass('d-none');
    });
</script>

<div class="row">
    <!-- /.col -->
    <div class="col-12">
        <div class="card card-@color card-outline">

            <div class="card-header">
                <div class="card-tools">
                    <div class="input-group float-right goto-url" style="width: 350px;">
                        <input type="text" name="path" class="form-control" value="{{ '/'.trim($url['path'], '/') }}">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fas fa-arrow-right"></i></button>
                        </div>
                    </div>
                </div>
                <div class="float-left d-flex">

                    <div class="btn-group">
                        <a href="" type="button" class="btn btn-default btn media-reload" title="Refresh">
                            <i class="fas fa-sync"></i>
                        </a>
                        <a type="button" class="btn btn-default btn file-delete-multiple" title="Delete">
                            <i class="fas fa-trash"></i>
                        </a>
                    </div>
                    <!-- /.btn-group -->

                    <label class="btn btn-default mb-0 ml-1">
                        <i class="fas fa-upload"></i>&nbsp;&nbsp;{{ trans('admin.upload') }}
                        <form action="{{ $url['upload'] }}" method="post" class="file-upload-form" enctype="multipart/form-data" pjax-container>
                            <input type="file" name="files[]" class="d-none file-upload" multiple>
                            <input type="hidden" name="dir" value="{{ $url['path'] }}" />
                            {{ csrf_field() }}
                        </form>
                    </label>

                    <!-- /.btn-group -->
                    <a class="btn btn-default btn ml-1" data-toggle="modal" data-target="#newFolderModal">
                        <i class="fas fa-folder"></i>&nbsp;&nbsp;{{ trans('admin.new_folder') }}
                    </a>

                    <div class="btn-group ml-1">
                        <a href="{{ route('media-index', ['path' => $url['path'], 'view' => 'table']) }}" class="btn btn-default active"><i class="fas fa-list"></i></a>
                        <a href="{{ route('media-index', ['path' => $url['path'], 'view' => 'list']) }}" class="btn btn-default"><i class="fas fa-th"></i></a>
                    </div>
                </div>
            </div>

            <!-- /.box-body -->
            <div class="box-body">
                <ol class="breadcrumb m-2">

                    <li class="breadcrumb-item"><a href="{{ route('media-index') }}"><i class="far fa-folder-open"></i> </a></li>

                    @foreach($nav as $item)
                        <li class="breadcrumb-item"><a href="{{ $item['url'] }}"> {{ $item['name'] }}</a></li>
                    @endforeach
                </ol>
                <ul class="files clearfix m-3">

                    @if (empty($list))
                        <li style="height: 200px;border: none;"></li>
                    @else
                        @foreach($list as $item)
                        <li>
                            <span class="file-select icheck-@color d-inline">
                                <input type="checkbox" value="{{ $item['name'] }}" id="@id"/>
                                <label for='@id'></label>
                            </span>

                            {!! $item['preview'] !!}

                            <div class="file-info">
                                <a @if(!$item['isDir'])target="_blank"@endif href="{{ $item['link'] }}" class="file-name" title="{{ $item['name'] }}">
                                    {{ $item['icon'] }} {{ basename($item['name']) }}
                                </a>
                            <span class="file-size">
                              {{ $item['size'] }}&nbsp;

                                <div class="btn-group btn-group-xs pull-right">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                        <a href="#" class="file-rename dropdown-item" data-toggle="modal" data-target="#moveModal" data-name="{{ $item['name'] }}">Rename & Move</a>
                                        <a href="#" class="file-delete dropdown-item" data-path="{{ $item['name'] }}">Delete</a>
                                        @unless($item['isDir'])
                                        <a target="_blank" class="dropdown-item" href="{{ $item['download'] }}">Download</a>
                                        @endunless
                                        <div role="separator" class="dropdown-divider"></div>
                                        <a href="#" data-toggle="modal" class="dropdown-item" data-target="#urlModal" data-url="{{ $item['url'] }}">Url</a>
                                    </div>
                                </div>
                            </span>
                            </div>
                        </li>
                        @endforeach
                    @endif
                </ul>
            </div>
            <!-- /.box-footer -->
            <!-- /.box-footer -->
        </div>
        <!-- /. box -->
    </div>
    <!-- /.col -->
</div>

<div class="modal fade" id="moveModal" tabindex="-1" role="dialog" aria-labelledby="moveModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="moveModalLabel">Rename & Move</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form id="file-move">
            <div class="modal-body">
                <div class="form-group">
                    <label for="recipient-name" class="control-label">Path:</label>
                    <input type="text" class="form-control" name="new" />
                </div>
                <input type="hidden" name="path"/>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="urlModal" tabindex="-1" role="dialog" aria-labelledby="urlModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="urlModalLabel">Url</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" class="form-control" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="newFolderModal" tabindex="-1" role="dialog" aria-labelledby="newFolderModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newFolderModalLabel">New folder</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form id="new-folder">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" />
                    </div>
                    <input type="hidden" name="dir" value="{{ $url['path'] }}"/>
                    {{ csrf_field() }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
