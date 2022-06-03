<x-app-layout>
    @if (auth()->user()->role == 0)
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <h1 class="text-xl">
                    <font color="#242775">{{ env('APP_NAME') }}</font> | @if (Auth::user()->project_group)
                        New Request
                    @else
                        Register Group
                    @endif
                </h1>
                {{ env('APP_DESC') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div style="padding:20px;">
                        <div style="padding:20px;">
                            @if (Auth::user()->project_group)
                                <h1 class="text-xl">
                                    <font color="#242775"> New Request</font>
                                </h1>

                                <form action="" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Project Group</label><br />
                                                <input type="text" class="form-control"
                                                    value=" [{{ $mygroup->id }}] {{ $mygroup->project_name }}"
                                                    disabled />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Attach file</label>
                                                <input type="file" name="report_file" class="form-control"
                                                    accept="application/pdf">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Description or Comment</label>
                                                <textarea name="description" class="form-control" rows="2"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label>Request to</label>
                                                <select class="form-control" name="request_to">
                                                    <option value="{{ $advisor->id }}">{{ $advisor->name }}
                                                        ( Advisor )</option>
                                                    <option value="{{ $committee1->id }}">{{ $committee1->name }}
                                                        ( Committee 1 )</option>
                                                    <option value="{{ $committee2->id }}">{{ $committee2->name }}
                                                        ( Committee 2 )</option>
                                                    <option value="{{ $committee3->id }}">{{ $committee3->name }}
                                                        ( Committee 3 )</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>.</label>
                                                <input class="btn btn-block btn-primary" type="submit"
                                                    value="Send Request">
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            @else
                                <h1 class="text-xl">
                                    <font color="#242775"> Register your group</font>
                                </h1>

                                <form action="/api/register/group" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label>Project Group</label>
                                                <select class="form-control" name="group_id">
                                                    @foreach ($groups as $group)
                                                        <option value="{{ $group->id }}">[{{ $group->id }}]
                                                            {{ $group->project_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>.</label>
                                                <input class="btn btn-block btn-primary" type="submit"
                                                    value="Register Group">
                                            </div>
                                        </div>



                                    </div>
                                </form>
                                <div class="alert alert-warning">
                                    <font color="red">
                                        ** สามารถเลือกลงทะเบียนกลุ่มโปรเจคได้แค่ครั้งเดียวเท่านั้น
                                        โปรดตรวจสอบความถูกต้อง
                                    </font>
                                </div>
                            @endif

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
        <script type="text/javascript">
            CKEDITOR.replace('description');
        </script>
    @else
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <h1 class="text-xl">
                    <font color="#242775">{{ env('APP_NAME') }}</font> | Request
                </h1>
                {{ env('APP_DESC') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div style="padding:20px;">
                        <div style="padding:20px;">
                            <h5>New Request</h5>
                            <div class="table-responsive">
                                <table class="table table-hover" id="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">
                                                <center>ID</center>
                                            </th>
                                            <th scope="col">Project Group</th>
                                            <th scope="col">File</th>
                                            <th>Review</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($requests as $request)
                                            <tr>
                                                <td align="center">{{ $request->id }}</td>
                                                <td> {{ App\Models\Groups::getProjectName($request->project_group) }}
                                                </td>
                                                <td><a href="/admin/requestfile/{{ $request->request_file }}"
                                                        target="_blank">{{ $request->request_file }}</a></td>
                                                <td><a href="/admin/review/{{ $request->id }}">
                                                        <button class="btn btn-sm btn-primary">Review</button>
                                                    </a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <hr />
                                <h5>History Request</h5>
                                <table class="table table-hover" id="table1">
                                    <thead>
                                        <tr>
                                            <th scope="col">
                                                <center>ID</center>
                                            </th>
                                            <th scope="col">Project Group</th>
                                            <th scope="col">Comment</th>
                                            <th scope="col">File</th>
                                            <th scope="col">Sign</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($history_request as $request)
                                            <tr>
                                                <td align="center">{{ $request->id }}</td>

                                                <td><a href="/admin/history-review/{{ $request->id }}">
                                                        {{ App\Models\Groups::getProjectName($request->project_group) }}
                                                    </a>
                                                </td>
                                                <td>
                                                    @if ($request->review)
                                                        <div class="badge badge-primary">Comment</div>
                                                    @else
                                                        <div class="badge badge-secondary">No Comment</div>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($request->review_file)
                                                        <div class="badge badge-primary">Attached</div>
                                                    @else
                                                        <div class="badge badge-secondary">No Attach</div>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($request->sign)
                                                        <div class="badge badge-success">Signed</div>
                                                    @else
                                                        <div class="badge badge-secondary">Not Sign</div>
                                                    @endif
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#table').DataTable();
                $('#table1').DataTable();
            });
        </script>
    @endif
</x-app-layout>
