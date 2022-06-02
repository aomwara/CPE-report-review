<x-app-layout>
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
                                            <input type="file" name="report_file"
                                                class="form-control @if (isset($errors->report_file)) is_invalid @endif">
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
                                            <input class="btn btn-block btn-primary" type="submit" value="Send Request">
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
                                    ** สามารถเลือกลงทะเบียนกลุ่มโปรเจคได้แค่ครั้งเดียวเท่านั้น โปรดตรวจสอบความถูกต้อง
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
</x-app-layout>
