<?php

namespace Encore\Admin\Media;

use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function index(Request $request)
    {
        return Admin::content(function (Content $content) use ($request) {
            $content->header('Media manager');

            $path = $request->get('path', '/');
            $view = $request->get('view', 'table');

            $manager = new MediaManager($path);

            $content->body(view("laravel-admin-media::$view", [
                'list'   => $manager->ls(),
                'nav'    => $manager->navigation(),
                'url'    => $manager->urls(),
            ]));
        });
    }

    public function download(Request $request)
    {
        $file = $request->get('file');

        $manager = new MediaManager($file);

        return $manager->download();
    }

    public function upload(Request $request)
    {
        $files = $request->file('files');
        $dir = $request->get('dir', '/');

        $manager = new MediaManager($dir);

        try {
            if ($manager->upload($files)) {
                admin_toastr(trans('admin.upload_succeeded'));
            }
        } catch (\Exception $e) {
            admin_toastr($e->getMessage(), 'error');
        }

        return back();
    }

    public function delete(Request $request)
    {
        $files = $request->get('files');

        $manager = new MediaManager();

        try {
            if ($manager->delete($files)) {
                return response()->json([
                    'status'  => true,
                    'message' => trans('admin.delete_succeeded'),
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status'  => true,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function move(Request $request)
    {
        $path = $request->get('path');
        $new = $request->get('new');

        $manager = new MediaManager($path);

        try {
            if ($manager->move($new)) {
                return response()->json([
                    'status'  => true,
                    'message' => trans('admin.move_succeeded'),
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status'  => true,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function newFolder(Request $request)
    {
        $dir = $request->get('dir');
        $name = $request->get('name');

        $manager = new MediaManager($dir);

        try {
            if ($manager->newFolder($name)) {
                return response()->json([
                    'status'  => true,
                    'message' => trans('admin.move_succeeded'),
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status'  => true,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function detail(Request $request)
    {
        $file = $request->get('file');

        $filePart = explode('/', $file);
        $fileName = array_pop($filePart);
        $manager = new MediaManager(implode('/', $filePart));

        $fullPath = $manager->getFullPath($file);

        try {
            if ($manager->exists($fullPath)) {
                return Admin::content(function (Content $content) use ($file, $manager) {
                    $content->header('Crop image');

                    $content->body(view('laravel-admin-media::crop', [
                        'file'    => $file,
                        'fileUrl' => Storage::url($file),
                        'url'     => $manager->urls(),
                        'nav'     => $manager->navigation(),
                    ]));
                });
            }
        } catch (\Exception $e) {
            return response()->json([
                'status'  => true,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function cropUpdate(Request $request)
    {
        $fileCrop = $request->file('croppedImage');
        $fileURl = $request->get('file');

        try {
            $filePart = explode('/', $fileURl);
            $fileName = array_pop($filePart);
            $manager = new MediaManager(implode('/', $filePart));
            $manager->uploadCropFile($fileCrop, $fileName);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => true,
                'message' => $e->getMessage(),
            ]);
        }
    }
}
