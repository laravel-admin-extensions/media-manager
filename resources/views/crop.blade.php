<link rel="stylesheet" href="https://unpkg.com/cropperjs/dist/cropper.css">


<div class="row">
    <!-- /.col -->
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-body no-padding">

                <div class="mailbox-controls with-border">
                    <div class="btn-group">
                        <a href="" type="button" class="btn btn-default btn media-reload" title="Refresh">
                            <i class="fa fa-refresh"></i>
                        </a>
                    </div>

                    <div class="input-group input-group-sm pull-right goto-url" style="width: 250px;">
                        <input type="text" name="path" class="form-control pull-right" value="{{ '/'.trim($url['path'], '/') }}">

                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-arrow-right"></i></button>
                        </div>
                    </div>


                </div>
                <div class="box-footer">
                    <ol class="breadcrumb" style="margin-bottom: 10px;">
                        <li><a href="{{ route('media-index') }}"><i class="fa fa-th-large"></i> </a></li>
                        @foreach($nav as $item)
                            <li><a href="{{ $item['url'] }}"> {{ $item['name'] }}</a></li>
                        @endforeach
                    </ol>
                </div>
                <!-- /.mailbox-read-message -->
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <!-- <h3>Demo:</h3> -->
                        <div class="img-container">
                            <img id="image" src="{{ $fileUrl }}" alt="Picture">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <!-- <h3>Preview:</h3> -->
                        <div class="docs-preview clearfix">
                            <div class="img-preview preview-lg"></div>
                            <div class="img-preview preview-md"></div>
                            <div class="img-preview preview-sm"></div>
                            <div class="img-preview preview-xs"></div>
                        </div>

                        <!-- <h3>Data:</h3> -->
                        <div class="docs-data">
                            <div class="input-group input-group-sm">
            <span class="input-group-prepend">
              <label class="input-group-text" for="dataX">X</label>
            </span>
                                <input type="text" class="form-control" id="dataX" placeholder="x">
                                <span class="input-group-append">
              <span class="input-group-text">px</span>
            </span>
                            </div>
                            <div class="input-group input-group-sm">
            <span class="input-group-prepend">
              <label class="input-group-text" for="dataY">Y</label>
            </span>
                                <input type="text" class="form-control" id="dataY" placeholder="y">
                                <span class="input-group-append">
              <span class="input-group-text">px</span>
            </span>
                            </div>
                            <div class="input-group input-group-sm">
            <span class="input-group-prepend">
              <label class="input-group-text" for="dataWidth">Width</label>
            </span>
                                <input type="text" class="form-control" id="dataWidth" placeholder="width">
                                <span class="input-group-append">
              <span class="input-group-text">px</span>
            </span>
                            </div>
                            <div class="input-group input-group-sm">
            <span class="input-group-prepend">
              <label class="input-group-text" for="dataHeight">Height</label>
            </span>
                                <input type="text" class="form-control" id="dataHeight" placeholder="height">
                                <span class="input-group-append">
              <span class="input-group-text">px</span>
            </span>
                            </div>
                            <div class="input-group input-group-sm">
            <span class="input-group-prepend">
              <label class="input-group-text" for="dataRotate">Rotate</label>
            </span>
                                <input type="text" class="form-control" id="dataRotate" placeholder="rotate">
                                <span class="input-group-append">
              <span class="input-group-text">deg</span>
            </span>
                            </div>
                            <div class="input-group input-group-sm">
            <span class="input-group-prepend">
              <label class="input-group-text" for="dataScaleX">ScaleX</label>
            </span>
                                <input type="text" class="form-control" id="dataScaleX" placeholder="scaleX">
                            </div>
                            <div class="input-group input-group-sm">
            <span class="input-group-prepend">
              <label class="input-group-text" for="dataScaleY">ScaleY</label>
            </span>
                                <input type="text" class="form-control" id="dataScaleY" placeholder="scaleY">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9 docs-buttons">
                        <!-- <h3>Toolbar:</h3> -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary" data-method="setDragMode" data-option="move"
                                    title="Move">
            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false"
                  title="$().cropper(&quot;setDragMode&quot;, &quot;move&quot;)">
              <span class="fa fa-arrows"></span>
            </span>
                            </button>
                            <button type="button" class="btn btn-primary" data-method="setDragMode" data-option="crop"
                                    title="Crop">
            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false"
                  title="$().cropper(&quot;setDragMode&quot;, &quot;crop&quot;)">
              <span class="fa fa-crop"></span>
            </span>
                            </button>
                        </div>

                        <div class="btn-group">
                            <button type="button" class="btn btn-primary" data-method="zoom" data-option="0.1"
                                    title="Zoom In">
            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false"
                  title="$().cropper(&quot;zoom&quot;, 0.1)">
              <span class="fa fa-search-plus"></span>
            </span>
                            </button>
                            <button type="button" class="btn btn-primary" data-method="zoom" data-option="-0.1"
                                    title="Zoom Out">
            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false"
                  title="$().cropper(&quot;zoom&quot;, -0.1)">
              <span class="fa fa-search-minus"></span>
            </span>
                            </button>
                        </div>

                        <div class="btn-group">
                            <button type="button" class="btn btn-primary" data-method="move" data-option="-10"
                                    data-second-option="0" title="Move Left">
            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false"
                  title="$().cropper(&quot;move&quot;, -10, 0)">
              <span class="fa fa-arrow-left"></span>
            </span>
                            </button>
                            <button type="button" class="btn btn-primary" data-method="move" data-option="10"
                                    data-second-option="0" title="Move Right">
            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false"
                  title="$().cropper(&quot;move&quot;, 10, 0)">
              <span class="fa fa-arrow-right"></span>
            </span>
                            </button>
                            <button type="button" class="btn btn-primary" data-method="move" data-option="0"
                                    data-second-option="-10" title="Move Up">
            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false"
                  title="$().cropper(&quot;move&quot;, 0, -10)">
              <span class="fa fa-arrow-up"></span>
            </span>
                            </button>
                            <button type="button" class="btn btn-primary" data-method="move" data-option="0"
                                    data-second-option="10" title="Move Down">
            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false"
                  title="$().cropper(&quot;move&quot;, 0, 10)">
              <span class="fa fa-arrow-down"></span>
            </span>
                            </button>
                        </div>

                        <div class="btn-group">
                            <button type="button" class="btn btn-primary" data-method="rotate" data-option="-45"
                                    title="Rotate Left">
            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false"
                  title="$().cropper(&quot;rotate&quot;, -45)">
              <span class="fa fa-rotate-left"></span>
            </span>
                            </button>
                            <button type="button" class="btn btn-primary" data-method="rotate" data-option="45"
                                    title="Rotate Right">
            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false"
                  title="$().cropper(&quot;rotate&quot;, 45)">
              <span class="fa fa-rotate-right"></span>
            </span>
                            </button>
                        </div>

                        <div class="btn-group">
                            <button type="button" class="btn btn-primary" data-method="scaleX" data-option="-1"
                                    title="Flip Horizontal">
            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false"
                  title="$().cropper(&quot;scaleX&quot;, -1)">
              <span class="fa fa-arrows-h"></span>
            </span>
                            </button>
                            <button type="button" class="btn btn-primary" data-method="scaleY" data-option="-1"
                                    title="Flip Vertical">
            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false"
                  title="$().cropper(&quot;scaleY&quot;, -1)">
              <span class="fa fa-arrows-v"></span>
            </span>
                            </button>
                        </div>

                        <div class="btn-group">
                            <button type="button" class="btn btn-primary" data-method="crop" title="Crop">
            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false"
                  title="$().cropper(&quot;crop&quot;)">
              <span class="fa fa-check"></span>
            </span>
                            </button>
                            <button type="button" class="btn btn-primary" data-method="clear" title="Clear">
            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false"
                  title="$().cropper(&quot;clear&quot;)">
              <span class="fa fa-remove"></span>
            </span>
                            </button>
                        </div>

                        <div class="btn-group">
                            <button type="button" class="btn btn-primary" data-method="disable" title="Disable">
            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false"
                  title="$().cropper(&quot;disable&quot;)">
              <span class="fa fa-lock"></span>
            </span>
                            </button>
                            <button type="button" class="btn btn-primary" data-method="enable" title="Enable">
            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false"
                  title="$().cropper(&quot;enable&quot;)">
              <span class="fa fa-unlock"></span>
            </span>
                            </button>
                        </div>

                        <div class="btn-group">
                            <button type="button" class="btn btn-primary" data-method="reset" title="Reset">
            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false"
                  title="$().cropper(&quot;reset&quot;)">
              <span class="fa fa-refresh"></span>
            </span>
                            </button>
                            <label class="btn btn-primary btn-upload" for="inputImage" title="Upload image file">
                                <input type="file" class="sr-only" id="inputImage" name="file"
                                       accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
                                <span class="docs-tooltip" data-toggle="tooltip" data-animation="false"
                                      title="Import image with Blob URLs">
              <span class="fa fa-upload"></span>
            </span>
                            </label>
                            <button type="button" class="btn btn-primary" data-method="destroy" title="Destroy">
            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false"
                  title="$().cropper(&quot;destroy&quot;)">
              <span class="fa fa-power-off"></span>
            </span>
                            </button>
                        </div>

                        <div style="margin: 10px 0" class="btn-group btn-group-crop">
                            <button type="button" class="btn btn-success" data-method="getCroppedCanvas">
              Cropped And Upload file
                            </button>
                        </div>
                    </div><!-- /.docs-buttons -->

                    <div class="col-md-3 docs-toggles">
                        <!-- <h3>Toggles:</h3> -->
                        <div class="btn-group d-flex flex-nowrap" data-toggle="buttons">
                            <label class="btn btn-primary active">
                                <input type="radio" class="sr-only" id="aspectRatio0" name="aspectRatio"
                                       value="1.7777777777777777">
                                <span class="docs-tooltip" data-toggle="tooltip" data-animation="false"
                                      title="aspectRatio: 16 / 9">
              16:9
            </span>
                            </label>
                            <label class="btn btn-primary">
                                <input type="radio" class="sr-only" id="aspectRatio1" name="aspectRatio"
                                       value="1.3333333333333333">
                                <span class="docs-tooltip" data-toggle="tooltip" data-animation="false"
                                      title="aspectRatio: 4 / 3">
              4:3
            </span>
                            </label>
                            <label class="btn btn-primary">
                                <input type="radio" class="sr-only" id="aspectRatio2" name="aspectRatio" value="1">
                                <span class="docs-tooltip" data-toggle="tooltip" data-animation="false"
                                      title="aspectRatio: 1 / 1">
              1:1
            </span>
                            </label>
                            <label class="btn btn-primary">
                                <input type="radio" class="sr-only" id="aspectRatio3" name="aspectRatio"
                                       value="0.6666666666666666">
                                <span class="docs-tooltip" data-toggle="tooltip" data-animation="false"
                                      title="aspectRatio: 2 / 3">
              2:3
            </span>
                            </label>
                            <label class="btn btn-primary">
                                <input type="radio" class="sr-only" id="aspectRatio4" name="aspectRatio" value="NaN">
                                <span class="docs-tooltip" data-toggle="tooltip" data-animation="false"
                                      title="aspectRatio: NaN">
              Free
            </span>
                            </label>
                        </div>



                        <div class="dropdown dropup docs-options">
                            <button type="button" class="btn btn-primary btn-block dropdown-toggle" id="toggleOptions"
                                    data-toggle="dropdown" aria-expanded="true">
                                Toggle Options
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="toggleOptions" role="menu">
                                <li class="dropdown-item">
                                    <div class="form-check">
                                        <input class="form-check-input" id="responsive" type="checkbox"
                                               name="responsive" checked>
                                        <label class="form-check-label" for="responsive">responsive</label>
                                    </div>
                                </li>
                                <li class="dropdown-item">
                                    <div class="form-check">
                                        <input class="form-check-input" id="restore" type="checkbox" name="restore"
                                               checked>
                                        <label class="form-check-label" for="restore">restore</label>
                                    </div>
                                </li>
                                <li class="dropdown-item">
                                    <div class="form-check">
                                        <input class="form-check-input" id="checkCrossOrigin" type="checkbox"
                                               name="checkCrossOrigin" checked>
                                        <label class="form-check-label" for="checkCrossOrigin">checkCrossOrigin</label>
                                    </div>
                                </li>
                                <li class="dropdown-item">
                                    <div class="form-check">
                                        <input class="form-check-input" id="checkOrientation" type="checkbox"
                                               name="checkOrientation" checked>
                                        <label class="form-check-label" for="checkOrientation">checkOrientation</label>
                                    </div>
                                </li>
                                <li class="dropdown-item">
                                    <div class="form-check">
                                        <input class="form-check-input" id="modal" type="checkbox" name="modal" checked>
                                        <label class="form-check-label" for="modal">modal</label>
                                    </div>
                                </li>
                                <li class="dropdown-item">
                                    <div class="form-check">
                                        <input class="form-check-input" id="guides" type="checkbox" name="guides"
                                               checked>
                                        <label class="form-check-label" for="guides">guides</label>
                                    </div>
                                </li>
                                <li class="dropdown-item">
                                    <div class="form-check">
                                        <input class="form-check-input" id="center" type="checkbox" name="center"
                                               checked>
                                        <label class="form-check-label" for="center">center</label>
                                    </div>
                                </li>
                                <li class="dropdown-item">
                                    <div class="form-check">
                                        <input class="form-check-input" id="highlight" type="checkbox" name="highlight"
                                               checked>
                                        <label class="form-check-label" for="highlight">highlight</label>
                                    </div>
                                </li>
                                <li class="dropdown-item">
                                    <div class="form-check">
                                        <input class="form-check-input" id="background" type="checkbox"
                                               name="background" checked>
                                        <label class="form-check-label" for="background">background</label>
                                    </div>
                                </li>
                                <li class="dropdown-item">
                                    <div class="form-check">
                                        <input class="form-check-input" id="autoCrop" type="checkbox" name="autoCrop"
                                               checked>
                                        <label class="form-check-label" for="autoCrop">autoCrop</label>
                                    </div>
                                </li>
                                <li class="dropdown-item">
                                    <div class="form-check">
                                        <input class="form-check-input" id="movable" type="checkbox" name="movable"
                                               checked>
                                        <label class="form-check-label" for="movable">movable</label>
                                    </div>
                                </li>
                                <li class="dropdown-item">
                                    <div class="form-check">
                                        <input class="form-check-input" id="rotatable" type="checkbox" name="rotatable"
                                               checked>
                                        <label class="form-check-label" for="rotatable">rotatable</label>
                                    </div>
                                </li>
                                <li class="dropdown-item">
                                    <div class="form-check">
                                        <input class="form-check-input" id="scalable" type="checkbox" name="scalable"
                                               checked>
                                        <label class="form-check-label" for="scalable">scalable</label>
                                    </div>
                                </li>
                                <li class="dropdown-item">
                                    <div class="form-check">
                                        <input class="form-check-input" id="zoomable" type="checkbox" name="zoomable"
                                               checked>
                                        <label class="form-check-label" for="zoomable">zoomable</label>
                                    </div>
                                </li>
                                <li class="dropdown-item">
                                    <div class="form-check">
                                        <input class="form-check-input" id="zoomOnTouch" type="checkbox"
                                               name="zoomOnTouch" checked>
                                        <label class="form-check-label" for="zoomOnTouch">zoomOnTouch</label>
                                    </div>
                                </li>
                                <li class="dropdown-item">
                                    <div class="form-check">
                                        <input class="form-check-input" id="zoomOnWheel" type="checkbox"
                                               name="zoomOnWheel" checked>
                                        <label class="form-check-label" for="zoomOnWheel">zoomOnWheel</label>
                                    </div>
                                </li>
                                <li class="dropdown-item">
                                    <div class="form-check">
                                        <input class="form-check-input" id="cropBoxMovable" type="checkbox"
                                               name="cropBoxMovable" checked>
                                        <label class="form-check-label" for="cropBoxMovable">cropBoxMovable</label>
                                    </div>
                                </li>
                                <li class="dropdown-item">
                                    <div class="form-check">
                                        <input class="form-check-input" id="cropBoxResizable" type="checkbox"
                                               name="cropBoxResizable" checked>
                                        <label class="form-check-label" for="cropBoxResizable">cropBoxResizable</label>
                                    </div>
                                </li>
                                <li class="dropdown-item">
                                    <div class="form-check">
                                        <input class="form-check-input" id="toggleDragModeOnDblclick" type="checkbox"
                                               name="toggleDragModeOnDblclick" checked>
                                        <label class="form-check-label" for="toggleDragModeOnDblclick">toggleDragModeOnDblclick</label>
                                    </div>
                                </li>
                            </ul>
                        </div><!-- /.dropdown -->
                        <!-- /.box-footer -->
                        <!-- /.box-footer -->
                    </div>
                    <!-- /. box -->
                </div>
                <!-- /.col -->
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {

        $(function () {
            'use strict';

            var console = window.console || {
                log: function () {
                }
            };
            var URL = window.URL || window.webkitURL;
            var $image = $('#image');
            var $download = $('#download');
            var $dataX = $('#dataX');
            var $dataY = $('#dataY');
            var $dataHeight = $('#dataHeight');
            var $dataWidth = $('#dataWidth');
            var $dataRotate = $('#dataRotate');
            var $dataScaleX = $('#dataScaleX');
            var $dataScaleY = $('#dataScaleY');
            var options = {
                aspectRatio: 16 / 9,
                preview: '.img-preview',
                crop: function (e) {
                    $dataX.val(Math.round(e.detail.x));
                    $dataY.val(Math.round(e.detail.y));
                    $dataHeight.val(Math.round(e.detail.height));
                    $dataWidth.val(Math.round(e.detail.width));
                    $dataRotate.val(e.detail.rotate);
                    $dataScaleX.val(e.detail.scaleX);
                    $dataScaleY.val(e.detail.scaleY);
                }
            };
            var originalImageURL = $image.attr('src');
            var uploadedImageName = 'cropped.jpg';
            var uploadedImageType = 'image/jpeg';
            var uploadedImageURL;

            // Tooltip
            $('[data-toggle="tooltip"]').tooltip();

            // Cropper
            $image.cropper(options);

            // Buttons
            if (!$.isFunction(document.createElement('canvas').getContext)) {
                $('button[data-method="getCroppedCanvas"]').prop('disabled', true);
            }

            if (typeof document.createElement('cropper').style.transition === 'undefined') {
                $('button[data-method="rotate"]').prop('disabled', true);
                $('button[data-method="scale"]').prop('disabled', true);
            }

            // Options
            $('.docs-toggles').on('change', 'input', function () {
                var $this = $(this);
                var name = $this.attr('name');
                var type = $this.prop('type');
                var cropBoxData;
                var canvasData;

                if (!$image.data('cropper')) {
                    return;
                }

                if (type === 'checkbox') {
                    options[name] = $this.prop('checked');
                    cropBoxData = $image.cropper('getCropBoxData');
                    canvasData = $image.cropper('getCanvasData');

                    options.ready = function () {
                        $image.cropper('setCropBoxData', cropBoxData);
                        $image.cropper('setCanvasData', canvasData);
                    };
                } else if (type === 'radio') {
                    options[name] = $this.val();
                }

                $image.cropper('destroy').cropper(options);
            });

            // Methods
            $('.docs-buttons').on('click', '[data-method]', function () {
                var $this = $(this);
                var data = $this.data();
                var cropper = $image.data('cropper');
                var cropped;
                var $target;
                var result;

                if ($this.prop('disabled') || $this.hasClass('disabled')) {
                    return;
                }

                if (cropper && data.method) {
                    data = $.extend({}, data); // Clone a new one

                    if (typeof data.target !== 'undefined') {
                        $target = $(data.target);

                        if (typeof data.option === 'undefined') {
                            try {
                                data.option = JSON.parse($target.val());
                            } catch (e) {
                                console.log(e.message);
                            }
                        }
                    }

                    cropped = cropper.cropped;

                    switch (data.method) {
                        case 'rotate':
                            if (cropped && options.viewMode > 0) {
                                $image.cropper('clear');
                            }

                            break;

                        case 'getCroppedCanvas':
                            if (uploadedImageType === 'image/jpeg') {
                                if (!data.option) {
                                    data.option = {};
                                }

                                data.option.fillColor = '#fff';
                            }

                            break;
                    }

                    result = $image.cropper(data.method, data.option, data.secondOption);

                    switch (data.method) {
                        case 'rotate':
                            if (cropped && options.viewMode > 0) {
                                $image.cropper('crop');
                            }

                            break;

                        case 'scaleX':
                        case 'scaleY':
                            $(this).data('option', -data.option);
                            break;

                        case 'getCroppedCanvas':

                            if (result) {
                                // Bootstrap's Modal
                                $('#getCroppedCanvasModal').modal().find('.modal-body').html(result);
                                $image.cropper('getCroppedCanvas').toBlob(function (blob) {
                                    var formData = new FormData();

                                    formData.append('croppedImage', blob);
                                    formData.append('_token', LA.token);
                                    formData.append('file', '{{$file}}');

                                    $.ajax('{{route('media-crop-update')}}', {
                                        method: "POST",
                                        data: formData,
                                        processData: false,
                                        contentType: false,
                                        success: function () {
                                            swal('success', '', 'success');
                                        },
                                        error: function () {
                                            swal('Error', '', 'error');
                                        }
                                    });
                                });
                            }

                            break;

                        case 'destroy':
                            if (uploadedImageURL) {
                                URL.revokeObjectURL(uploadedImageURL);
                                uploadedImageURL = '';
                                $image.attr('src', originalImageURL);
                            }

                            break;
                    }

                    if ($.isPlainObject(result) && $target) {
                        try {
                            $target.val(JSON.stringify(result));
                        } catch (e) {
                            console.log(e.message);
                        }
                    }

                }
            });

            // Keyboard
            $(document.body).on('keydown', function (e) {
                if (e.target !== this || !$image.data('cropper') || this.scrollTop > 300) {
                    return;
                }

                switch (e.which) {
                    case 37:
                        e.preventDefault();
                        $image.cropper('move', -1, 0);
                        break;

                    case 38:
                        e.preventDefault();
                        $image.cropper('move', 0, -1);
                        break;

                    case 39:
                        e.preventDefault();
                        $image.cropper('move', 1, 0);
                        break;

                    case 40:
                        e.preventDefault();
                        $image.cropper('move', 0, 1);
                        break;
                }

            });
            // Import image
            var $inputImage = $('#inputImage');

            if (URL) {
                $inputImage.change(function () {
                    var files = this.files;
                    var file;

                    if (!$image.data('cropper')) {
                        return;
                    }

                    if (files && files.length) {
                        file = files[0];

                        if (/^image\/\w+$/.test(file.type)) {
                            uploadedImageName = file.name;
                            uploadedImageType = file.type;

                            if (uploadedImageURL) {
                                URL.revokeObjectURL(uploadedImageURL);
                            }

                            uploadedImageURL = URL.createObjectURL(file);
                            $image.cropper('destroy').attr('src', uploadedImageURL).cropper(options);
                            $inputImage.val('');
                        } else {
                            window.alert('Please choose an image file.');
                        }
                    }
                });
            } else {
                $inputImage.prop('disabled', true).parent().addClass('disabled');
            }
        });
    })
</script>