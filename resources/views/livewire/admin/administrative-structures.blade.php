@push('css')
    <style>
        #myDiagramDiv {
            width: 100%;
            height: 600px;
            background-color: #f7f7f7;
        }
    </style>
@endpush
<div class="main-side">
    <div class="main-title">
        <div class="small">@lang('admin.Home')</div>
        <div class="large">
            الهيكل الاداري
        </div>
    </div>
    <x-admin-alert></x-admin-alert>

    @if ($screen == 'index')
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-1 mb-2">
            <button class="main-btn" wire:click='$set("screen","create")'>@lang('admin.Add') <i
                    class="fas fa-plus"></i></button>
        </div>
        <div class="table-responsive">
            <table class="main-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>المسمي الوظيفي </th>
                        <th>متفرعه من </th>
                        <th>الترتيب</th>
                        <th>@lang('admin.Control')</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($structures as $structure)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $structure->job_title }}</td>
                            <td>{{ $structure->parent?->job_title }}</td>
                            <td>{{ $structure->rank }}</td>
                            <td>
                                <div class="d-flex gap-3">
                                    <button title="@lang('admin.Edit')" type="button"
                                        wire:click="edit({{ $structure->id }})"><i></i>
                                        <i class="fa fa-edit text-info icon-table"></i>
                                    </button>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="fas fa-trash text-danger icon-table"></i>
                                    </button>
                                    <div class="modal fade" id="exampleModal" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">@lang('admin.Delete')
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    @lang('admin.Are you sure you want to delete?')
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary btn-sm px-3"
                                                        data-bs-dismiss="modal">@lang('Cancel')</button>
                                                    <button data-bs-dismiss="modal" class="btn btn-danger btn-sm px-3"
                                                        wire:click='delete({{ $structure->id }})'>@lang('admin.Delete')</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        <div id="myDiagramDiv"></div>
    @else
        @include('admin.administrative-structure.create')
    @endif
</div>
@push('js')
    <script src="https://unpkg.com/gojs"></script>
    <script>
        function init() {
            var $ = go.GraphObject.make;

            var myDiagram =
                $(go.Diagram, "myDiagramDiv", {
                    layout: $(go.TreeLayout, {
                        angle: 90,
                        layerSpacing: 35
                    })
                });

            myDiagram.nodeTemplate =
                $(go.Node, "Auto",
                    $(go.Shape, "RoundedRectangle", {
                        fill: "white",
                        stroke: "#888",
                        strokeWidth: 2
                    }),
                    $(go.TextBlock, {
                            margin: 8,
                            font: "bold 14px 'Cairo', sans-serif"
                        },
                        new go.Binding("text", "name"))
                );

            myDiagram.linkTemplate =
                $(go.Link, {
                        routing: go.Link.Orthogonal,
                        corner: 5
                    },
                    $(go.Shape, {
                        strokeWidth: 2,
                        stroke: "#888"
                    })
                );

            var model = $(go.TreeModel);
            model.nodeDataArray = @json($structure_data)

            myDiagram.model = model;
        }

        init();
    </script>
@endpush
