<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <h1 class="text-xl">
                <font color="#242775">{{ env('APP_NAME') }}</font> | My Request
            </h1>
            {{ env('APP_DESC') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div style="padding:40px 40px 20px 40px;">
                    <h1 class="text-xl" style="padding-bottom: 20px;">
                        <font color="#242775"> My Request</font>
                    </h1>

                    <div class="row">
                        @foreach ($requests as $request)
                            <div class="col-md-4" style="margin-bottom: 20px;">
                                <div class="card">

                                    <div
                                        class="@if ($request->status == 0) card-body @else card-footer text-muted @endif">
                                        <h5 class="
                                        card-title">
                                            ID#{{ $request->id }}
                                            <font color="#fff">
                                                @if ($request->status == 0)
                                                    <span class="badge bg-warning">
                                                        <small>In progress</small>
                                                    </span>
                                                @elseif($request->status == 1)
                                                    <span class="badge bg-success">
                                                        <small>Completed</small>
                                                    </span>
                                                @endif
                                            </font>
                                        </h5>
                                        <a href="/admin/request/{{ $request->id }}"
                                            style="color:#000; text-decoration:none;">
                                            <p class="card-text" style="cursor: pointer;">
                                                <small>
                                                    <b>Request to:</b> {{ $request->name }}<br />
                                                    <b>Report file:</b> {{ $request->request_file }}<br />
                                                    <b>Created at:</b> {{ $request->created_at }}<br />
                                                    <b>Updated at:</b> {{ $request->updated_at }}<br />
                                                </small>
                                            </p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">แก้ไขกลุ่ม</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>ชื่อกลุ่ม</label>
                                <input required type="text" id="group_name" class="form-control"
                                    placeholder="ชื่อกลุ่ม">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>คำอธิบาย</label>
                                <input required type="text" id="group_description" class="form-control"
                                    placeholder="คำอธิบาย">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                    <button type="button" onclick="handleSubmitEdit()" class="btn btn-primary">บันทึก</button>
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
