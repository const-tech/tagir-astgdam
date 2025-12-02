@extends('admin.layouts.admin')
@section('content')
    <style>
        .main-side {
            margin: 20px;
            font-family: Arial, sans-serif;
        }

        .page-title {
            font-size: 24px;
            margin-bottom: 20px;
            color: #444;
        }

        #account-tree {
            margin: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #f9f9f9;
        }

        .btn {
            margin-top: 15px;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn.submit {
            background-color: #4CAF50;
            color: white;
        }

        .btn.delete-confirm {
            background-color: #f44336;
            color: white;
        }

        .btn.cancel {
            background-color: #ccc;
            color: black;
        }

        .jstree-default .jstree-anchor {
            color: #333;
            text-decoration: none;
        }

        .jstree-default .jstree-anchor:hover {
            text-decoration: underline;
        }
    </style>

    <div class="main-side">

        <div class="d-flex justify-content-between">
            <div class="main-title">
                <div class="small">
                    @lang('Home')
                </div>
                <div class="large">
                    شجرة الحسابات
                </div>
            </div>
        </div>
        <x-admin-alert/>
        <input type="text" class="form-control" id="treeSearch" placeholder="ابحث هنا...">

        <div id="account-tree"></div>
        <!-- Add Account Modal -->
        <div class="modal fade" id="addAccountModal" tabindex="-1" aria-labelledby="addAccountModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addAccountModalLabel">اضافة حساب</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addAccountForm" method="post" action="{{route('admin.accounts.add')}}">
                            @csrf
                            <div class="mb-3">
                                <label for="add-name" class="form-label">الاسم</label>
                                <input type="text" id="add-name" name="name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="add-code" class="form-label">الكود</label>
                                <input type="text" id="add-code" name="code" class="form-control" required>
                            </div>
                            <input id="add-parent" name="parent_id" hidden class="form-select">

                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Account Modal -->
        <div class="modal fade" id="editAccountModal" tabindex="-1" aria-labelledby="editAccountModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editAccountModalLabel">تعديل الحساب</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editAccountForm" method="post" action="{{route('admin.accounts.update')}}">
                            @csrf
                            <input type="hidden" id="edit-id" name="id">
                            <div class="mb-3">
                                <label for="edit-name" class="form-label">اسم الحساب</label>
                                <input type="text" id="edit-name" name="name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit-code" class="form-label">الكود</label>
                                <input type="text" id="edit-code" name="code" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary">حفظ</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Account Modal -->
        <div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteAccountModalLabel">Delete Account</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this account?</p>
                        <input type="hidden" id="delete-id" name="id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger delete-confirm">Delete</button>
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection
@push('js')

    <script type="module">
        document.addEventListener('DOMContentLoaded', function () {
            $('#account-tree').jstree({
                core: {
                    data: {
                        url: '{{ route("admin.accounts.tree.data") }}', // URL to fetch tree data
                        dataType: 'json',
                    },
                    check_callback: true,
                    themes: {
                        variant: 'large',
                    },
                },

                plugins: ["contextmenu", "dnd", "search", "state", "types"],
                'search': {
                    'case_sensitive': false,
                    'show_only_matches': true,
                    'show_only_matches_children': true
                }
                ,
                contextmenu: {
                    items: function (node) {
                        return {
                            Add: {
                                label: "اضافة حساب فرعي",
                                action: function () {
                                    openAddModal(node);
                                }
                            },
                            Edit: {
                                label: "تعديل الحساب",
                                action: function () {
                                    openEditModal(node);
                                }
                            },
                            Delete: {
                                label: "حذف الحساب",
                                action: function () {
                                    openDeleteModal(node);
                                }
                            }
                        };
                    }
                },

            });

            function openAddModal(node) {
                document.querySelector('#add-parent').value = node.id;
                var addModal = new bootstrap.Modal(document.getElementById('addAccountModal'));
                addModal.show();
            }

            function openEditModal(node) {
                document.querySelector('#edit-id').value = node.id;
                document.querySelector('#edit-name').value = node.text.split(' - ')[1];
                document.querySelector('#edit-code').value = node.text.split(' - ')[0];
                var editModal = new bootstrap.Modal(document.getElementById('editAccountModal'));
                editModal.show();
            }

            function openDeleteModal(node) {
                document.querySelector('#delete-id').value = node.id;
                var deleteModal = new bootstrap.Modal(document.getElementById('deleteAccountModal'));
                deleteModal.show();
            }

            // Close modals and handle form submissions
            document.querySelectorAll('.modal').forEach(modal => {
                modal.addEventListener('click', event => {
                    if (event.target.classList.contains('cancel') || event.target === modal) {
                        modal.style.display = 'none';
                    }
                });
            });

            var to = false;
            $('#treeSearch').keyup(function () {
                if (to) {
                    clearTimeout(to);
                }
                to = setTimeout(function () {
                    var v = $('#treeSearch').val();
                    $('#account-tree').jstree(true).search(v);
                }, 250);
            });

        });
    </script>

@endpush
