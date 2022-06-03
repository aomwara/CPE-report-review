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
                        <font color="#242775"> My Request ID#{{ $request->id }}</font>
                    </h1>

                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label>Project Group</label><br />
                                    <input type="text" class="form-control"
                                        value="Group {{ $mygroup->id }} | {{ $mygroup->project_name }}" disabled />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Attach file</label>
                                    <code>
                                        <a target="_blank" href="/admin/requestfile/{{ $request->request_file }}">
                                            <p>View file</p>
                                        </a>
                                    </code>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Request to</label>
                                    <p>
                                        <code>{{ $request->name }}</code>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>My Description / Comment</label>
                                    @if ($request->description)
                                        <code>@php echo $request->description @endphp</code>
                                    @else
                                        <small> <i>
                                                <p> - No description</p>
                                            </i></small>
                                    @endif

                                </div>
                            </div>

                            @if ($request->review)
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{ $request->name }}'s review comment</label>
                                        <div style="border: 1px #999 solid; border-radius:10px; padding:10px;">
                                            @php echo $request->review @endphp
                                        </div>

                                    </div>
                                </div>
                            @else
                                @if ($request->status == 0)
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>{{ $request->name }}'s review comment</label>
                                            <h5 class="
                                        card-title">
                                                <span class="badge bg-warning">
                                                    <small>In progress</small>
                                                </span>
                                            </h5>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>{{ $request->name }}'s review comment</label>
                                            <small> <i>
                                                    <p> - No Comment</p>
                                                </i></small>
                                        </div>
                                    </div>
                                @endif
                            @endif

                            @if ($request->review_file)
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Attach file</label>
                                        @if ($request->sign)
                                            <span class="badge bg-success">
                                                <small style="color:#fff;"><b>Signed!</b></small>
                                            </span>
                                        @endif
                                        <code>
                                            <a target="_blank" href="/admin/reviewfile/{{ $request->review_file }}">
                                                <p>
                                                    {{ $request->review_file }}</p>
                                            </a>
                                        </code>
                                    </div>
                                </div>
                            @else
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Review file</label>
                                        <h5 class="
                                            card-title">
                                            <span class="badge bg-primary">
                                                <small style="color:#fff;"><b>Not found</b></small>
                                            </span>
                                        </h5>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });

        var edit_id = null;

        const handleClickEditGroup = (id) => {
            $.ajax({
                url: "/api/groups/" + id,
                type: "GET",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: ((resp) => {
                    $("#group_name").val(resp.name)
                    $("#group_description").val(resp.description)
                    edit_id = resp.id
                })
            })

            $('#edit').modal();
        }

        const handleClickDeleteGroup = (id) => {
            swal({
                title: "ต้องการลบกลุ่ม หรือไม่ ?",
                text: "หากลบกลุ่ม ลิงก์ทั้งหมดภายในกลุ่มจะถูกลบด้วย",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((resp) => {
                if (resp) {
                    var _token = $('input[name="_token"]').val()
                    $.ajax({
                        url: '/api/groups/delete',
                        type: 'DELETE',
                        data: {
                            id: id,
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: ((resp) => {
                            swal(resp).then(() => {
                                window.location.reload()
                            })
                        })
                    })
                }
            })
        }

        const handleSubmitEdit = () => {
            let data = {
                name: $("#group_name").val(),
                description: $("#group_description").val(),
                id: edit_id
            }

            $.ajax({
                url: "/api/groups/edit/",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: data,
                success: ((resp) => {
                    if (resp === "แก้ไขสำเร็จ") {
                        swal(resp, "", "success").then(() => {
                            window.location.reload()
                        })
                    } else {
                        swal(resp, "", "warning").then(() => {
                            window.location.reload()
                        })
                    }

                })
            })
        }
    </script>


</x-app-layout>
