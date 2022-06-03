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
                            <div class="form-group">
                                <label><b>Your comment</b></label>
                                @if ($request->description)
                                    <div style="border: 1px #999 solid; border-radius:10px; padding:10px;">
                                        <code>@php echo $request->review @endphp</code>
                                    </div>
                                @else
                                    <small> <i>
                                            <p> - No Comment</p>
                                        </i></small>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><b>Review File</b></label><br />
                                @if ($request->review_file)
                                    <a style="text-decoration:none;" target="_blank"
                                        href="/admin/reviewfile/{{ $request->review_file }}">
                                        <button type="button" class="btn btn-outline-info">View
                                            file</button>
                                    </a>
                                @else
                                    <small> <i>
                                            <p> - No File</p>
                                        </i></small>
                                @endif
                            </div>
                        </div>
                        <hr />
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="/admin/review/{{ $request->id }}"><button class="btn btn-primary">Edit
                                        Review</button></a>
                            </div>
                        </div>

                    </div>

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
