define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'book/index' + location.search,
                    add_url: 'book/add',
                    edit_url: 'book/edit',
                    del_url: 'book/del',
                    multi_url: 'book/multi',
                    table: 'book',
                }
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'id',
                sortName: 'id',
                columns: [
                    [
                        {checkbox: true},
                        {field: 'id', title: __('Id')},
                        {field: 'mz', title: __('Mz')},
                        {field: 'jstext', title: __('Jstext')},
                        {field: 'lj', title: __('Lj')},
                        {field: 'tpimage', title: __('Tpimage'), events: Table.api.events.image, formatter: Table.api.formatter.image},
                        {field: 'dpdata', title: __('Dpdata'), searchList: {"淘宝":__('Dpdata 淘宝'),"当当":__('Dpdata 当当')}, formatter: Table.api.formatter.normal},
                        {field: 'km', title: __('Km')},
                        {field: 'updatetime', title: __('Updatetime'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        {field: 'xx', title: __('Xx')},
                        {field: 'operate', title: __('Operate'), table: table, events: Table.api.events.operate, formatter: Table.api.formatter.operate}
                    ]
                ]
            });

            // 为表格绑定事件
            Table.api.bindevent(table);
        },
        add: function () {
            Controller.api.bindevent();
        },
        edit: function () {
            Controller.api.bindevent();
        },
        api: {
            bindevent: function () {
                Form.api.bindevent($("form[role=form]"));
            }
        }
    };
    return Controller;
});