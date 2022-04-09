<?php

namespace App\Http\Controllers;

use App\Models\File_download;
use App\Http\Requests\StoreFile_downloadRequest;
use App\Http\Requests\UpdateFile_downloadRequest;

class FileDownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFile_downloadRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFile_downloadRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\File_download  $file_download
     * @return \Illuminate\Http\Response
     */
    public function show(File_download $file_download)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\File_download  $file_download
     * @return \Illuminate\Http\Response
     */
    public function edit(File_download $file_download)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFile_downloadRequest  $request
     * @param  \App\Models\File_download  $file_download
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFile_downloadRequest $request, File_download $file_download)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\File_download  $file_download
     * @return \Illuminate\Http\Response
     */
    public function destroy(File_download $file_download)
    {
        //
    }
}
