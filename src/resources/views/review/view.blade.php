<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <h1 class="text-xl">
                <font color="#242775">{{ env('APP_NAME') }}</font> | ID#{{ $request->id }}
            </h1>
            {{ env('APP_DESC') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div style="padding:40px 40px 20px 40px;">

                    <h1 class="text-xl">
                        <font color="#242775">Request ID#{{ $request->id }}</font>
                    </h1>

                    <form action="" method="post"
                        onSubmit="return confirm('Do you want to submit ? \n** !Please recheck your review before submission') "
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label><b>Project Group</b></label><br />
                                    <input type="text" class="form-control"
                                        value="Group {{ $mygroup->id }} | {{ $mygroup->project_name }}" disabled />
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label><b>Request by</b></label>
                                    <p>
                                        <code>{{ $request->name }}</code>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label><b>Attach file</b></label>

                                    <a style="text-decoration:none;" target="_blank"
                                        href="/admin/requestfile/{{ $request->request_file }}">
                                        <button type="button" class="btn btn-block btn-outline-info">View
                                            file</button>
                                    </a>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <label><b>Members</b></label>
                                <div class="form-group">
                                    @foreach ($members as $member)
                                        - {{ $member->name }} <br />
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><b>Student description / comment</b></label>
                                    @if ($request->description)
                                        <div style="border: 1px #999 solid; border-radius:10px; padding:10px;">
                                            <code>@php echo $request->description @endphp</code>
                                        </div>
                                    @else
                                        <small> <i>
                                                <p> - No description</p>
                                            </i></small>
                                    @endif

                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr>
                            </div>
                            <div class="col-md-7">
                                <label><b>File</b></label>
                                <div class="form-group">
                                    <iframe src="/admin/requestfile/{{ $request->request_file }}" frameborder="0"
                                        height="530" style="width: 100%;"></iframe>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <label><b>Review / Comment</b></label>
                                <div class="form-group">
                                    <textarea class="form-control" name="comment" rows="7">{{ $request->review }}</textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label><b>Attach file</b></label>
                                                <input type="file" accept="application/pdf" name="review_file"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <label for="sign"><b>Signed Report?</b></label>
                                        <div class="form-group">
                                            <input type="checkbox" name="sign" value="1"
                                                @if ($request->sign) checked @endif> Signed
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <input class="btn btn-block btn-primary" type="submit" value="Submit Review!">
                                    <span class="text-danger"><small>** !Please recheck your review before
                                            submission</small></span>
                                </div>

                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('comment');
    </script>


</x-app-layout>
