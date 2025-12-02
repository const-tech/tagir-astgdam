@extends('admin.layouts.admin')
@push('css')
    <style>
        #myDiagramDiv {
            width: 100%;
            height: 600px;
            background-color: #f7f7f7;
        }
    </style>
@endpush
@section('content')
    <div class="main-side">
        <div class="d-flex align-itrems-center justify-content-between mb-4">
            <div class="main-title mb-0">
                <div class="small">
                    @lang('admin.Home')
                </div>
                <div class="large">
                    الهيكل الاداري
                </div>
            </div>
            <div class="btn-holder">
                <a href="{{ route('admin.administrative-structure.create') }}" class="main-btn">اضافة <i class="fas fa-plus"></i></a>
            </div>
        </div>
        <div id="myDiagramDiv"></div>
    </div>
@endsection
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
            model.nodeDataArray = [{
                    key: 1,
                    name: "المشرف العام"
                },
                {
                    key: 2,
                    parent: 1,
                    name: "استشاري إداري"
                },
                {
                    key: 3,
                    parent: 1,
                    name: "استشاري ثقافي"
                },
                {
                    key: 4,
                    parent: 2,
                    name: "فريق المحتوى"
                },
                {
                    key: 5,
                    parent: 2,
                    name: "مدير بيانات"
                },
                {
                    key: 6,
                    parent: 4,
                    name: "مخرج محتوى"
                },
                {
                    key: 7,
                    parent: 4,
                    name: "مصمم جرافيك"
                },
                {
                    key: 8,
                    parent: 4,
                    name: "مسوق إلكتروني"
                },
                {
                    key: 9,
                    parent: 5,
                    name: "جامع بيانات"
                },
                {
                    key: 10,
                    parent: 5,
                    name: "مدخل ومنظف ومحلل بيانات"
                },
                {
                    key: 11,
                    parent: 2,
                    name: "عضو فريق"
                },
                {
                    key: 12,
                    parent: 11,
                    name: "متخصص في التقييم الأكاديمي"
                },
                {
                    key: 13,
                    parent: 11,
                    name: "عضو في لجنة التقييم النهائي"
                }
            ];

            myDiagram.model = model;
        }

        init();
    </script>
@endpush
